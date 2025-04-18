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
        return $this->hasMany(ScoreModel::class, 'student_id');
    }

    public function result()
    {
        return $this->hasOne(ResultModel::class);
    }

}
