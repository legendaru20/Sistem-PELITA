<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Kampanye;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil kampanye yang disetujui
        $kampanyes = Kampanye::where('status', 'disetujui')
            ->orderBy('tanggal_mulai', 'desc')
            ->take(4)
            ->get();

        // Mengambil agenda terbaru
        $agendas = Agenda::orderBy('created_at', 'desc')
                        ->take(2)
                        ->get();
        
        // Mengambil berita terbaru
        $beritas = Berita::orderBy('created_at', 'desc')
                        ->take(2)
                        ->get();
        
        // Menghitung statistik
        
        $totalKampanye = Kampanye::where('status', 'disetujui')->count();
        $totalPengaduan = Pengaduan::where('status', 'telah_selesai')->count();
        
        
        return view('home.index', compact(
            'kampanyes', 
            'agendas', 
            'beritas', 
            'totalKampanye',
            'totalPengaduan',
        ));
    }
}
