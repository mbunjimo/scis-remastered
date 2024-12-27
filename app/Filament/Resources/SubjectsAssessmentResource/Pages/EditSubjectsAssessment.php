<?php

namespace App\Filament\Resources\SubjectsAssessmentResource\Pages;

use App\Filament\Resources\SubjectsAssessmentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubjectsAssessment extends EditRecord
{
    protected static string $resource = SubjectsAssessmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
