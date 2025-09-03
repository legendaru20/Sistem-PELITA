<?php

namespace App\Filament\Widgets;

use App\Models\Kampanye;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestKampanye extends BaseWidget
{
    protected static ?int $sort = 3;
    
    protected int | string | array $columnSpan = 'full';
    
    protected static ?string $heading = 'Kampanye Terbaru';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Kampanye::query()->latest()->limit(5)
            )
            ->columns([
                ImageColumn::make('thumbnail')
                    ->circular(),
                TextColumn::make('judul_kampanye')
                    ->searchable()
                    ->limit(30),
                TextColumn::make('nama_pengaju')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->date('d M Y')
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'disetujui' => 'success',
                        'ditolak' => 'danger',
                        default => 'gray',
                    }),
            ]);
    }
}
