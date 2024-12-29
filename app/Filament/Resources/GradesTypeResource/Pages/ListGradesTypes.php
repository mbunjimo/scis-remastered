<?php

namespace App\Filament\Resources\GradesTypeResource\Pages;

use App\Filament\Resources\GradesTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGradesTypes extends ListRecords
{
    protected static string $resource = GradesTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
