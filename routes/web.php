<?php

use App\Http\Controllers\SmartController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Layouts.master');
});

Route::get('/smart', [SmartController::class, 'adminPage'])->name('admin.smart');
Route::post('/smart/calculate', [SmartController::class, 'calculate'])->name('admin.smart.calculate');
Route::get('/smart/results', [SmartController::class, 'showResults'])->name('smart.results');


