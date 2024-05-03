<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});

// MIDDLEWARE

// GUEST (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login/store', [AuthController::class, 'loginStore'])->name('login.store');
});

// AUTH (sudah login)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Admin
    Route::middleware('admin')->group(function () {
        //Hotels Page

    });

    // Staff
    Route::middleware('staff')->group(function() {
        
    });
});


Route::get('/dashboard/hotels',[ HotelsController::class, 'index'])->name('hotels');
Route::get('/dashboard/hotels/create',[ HotelsController::class, 'create'])->name('hotels.create');
Route::post('/dashboard/hotels/store',[ HotelsController::class, 'store'])->name('hotels.store');

