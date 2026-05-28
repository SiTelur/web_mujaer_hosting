<?php

namespace App\Filament\Widgets;

use App\Models\Ikan; // <-- Menggunakan model Ikan sesuai resource Mas Wahyu
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class RekapIkanWidget extends BaseWidget
{
    // Auto-refresh setiap 3 detik
    protected static ?string $pollingInterval = '3s';

    protected function getStats(): array
    {
        // Hitung total ekor Grade A & B (pakai nama kolom 'kelas' sesuai kode Anda)
        $jumlahA = Ikan::where('kelas', 'Grade A')->count();
        $jumlahB = Ikan::where('kelas', 'Grade B')->count();

        // Hitung total berat (kalau besok sensor timbangannya sudah jalan)
        $beratA = Ikan::where('kelas', 'Grade A')->sum('berat');
        $beratB = Ikan::where('kelas', 'Grade B')->sum('berat');

        return [
            Stat::make('Total Ikan Grade A', $jumlahA . ' Ekor')
                ->description('Total Berat: ' . $beratA . ' Kg')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),

            Stat::make('Total Ikan Grade B', $jumlahB . ' Ekor')
                ->description('Total Berat: ' . $beratB . ' Kg')
                ->descriptionIcon('heroicon-m-scale')
                ->color('danger'), // Warna merah menyesuaikan badge Anda
        ];
    }
}
