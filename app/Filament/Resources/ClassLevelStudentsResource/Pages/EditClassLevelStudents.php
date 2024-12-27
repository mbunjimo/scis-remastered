<?php

namespace App\Filament\Resources\ClassLevelStudentsResource\Pages;

use App\Filament\Resources\ClassLevelStudentsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClassLevelStudents extends EditRecord
{
    protected static string $resource = ClassLevelStudentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
