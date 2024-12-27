<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassLevel extends Model
{
    use HasFactory;

    protected $fillable = ['classId', 'year', 'combination', 'stream', 'level'];

    public function subjectsAssessments()
    {
        return $this->hasMany(SubjectsAssessment::class, 'class_level_id', 'classId');
    }
}
