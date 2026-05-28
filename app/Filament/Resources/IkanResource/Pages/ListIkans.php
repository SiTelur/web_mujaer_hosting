<?php

namespace App\Filament\Resources\IkanResource\Pages;

use App\Filament\Resources\IkanResource;
use App\Filament\Resources\RiwayatIkanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIkans extends ListRecords
{
    protected static string $resource = RiwayatIkanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
