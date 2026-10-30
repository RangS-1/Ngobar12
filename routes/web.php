<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Controllers\MuridController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('murids', MuridController::class);
