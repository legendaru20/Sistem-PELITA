<?php

namespace App\Filament\Resources\KampanyeDisetujuiResource\Pages;

use App\Filament\Resources\KampanyeDisetujuiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKampanyeDisetujui extends ListRecords
{
    protected static string $resource = KampanyeDisetujuiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // No create action here
        ];
    }
}
