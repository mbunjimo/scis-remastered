<?php

namespace App\Filament\Resources\GradeTypeRangeResource\Pages;

use App\Filament\Resources\GradeTypeRangeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGradeTypeRange extends EditRecord
{
    protected static string $resource = GradeTypeRangeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
