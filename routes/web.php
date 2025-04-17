<?php

use App\Http\Controllers\SmartController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/smart/calculate', [SmartController::class, 'calculate']);

