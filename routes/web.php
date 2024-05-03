<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;

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

   Route::get('/dashboard', function () {
       return view('index');
   })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Admin
    Route::middleware('admin')->group(function () {
    
    //Users page
    Route::get('/dashboard/users', [UserController::class, 'index'])->name('users');
    Route::get('/dashboard/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/dashboard/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/dashboard/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/dashboard/users/update/{id}', [UserController::class, 'update'])->name('users.update');
    // Route::delete('/dashboard/users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    });

    // Staff
    Route::middleware('staff')->group(function() {



    });
});

Route::prefix('dashboard')->group(function () {
    Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation.index');
    Route::get('/reservation/create', [ReservationController::class, 'create'])->name('reservation.create');
    Route::post('/reservation/store', [ReservationController::class, 'store'])->name('reservation.store');
    Route::get('/reservation/edit/{id}', [ReservationController::class, 'edit'])->name('reservation.edit');
    Route::patch('/reservation/update/{id}', [ReservationController::class, 'update'])->name('reservation.update');
    Route::delete('/reservation/destroy/{id}', [ReservationController::class, 'destroy'])->name('reservation.destroy');

    Route::get('/hotels',[ HotelsController::class, 'index'])->name('hotels');
    Route::get('/hotels/create',[ HotelsController::class, 'create'])->name('hotels.create');
    Route::post('/hotels/store',[ HotelsController::class, 'store'])->name('hotels.store');
    Route::get('/hotels/edit/{id}',[ HotelsController::class, 'edit'])->name('hotels.edit');
    Route::patch('/hotels/update/{id}',[ HotelsController::class, 'update'])->name('hotels.update');
    Route::delete('/hotels/destroy/{id}', [ HotelsController::class, 'destroy'])->name('hotels.destroy');
    Route::patch("/hotels/updateAvailable/{id}", [HotelsController::class, "updateAvailable"])->name("hotels.updateAvailable");
});



