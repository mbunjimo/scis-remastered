<?php

namespace App\Filament\Resources\GradesTypesRangeResource\Pages;

use App\Filament\Resources\GradesTypesRangeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGradesTypesRange extends EditRecord
{
    protected static string $resource = GradesTypesRangeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
