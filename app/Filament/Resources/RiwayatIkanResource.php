<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RiwayatIkanResource\Pages;
use App\Models\Ikan;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;

class RiwayatIkanResource extends Resource
{
    protected static ?string $model = Ikan::class;

    // Ganti nama menu dan ikon
    protected static ?string $navigationIcon = 'heroicon-o-clock';
    protected static ?string $navigationLabel = 'Riwayat Deteksi';
    protected static ?string $pluralModelLabel = 'Riwayat Data Ikan';

    // MATIKAN FITUR TAMBAH DATA (Sesuai permintaan dosen)
    public static function canCreate(): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Menampilkan waktu deteksi ikan
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Waktu Deteksi')
                    ->dateTime('d M Y, H:i:s')
                    ->sortable(),

                // Menampilkan Grade dengan warna agar cantik
                Tables\Columns\TextColumn::make('kelas')
                    ->label('Grade')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Grade A' => 'success',
                        'Grade B' => 'danger',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('berat')->label('Berat')->suffix(' Kg'),
                Tables\Columns\TextColumn::make('ukuran')->label('Ukuran')->suffix(' cm'),
            ])
            // Urutkan dari data yang paling baru masuk (teratas)
            ->defaultSort('created_at', 'desc')

            // FITUR FILTER BULAN/TANGGAL
            ->filters([
                Filter::make('tanggal')
                    ->form([
                        DatePicker::make('dari_tanggal')->label('Dari Tanggal'),
                        DatePicker::make('sampai_tanggal')->label('Sampai Tanggal'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['dari_tanggal'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['sampai_tanggal'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
            ])
            ->actions([
                // Kosongkan agar tidak ada tombol Edit/Delete per baris
            ])
            ->bulkActions([
                // Kosongkan agar tidak bisa hapus massal
            ]);
    }

    public static function getPages(): array
    {
        return [
            // Cukup tampilkan halaman List (Tabel) saja
            'index' => Pages\ListRiwayatIkans::route('/'),
        ];
    }
}
