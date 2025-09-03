<?php

namespace App\Http\Controllers;

use App\Mail\KampanyeSubmittedMail;
use App\Models\Kampanye;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class KampanyeController extends Controller
{
    /**
     * Display a listing of kampanye.
     */
    public function index()
    {
        $kampanyes = Kampanye::where('status', 'disetujui')
                            ->orderBy('tanggal_mulai', 'desc')
                            ->get();
        
        return view('kampanye.index', compact('kampanyes'));
    }

    /**
     * Show the form for creating a new kampanye.
     */
    public function create()
    {
        return view('kampanye.create');
    }

    /**
     * Show the specified kampanye details.
     */
    public function show($id)
    {
        $kampanye = Kampanye::findOrFail($id);
        
        // Make sure only approved campaigns can be viewed
        if ($kampanye->status != 'disetujui') {
            abort(404);
        }
        
        // Ambil kampanye lain yang disetujui untuk bagian "Kampanye Lainnya"
        $kampanyes = Kampanye::where('status', 'disetujui')
                            ->where('id', '!=', $id)
                            ->orderBy('tanggal_mulai', 'desc')
                            ->take(4)
                            ->get();
        
        return view('kampanye.show', compact('kampanye', 'kampanyes'));
    }
    
    /**
     * Store a newly created kampanye.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pengaju' => 'required|string|max:255',
            'email_pengaju' => 'required|email|max:255',
            'wa_pengaju' => 'required|string|max:15',
            'nik' => 'required|string|size:16',
            'judul_kampanye' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'thumbnail' => 'required|image|max:2048',
            'banner_images' => 'required|array',
            'banner_images.*' => 'image|max:2048',
            'proposal' => 'required|file|mimes:pdf|max:10240',
            'rekening_donasi' => 'nullable|string|max:255',
            'g-recaptcha-response' => 'required',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);
        
        // Verifikasi reCAPTCHA v3 secara manual
        $recaptchaSecret = '6Ld6FEkrAAAAACdWg1YDWXJ9DOMnCIkyl9EjelEm';
        $response = file_get_contents(
            'https://www.google.com/recaptcha/api/siteverify?secret=' . $recaptchaSecret .
            '&response=' . $request->input('g-recaptcha-response')
        );
        
        $responseKeys = json_decode($response, true);
        
        // Cek apakah verifikasi reCAPTCHA sukses
        if (!$responseKeys['success'] || $responseKeys['score'] < 0.3) {
            return back()->withInput()->withErrors([
                'g-recaptcha-response' => 'Verifikasi keamanan gagal. Silakan coba lagi.'
            ]);
        }
        
        // Upload files and create the kampanye
        $kampanye = new Kampanye();
        $kampanye->nama_pengaju = $validated['nama_pengaju'];
        $kampanye->email_pengaju = $validated['email_pengaju'];
        $kampanye->wa_pengaju = $validated['wa_pengaju'];
        $kampanye->nik = $validated['nik'];
        $kampanye->judul_kampanye = $validated['judul_kampanye'];
        $kampanye->deskripsi = $validated['deskripsi'];
        $kampanye->lokasi = $validated['lokasi'];
        $kampanye->tanggal_mulai = $validated['tanggal_mulai'];
        $kampanye->tanggal_selesai = $validated['tanggal_selesai'];
        $kampanye->rekening_donasi = $validated['rekening_donasi'] ?? null;
        $kampanye->status = 'pending';
        $kampanye->latitude = $validated['latitude'];
        $kampanye->longitude = $validated['longitude'];
        
        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $kampanye->thumbnail = $request->file('thumbnail')->store('kampanye/thumbnails', 'public');
        }
        
        // Handle proposal upload
        if ($request->hasFile('proposal')) {
            $kampanye->proposal = $request->file('proposal')->store('kampanye/proposals', 'public');
        }
        
        // Handle banner images upload
        if ($request->hasFile('banner_images')) {
            $bannerPaths = [];
            foreach ($request->file('banner_images') as $image) {
                $bannerPaths[] = $image->store('kampanye/banners', 'public');
            }
            $kampanye->banner_images = $bannerPaths;
        }
        
        $kampanye->save();
        
        // Kirim email konfirmasi penerimaan kampanye
        try {
            Mail::to($kampanye->email_pengaju)->send(new KampanyeSubmittedMail($kampanye));
        } catch (\Exception $e) {
            // Log error tapi tidak perlu menghentikan proses
            Log::error('Gagal mengirim email: ' . $e->getMessage());
        }
        
        return redirect()->route('kampanye.thankyou');
    }
    
    /**
     * Show thank you page after kampanye submission.
     */
    public function thankyou()
    {
        return view('kampanye.thankyou');
    }
}
