<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['subjectId', 'name', 'shortName', 'description'];

    public function subjectsAssessments()
    {
        return $this->hasMany(SubjectsAssessment::class, 'subject_id', 'subjectId');
    }

    public function classLevel()
    {
        return $this->belongsTo(ClassLevel::class, 'class_level_id', 'classId');
    }
}
