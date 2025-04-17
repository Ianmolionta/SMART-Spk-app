<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CriteriaModel extends Model
{
    protected $table = 'criteria';
    protected $fillable = [
        'name',
        'weight',
        'type',
    ];
}
