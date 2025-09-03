<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'nik',
        'nomor_wa',
        'email',
        'lokasi_pengaduan',
        'deskripsi_pengaduan',
        'lampiran_foto',
        'status',
        'dinas_penanggung_jawab'
    ];

    protected $casts = [
        'lampiran_foto' => 'array',  // Ini yang menyebabkan field JSON otomatis menjadi array
    ];

    public function beritas()
    {
        return $this->hasMany(Berita::class);
    }
}