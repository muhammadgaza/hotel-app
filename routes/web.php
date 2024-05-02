<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});

//Hotels Page
Route::get('/dashboard/hotels',[ HotelsController::class, 'index'])->name('hotels');
Route::get('/dashboard/hotels/create',[ HotelsController::class, 'create'])->name('hotels.create');