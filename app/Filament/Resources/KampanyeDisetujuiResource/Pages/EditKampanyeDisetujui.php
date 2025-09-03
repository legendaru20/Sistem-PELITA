<?php

namespace App\Filament\Resources\KampanyeDisetujuiResource\Pages;

use App\Filament\Resources\KampanyeDisetujuiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKampanyeDisetujui extends EditRecord
{
    protected static string $resource = KampanyeDisetujuiResource::class;

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
