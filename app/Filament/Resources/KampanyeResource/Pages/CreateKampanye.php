<?php

namespace App\Filament\Resources\KampanyeResource\Pages;

use App\Filament\Resources\KampanyeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKampanye extends CreateRecord
{
    protected static string $resource = KampanyeResource::class;
    
    // Tambahkan ini untuk kembali ke halaman daftar setelah simpan
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
