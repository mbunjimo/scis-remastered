<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubjectsAssessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id',
        'assessment_type_id',
        'class_level_id', 
        'total_marks', 
        'weight', 
        'assessment_date', 
        'assessment_time', 
        'assessment_duration', 
        'assessment_status'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'subjectId');
    }

    public function assessmentType()
    {
        return $this->belongsTo(AssessmentsType::class, 'assessment_type_id', 'assessmentTypeId');
    }

    public function classLevel()
    {
        return $this->belongsTo(ClassLevel::class, 'class_level_id', 'classId');
    }
}
