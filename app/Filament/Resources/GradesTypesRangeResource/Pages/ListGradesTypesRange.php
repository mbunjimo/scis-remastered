<?php

namespace App\Filament\Resources\GradesTypesRangeResource\Pages;

use App\Filament\Resources\GradesTypesRangeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGradesTypesRange extends ListRecords
{
    protected static string $resource = GradesTypesRangeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
