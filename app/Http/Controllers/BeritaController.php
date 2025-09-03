<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::query()->orderBy('created_at', 'desc');
                       
        // Handle search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('konten', 'like', "%{$search}%")
                  ->orWhere('alamat', 'like', "%{$search}%");
            });
        }
        
        $berita = $query->paginate(9);
        
        return view('berita.index', compact('berita'));
    }

    public function show($id)
    {
        $berita = Berita::with('pengaduan')->findOrFail($id);
        $relatedBerita = Berita::where('id', '!=', $id)
                             ->latest()
                             ->take(3)
                             ->get();
                             
        return view('berita.show', compact('berita', 'relatedBerita'));
    }
}