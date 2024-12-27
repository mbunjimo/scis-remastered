<?php

namespace App\Filament\Resources\AssessmentTypeResource\Pages;

use App\Filament\Resources\AssessmentsTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAssessmentTypes extends ListRecords
{
    protected static string $resource = AssessmentsTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
