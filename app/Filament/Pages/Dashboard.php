<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\StatsOverview;
use App\Filament\Widgets\FishChart;

// Kita hapus FishPriceOverview karena isinya sudah pindah ke StatsOverview
// use App\Filament\Widgets\FishPriceOverview;

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
    {
        return [
            StatsOverview::class, // Ini sekarang isinya sudah 6 kotak (Atas & Bawah)
            FishChart::class,     // Grafik tetap di paling bawah
        ];
    }
}
