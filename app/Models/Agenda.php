<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'judul',
        'alamat',
        'thumbnail',
        'gallery_images',
        'konten',
        'author',
        'kampanye_id' // Opsional, jika agenda terkait dengan kampanye
    ];
    
    protected $casts = [
        'gallery_images' => 'array',
    ];
    
    // Relasi dengan Kampanye jika dibutuhkan
    public function kampanye()
    {
        return $this->belongsTo(Kampanye::class);
    }
}
