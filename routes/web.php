<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\GalleryController;
Route::resource('/galleries', GalleryController::class);
