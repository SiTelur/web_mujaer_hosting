<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class FishPriceOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            // Kotak 1: Info Harga Grade A
            Stat::make('Harga Pasar Grade A', 'Rp 30.000')
                ->description('Per Kilogram')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'), // Hijau (Uang banyak)

            // Kotak 2: Info Harga Grade B
            Stat::make('Harga Pasar Grade B', 'Rp 15.000')
                ->description('Per Kilogram')
                ->descriptionIcon('heroicon-m-tag')
                ->color('warning'), // Kuning/Oranye

            // Kotak 3: Simulasi Total Uang (Data Dummy)
            // Anggap saja: (50kg x 30rb) + (34kg x 15rb)
            Stat::make('Estimasi Omzet', 'Rp 2.010.000')
                ->description('Potensi pendapatan saat ini')
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->color('primary'), // Biru
        ];
    }
}
