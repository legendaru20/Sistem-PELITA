<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Mail\PengaduanDiterimaMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    public function index()
    {
        return view('pengaduan.index');
    }
    
    public function create()
    {
        return view('pengaduan.create');
    }
    
    public function store(Request $request)
    {
        // Log untuk debugging
        Log::info('reCAPTCHA input', [
            'token_exists' => !empty($request->input('g-recaptcha-response')),
            'token_length' => strlen($request->input('g-recaptcha-response') ?? '')
        ]);

        // Validasi form
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|size:16',
            'nomor_wa' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'lokasi_pengaduan' => 'required|string|max:255',
            'deskripsi_pengaduan' => 'required|string',
            'lampiran_foto' => 'required|array|min:2|max:5',
            'lampiran_foto.*' => 'image|mimes:jpeg,png,jpg|max:5120', // 5MB max per foto
            'g-recaptcha-response' => 'required',
        ]);

        // Verifikasi dengan toleransi lebih tinggi
        try {
            $recaptchaSecret = '6Ld6FEkrAAAAACdWg1YDWXJ9DOMnCIkyl9EjelEm';
            $recaptchaResponse = $request->input('g-recaptcha-response');

            $response = file_get_contents(
                'https://www.google.com/recaptcha/api/siteverify?secret=' . $recaptchaSecret .
                '&response=' . $recaptchaResponse
            );
            
            $responseKeys = json_decode($response, true);
            
            // Toleransi lebih tinggi: check success saja, ignore score
            if (!empty($responseKeys['success'])) {
                // Proses upload foto
                $lampiran = [];
                if ($request->hasFile('lampiran_foto')) {
                    foreach ($request->file('lampiran_foto') as $foto) {
                        $path = $foto->store('pengaduan/foto', 'public');
                        $lampiran[] = $path;
                    }
                }
                
                // Simpan pengaduan
                $pengaduan = Pengaduan::create([
                    'nama_lengkap' => $request->nama_lengkap,
                    'nik' => $request->nik,
                    'nomor_wa' => $request->nomor_wa,
                    'email' => $request->email,
                    'lokasi_pengaduan' => $request->lokasi_pengaduan,
                    'deskripsi_pengaduan' => $request->deskripsi_pengaduan,
                    'lampiran_foto' => $lampiran,
                    'status' => 'pending',
                ]);
                
                // Simpan nomor pengaduan di session untuk ditampilkan di thank you page
                session(['last_pengaduan' => [
                    'id' => $pengaduan->id,
                    'nama' => $pengaduan->nama_lengkap,
                    'email' => $pengaduan->email
                ]]);
                
                // Kirim email notifikasi dengan queue
                try {
                    Mail::to($pengaduan->email)->send(new PengaduanDiterimaMail($pengaduan)); // Ganti queue() dengan send()
                    session(['email_sent' => true]);
                } catch (\Exception $e) {
                    // Log error dengan informasi lebih detail
                    Log::error('Gagal mengirim email pengaduan: ' . $e->getMessage(), [
                        'pengaduan_id' => $pengaduan->id,
                        'email' => $pengaduan->email,
                        'error' => $e->getMessage(),
                        'trace' => $e->getTraceAsString()
                    ]);
                    session(['email_sent' => false]);
                }
                
                // Redirect dengan parameter tambahan untuk memastikan tidak ada cache
                return redirect()->route('pengaduan.thankyou', ['_' => time()]);
            } else {
                Log::warning('reCAPTCHA validation failed', $responseKeys);
                return back()->withInput()->withErrors([
                    'g-recaptcha-response' => 'Verifikasi keamanan gagal. Silakan coba lagi.'
                ]);
            }
        } catch (\Exception $e) {
            Log::error('reCAPTCHA verification exception: ' . $e->getMessage());
            return back()->withInput()->withErrors([
                'g-recaptcha-response' => 'Terjadi kesalahan. Silakan coba lagi.'
            ]);
        }
    }
    
    public function thankyou()
    {
        // Cek apakah ada data pengaduan di session
        $lastPengaduan = session('last_pengaduan');
        $emailSent = session('email_sent', false);
        
        return view('pengaduan.thankyou', [
            'lastPengaduan' => $lastPengaduan,
            'emailSent' => $emailSent
        ]);
    }
}