<?php

namespace App\Filament\Resources\GradeTypeRangeResource\Pages;

use App\Filament\Resources\GradeTypeRangeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGradeTypeRanges extends ListRecords
{
    protected static string $resource = GradeTypeRangeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
