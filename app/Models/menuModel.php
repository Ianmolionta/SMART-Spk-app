<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class menuModel extends Model
{
    protected $table = 'menus';
    protected $fillable = [
        'name',
        'price',
        'order_count',
    ];
}
