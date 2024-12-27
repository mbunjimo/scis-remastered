<?php

namespace App\Filament\Resources\GradeTypeResource\Pages;

use App\Filament\Resources\GradeTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGradeType extends EditRecord
{
    protected static string $resource = GradeTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
