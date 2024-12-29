<?php

namespace App\Filament\Resources\AssessmentsResultResource\Pages;

use App\Filament\Resources\AssessmentsResultResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAssessmentsResults extends ListRecords
{
    protected static string $resource = AssessmentsResultResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
