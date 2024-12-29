<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GradesTypesRange extends Model
{
    //
    protected $fillable = ['grade_type_id', 'grade_mark', 'lower_limit', 'upper_limit', 'description'];

    public function gradeType()
    {
        return $this->belongsTo(GradesType::class, 'grade_type_id', 'gradeTypeId');
    }
}
