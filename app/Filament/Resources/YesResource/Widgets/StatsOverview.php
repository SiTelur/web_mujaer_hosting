<?php

namespace App\Filament\Widgets;

use App\Models\Ikan;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    // RAHASIA REAL-TIME: Auto-refresh setiap 3 detik tanpa perlu pencet F5!
    protected static ?string $pollingInterval = '3s';

    protected function getStats(): array
    {
        // --- 1. AMBIL DATA OTOMATIS DARI DATABASE ---
        $totalIkan = Ikan::count();

        // Hitung Grade A
        $jumlahA = Ikan::where('kelas', 'Grade A')->count();
        $beratA  = Ikan::where('kelas', 'Grade A')->sum('berat');

        // Hitung Grade B
        $jumlahB = Ikan::where('kelas', 'Grade B')->count();
        $beratB  = Ikan::where('kelas', 'Grade B')->sum('berat');

        // --- 2. PERHITUNGAN KEUANGAN OTOMATIS ---
        $hargaA = 30000;
        $hargaB = 15000;

        $omzetA     = $beratA * $hargaA;
        $omzetB     = $beratB * $hargaB;
        $totalOmzet = $omzetA + $omzetB;

        // --- 3. TAMPILKAN KE WIDGET ---
        return [
            /* --- BARIS 1: TOTAL & DATA BERAT --- */
            Stat::make('Total Ikan Terdeteksi', $totalIkan . ' Ekor')
                ->description('Total akumulasi tangkapan')
                ->descriptionIcon('heroicon-m-clipboard-document-list')
                ->color('gray'),

            Stat::make('Grade A (Besar)', $beratA . ' Kg')
                ->description('Jumlah: ' . $jumlahA . ' Ekor')
                ->descriptionIcon('heroicon-m-scale')
                ->color('success'),

            Stat::make('Grade B (Kecil)', $beratB . ' Kg')
                ->description('Jumlah: ' . $jumlahB . ' Ekor')
                ->descriptionIcon('heroicon-m-scale')
                ->color('danger'),

            /* --- BARIS 2: KEUANGAN --- */
            Stat::make('Estimasi Omzet', 'Rp ' . number_format($totalOmzet, 0, ',', '.'))
                ->description('Potensi pendapatan saat ini')
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->color('primary'),

            Stat::make('Harga Pasar Grade A', 'Rp ' . number_format($hargaA, 0, ',', '.'))
                ->description('/ Kg')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),

            Stat::make('Harga Pasar Grade B', 'Rp ' . number_format($hargaB, 0, ',', '.'))
                ->description('/ Kg')
                ->descriptionIcon('heroicon-m-tag')
                ->color('warning'),
        ];
    }
}
