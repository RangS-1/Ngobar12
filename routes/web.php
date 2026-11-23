<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\RayonController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('murids', MuridController::class);
Route::resource('rombels', RombelController::class);
Route::resource('rayons', RayonController::class);
