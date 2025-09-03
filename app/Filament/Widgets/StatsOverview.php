<?php

namespace App\Filament\Widgets;

use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Kampanye;
use App\Models\Pengaduan;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    
    protected function getStats(): array
    {
        return [
            Stat::make('Total Kampanye', Kampanye::count())
                ->description('Kampanye lingkungan')
                ->descriptionIcon('heroicon-m-megaphone')
                ->chart([7, 4, 6, 8, 10, 15, 16])
                ->color('success'),

            Stat::make('Pengaduan', Pengaduan::count())
                ->description('Menunggu tindakan')
                ->descriptionIcon('heroicon-m-exclamation-triangle')
                ->chart([3, 5, 7, 9, 12, 14, 12])
                ->color('warning'),

            Stat::make('Agenda Aktif', Agenda::count())
                ->description('Total Agenda')
                ->descriptionIcon('heroicon-m-calendar')
                ->chart([4, 8, 6, 5, 10, 15, 18])
                ->color('primary'),
                
            Stat::make('Berita', Berita::count())
                ->description('Berita terpublikasi')
                ->descriptionIcon('heroicon-m-newspaper')
                ->chart([5, 7, 12, 8, 10, 15, 17])
                ->color('danger'),
        ];
    }
}
