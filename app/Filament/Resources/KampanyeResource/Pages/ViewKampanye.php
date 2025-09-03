<?php


namespace App\Filament\Resources\KampanyeResource\Pages;

use App\Filament\Resources\KampanyeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewKampanye extends ViewRecord
{
    protected static string $resource = KampanyeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
