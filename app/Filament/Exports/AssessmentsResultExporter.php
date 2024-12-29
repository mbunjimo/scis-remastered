<?php

namespace App\Filament\Exports;

use App\Models\AssessmentsResult;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class AssessmentsResultExporter extends Exporter
{
    protected static ?string $model = AssessmentsResult::class;

    public static function getColumns(): array
    {
        return [
            //
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('student.name')
                ->label('Student Name'),
            ExportColumn::make('assessment.assessmentType.name')
                ->label('Assessment Type'),
            ExportColumn::make('assessment.subject.name')
                ->label('Subject'),
            ExportColumn::make('marks')
                ->label('Marks'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your assessments result export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
