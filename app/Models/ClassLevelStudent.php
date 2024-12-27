<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassLevelStudent extends Model
{
    //
    protected $table = 'class_level_students';

    protected $fillable = ['class_level_id', 'student_id'];

    public function classLevel()
    {
        return $this->belongsTo(ClassLevel::class, 'class_level_id', 'classId');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }
}
