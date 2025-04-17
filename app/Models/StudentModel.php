<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    protected $table = 'students';
    protected $fillable = [
        'name',
        'student_number',
        'class',
    ];

    public function scores()
    {
        return $this->hasMany(\App\Models\ScoreModel::class);
    }

    public function result()
    {
        return $this->hasOne(\App\Models\ResultModel::class);
    }

}
