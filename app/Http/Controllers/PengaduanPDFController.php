<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;

class PengaduanPDFController extends Controller
{
    public function generatePDF(Pengaduan $pengaduan)
    {
        // Cek apakah status valid untuk diunduh (pindahkan validasi ke controller)
        if (!in_array($pengaduan->status, ['sedang_diatasi', 'telah_selesai'])) {
            return redirect()->back()->with('error', 'Hanya pengaduan dengan status "sedang diatasi" atau "telah selesai" yang dapat diunduh.');
        }

        // Generate PDF
        $pdf = PDF::loadView('pdf.pengaduan-report', [
            'pengaduan' => $pengaduan,
            'tanggal_cetak' => Carbon::now()->format('d F Y H:i'),
            'qrData' => route('pengaduan.verify', $pengaduan->id),
        ]);

        $filename = sprintf(
            'Laporan_Pengaduan_%s_%s.pdf', 
            str_replace(' ', '_', $pengaduan->dinas_penanggung_jawab), 
            $pengaduan->id
        );

        return $pdf->stream($filename);
    }

    // Endpoint untuk verifikasi laporan melalui QR code (tetap sama)
    public function verify($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        
        return view('pengaduan.verify', [
            'pengaduan' => $pengaduan
        ]);
    }
}