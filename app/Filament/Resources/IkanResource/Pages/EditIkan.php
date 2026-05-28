<?php

namespace App\Filament\Resources\IkanResource\Pages;

use App\Filament\Resources\IkanResource;
use App\Filament\Resources\RiwayatIkanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIkan extends EditRecord
{
    protected static string $resource = RiwayatIkanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
