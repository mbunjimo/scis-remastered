<?php

namespace App\Filament\Resources\AssessmentsResultResource\Pages;

use App\Filament\Resources\AssessmentsResultResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAssessmentsResult extends EditRecord
{
    protected static string $resource = AssessmentsResultResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
