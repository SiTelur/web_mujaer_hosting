<?php

namespace App\Filament\Widgets;

use App\Models\Ikan; // Pastikan nama model database Mas Wahyu sudah benar 'Ikan'
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class FishChart extends ChartWidget
{
    protected static ?string $heading = 'Perbandingan Tren Hasil Pemilahan (Ekor)';
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        // 1. Ambil data asli jumlah ekor per bulan untuk tahun ini dari Database
        $tahunIni = now()->year;

        // Query hitung jumlah ekor Grade A per bulan (Jan-Dec)
        $queryA = DB::table('ikans') // sesuaikan dengan nama tabel Mas, biasanya 'ikans' atau 'ikan'
            ->select(DB::raw('MONTH(created_at) as bulan'), DB::raw('count(*) as total'))
            ->where('kelas', 'Grade A') // sesuaikan kolom 'kelas' atau 'grade' di database Mas
            ->whereYear('created_at', $tahunIni)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->pluck('total', 'bulan')
            ->toArray();

        // Query hitung jumlah ekor Grade B per bulan (Jan-Dec)
        $queryB = DB::table('ikans')
            ->select(DB::raw('MONTH(created_at) as bulan'), DB::raw('count(*) as total'))
            ->where('kelas', 'Grade B')
            ->whereYear('created_at', $tahunIni)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->pluck('total', 'bulan')
            ->toArray();

        // 2. Pemetaan data ke dalam susunan 12 bulan agar tidak kosong
        $dataGradeA = [];
        $dataGradeB = [];
        for ($m = 1; $m <= 12; $m++) {
            $dataGradeA[] = $queryA[$m] ?? 0;
            $dataGradeB[] = $queryB[$m] ?? 0;
        }

        return [
            'datasets' => [
                // DATASET 1: Grade A (Warna Hijau Kontras)
                [
                    'label' => 'Grade A (Besar)',
                    'data' => $dataGradeA, // Menggunakan data asli database
                    'backgroundColor' => '#22c55e',
                    'borderColor' => '#22c55e',
                ],
                // DATASET 2: Grade B (Warna Merah Kontras)
                [
                    'label' => 'Grade B (Kecil)',
                    'data' => $dataGradeB, // Menggunakan data asli database
                    'backgroundColor' => '#ef4444',
                    'borderColor' => '#ef4444',
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    // =========================================================================
    // 3. FUNGSI UNTUK MENAMPILKAN LABEL SUMBU Y "JUMLAH (EKOR)" SECARA REAL-TIME
    // =========================================================================
    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                ],
            ],
            'scales' => [
                'y' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Jumlah (Ekor)', // Menampilkan tulisan di sumbu Y
                        'font' => [
                            'size' => 13,
                            'weight' => 'bold'
                        ]
                    ],
                    'ticks' => [
                        'precision' => 0, // Mengunci angka agar bulat tidak desimal
                    ],
                ],
            ],
        ];
    }
}
