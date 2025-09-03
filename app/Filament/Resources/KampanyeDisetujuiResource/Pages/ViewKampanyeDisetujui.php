<?php

namespace App\Filament\Resources\KampanyeDisetujuiResource\Pages;

use App\Filament\Resources\KampanyeDisetujuiResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewKampanyeDisetujui extends ViewRecord
{
    protected static string $resource = KampanyeDisetujuiResource::class;

    // Tidak perlu tombol edit di view kampanye yang disetujui
    protected function getHeaderActions(): array
    {
        return [];
    }
}