<?php

namespace App\Filament\Resources\KampanyeResource\Pages;

use App\Filament\Resources\KampanyeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKampanyes extends ListRecords
{
    protected static string $resource = KampanyeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
