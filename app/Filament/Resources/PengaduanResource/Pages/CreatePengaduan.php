<?php

namespace App\Filament\Resources\PengaduanResource\Pages;

use App\Filament\Resources\PengaduanResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\PengaduanDiterimaMail;

class CreatePengaduan extends CreateRecord
{
    protected static string $resource = PengaduanResource::class;
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
    protected function afterCreate(): void
    {
        $pengaduan = $this->record;
        
        // Kirim email notifikasi pengaduan diterima
        try {
            Mail::to($pengaduan->email)->send(new PengaduanDiterimaMail($pengaduan));
        } catch (\Exception $e) {
            Notification::make()
                ->title('Gagal mengirim email notifikasi')
                ->body($e->getMessage())
                ->danger()
                ->send();
        }
    }
}
