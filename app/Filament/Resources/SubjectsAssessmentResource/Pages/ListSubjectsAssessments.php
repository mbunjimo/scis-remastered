<?php

namespace App\Filament\Resources\SubjectsAssessmentResource\Pages;

use App\Filament\Resources\SubjectsAssessmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubjectsAssessments extends ListRecords
{
    protected static string $resource = SubjectsAssessmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
