<?php

namespace App\Filament\Resources\KampanyeResource\Pages;

use App\Filament\Resources\KampanyeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKampanye extends EditRecord
{
    protected static string $resource = KampanyeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    
    // Tambahkan ini untuk kembali ke halaman daftar setelah simpan
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
