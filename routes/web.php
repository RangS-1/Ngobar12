<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MuridController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('murids', MuridController::class);
