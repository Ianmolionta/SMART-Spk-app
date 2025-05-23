<?php

use App\Http\Controllers\SmartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\menuController;

Route::get('/', function () {
    return view('menus.index');
});

Route::get('index', menuController::class . '@index')->name('index');
Route::get('create', menuController::class . '@create')->name('create');
Route::post('store', menuController::class . '@store')->name('store');
Route::get('edit/{id}', menuController::class . '@edit')->name('edit');
Route::put('update/{id}', menuController::class . '@update')->name('update');
Route::delete('destroy/{id}', menuController::class . '@destroy')->name('destroy');
Route::resource('menus', menuController::class);



