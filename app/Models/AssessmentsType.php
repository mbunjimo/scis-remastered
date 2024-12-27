<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssessmentsType extends Model
{
    use HasFactory;

    protected $fillable = ['assessmentTypeId', 'name', 'description'];

    public function subjectsAssessments()
    {
        return $this->hasMany(SubjectsAssessment::class, 'assessment_type_id', 'assessmentTypeId');
    }
}
