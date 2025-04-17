<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScoreModel extends Model
{
    protected $table = 'scores';
    protected $fillable = [
        'student_id',
        'criteria_id',
        'value',
    ];
}
