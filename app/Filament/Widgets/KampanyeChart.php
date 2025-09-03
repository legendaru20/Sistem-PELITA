<?php

namespace App\Filament\Widgets;

use App\Models\Kampanye;
use App\Models\Pengaduan;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class KampanyeChart extends ChartWidget
{
    protected static ?string $heading = 'Total Pengaduan dan Kampanye';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $labels = [];
        $kampanyeData = [];
        $pengaduanData = [];

        // Ambil 6 bulan terakhir
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $labels[] = $date->format('M Y');

            $kampanyeData[] = Kampanye::whereMonth('created_at', $date->month)
                ->whereYear('created_at', $date->year)
                ->count();

            $pengaduanData[] = Pengaduan::whereMonth('created_at', $date->month)
                ->whereYear('created_at', $date->year)
                ->count();
        }

        return [
            'labels'   => $labels,
            'datasets' => [
                [
                    'label'           => 'Kampanye',
                    'data'            => $kampanyeData,
                    'backgroundColor' => '#10b981',
                    'borderColor'     => '#10b981',
                ],
                [
                    'label'           => 'Pengaduan',
                    'data'            => $pengaduanData,
                    'backgroundColor' => '#f97316',
                    'borderColor'     => '#f97316',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
