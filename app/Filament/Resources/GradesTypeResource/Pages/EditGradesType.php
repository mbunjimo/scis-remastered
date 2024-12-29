<?php

namespace App\Filament\Resources\GradesTypeResource\Pages;

use App\Filament\Resources\GradesTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGradesType extends EditRecord
{
    protected static string $resource = GradesTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
