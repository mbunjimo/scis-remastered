<?php

namespace App\Filament\Resources\ClassLevelStudentsResource\Pages;

use App\Filament\Resources\ClassLevelStudentsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClassLevelStudents extends ListRecords
{
    protected static string $resource = ClassLevelStudentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
