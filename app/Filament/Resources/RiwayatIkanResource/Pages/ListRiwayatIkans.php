<?php

namespace App\Filament\Resources\RiwayatIkanResource\Pages;

use App\Filament\Resources\RiwayatIkanResource;
use Filament\Resources\Pages\ListRecords;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use Maatwebsite\Excel\Excel; // Wajib ditambahkan untuk memanggil fitur PDF

class ListRiwayatIkans extends ListRecords
{
    protected static string $resource = RiwayatIkanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Tombol utama diubah namanya jadi "Export Data"
            ExportAction::make()
                ->label('Export Data')
                ->color('success')
                ->icon('heroicon-o-document-arrow-down')
                ->exports([

                    // Pilihan 1: Format EXCEL
                    ExcelExport::make('excel')
                        ->label('Format Excel (.xlsx)')
                        ->fromTable()
                        ->withFilename('Laporan_Riwayat_Ikan_' . date('Y-m-d')),

                    // Pilihan 2: Format PDF
                    ExcelExport::make('pdf')
                        ->label('Format PDF (.pdf)')
                        ->fromTable()
                        ->withFilename('Laporan_Riwayat_Ikan_' . date('Y-m-d'))
                        ->withWriterType(Excel::DOMPDF), // Mengubah tipe output jadi PDF
                ]),
        ];
    }
}
