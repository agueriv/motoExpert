<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MotoController;
use App\Http\Controllers\SettingsController;

Route::get('/', function () {
    return view('index');
});

Route::resource('moto', MotoController::class);

// Settings urls
Route::get('settings',[SettingsController::class, 'index'])-> name('settings.index');
Route::put('settings',[SettingsController::class, 'update'])-> name('settings.update');