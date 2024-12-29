<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GradesType extends Model
{
    //
    protected $fillable = ['gradeTypeId', 'gradeTypeName', 'description'];

    public function gradeTypeRanges()
    {
        return $this->hasMany(GradesTypesRange::class, 'grade_type_id', 'gradeTypeId');
    }
}
