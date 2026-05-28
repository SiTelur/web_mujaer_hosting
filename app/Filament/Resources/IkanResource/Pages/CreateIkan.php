<?php

namespace App\Filament\Resources\IkanResource\Pages;

use App\Filament\Resources\IkanResource;
use App\Filament\Resources\RiwayatIkanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIkan extends CreateRecord
{
    protected static string $resource = RiwayatIkanResource::class;
}
