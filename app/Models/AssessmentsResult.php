<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssessmentsResult extends Model
{
    //
    protected $fillable = ['student_id', 'assessment_id', 'marks', 'grade_type_id', 'grade_type_range_id', 'remarks'];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

    public function assessment()
    {
        return $this->belongsTo(SubjectsAssessment::class, 'assessment_id', 'id');
    }

    public function gradeType()
    {
        return $this->belongsTo(GradesType::class, 'grade_type_id', 'gradeTypeId');
    }

    public function gradeTypeRange()
    {
        return $this->belongsTo(GradesTypesRange::class, 'grade_type_range_id', 'id');
    }


}
