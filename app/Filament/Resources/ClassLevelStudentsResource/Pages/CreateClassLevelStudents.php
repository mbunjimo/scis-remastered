<?php

namespace App\Filament\Resources\ClassLevelStudentsResource\Pages;

use App\Filament\Resources\ClassLevelStudentsResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\ClassLevelStudent;
use Illuminate\Support\Facades\Log;

class CreateClassLevelStudents extends CreateRecord
{
    protected static string $resource = ClassLevelStudentsResource::class;

    protected function handleRecordCreation(array $data): ClassLevelStudent
    {
        $studentIds = $data['student_id'] ?? [];
        $classLevelId = $data['class_level_id'];
        
        $firstRecord = null;
        foreach ($studentIds as $studentId) {
            $record = ClassLevelStudent::create([
                'class_level_id' => $classLevelId,
                'student_id' => $studentId,
            ]);
            $firstRecord ??= $record;
        }
        
        return $firstRecord;
    }
}
