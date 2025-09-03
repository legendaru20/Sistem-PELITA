<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'alamat',
        'author',
        'thumbnail',
        'konten',
        'pengaduan_id', // Tambahkan field untuk relasi
    ];

    // Relasi ke pengaduan
    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class);
    }
}
