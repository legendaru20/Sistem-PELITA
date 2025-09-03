<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kampanye extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pengaju',
        'email_pengaju',  
        'wa_pengaju',     
        'nik',
        'judul_kampanye',
        'deskripsi',
        'lokasi',
        'latitude',  // tambahkan 
        'longitude', // tambahkan 
        'tanggal_mulai',
        'tanggal_selesai',
        'proposal',
        'thumbnail',
        'banner_images',
        'rekening_donasi',
        'status',
    ];

    protected $casts = [
        'tanggal_mulai' => 'datetime',
        'tanggal_selesai' => 'datetime',
        'banner_images' => 'array',
    ];
}
