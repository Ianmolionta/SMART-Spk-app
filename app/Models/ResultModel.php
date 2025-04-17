<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResultModel extends Model
{
    protected $table = 'results';
    protected $fillable = [
        'student_id',
        'final_score',
        'rank',
    ];

    public function student()
    {
        return $this->belongsTo(\App\Models\StudentModel::class);
    }

}
