<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentHomesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('Admin')->group(function () {
        Route::get('/admin', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });

    Route::middleware('Employee')->group(function () {
        Route::get('/createhome', [StudentHomesController::class, 'create'])->name('studenthomes.create');
        Route::post('/storehome', [StudentHomesController::class, 'store'])->name('studenthomes.store');
        Route::get('/edithome/{studenthome}', [StudentHomesController::class, 'edit'])->name('studenthomes.edit');
        Route::patch('/updatehome/{studenthome}', [StudentHomesController::class, 'update'])->name('studenthomes.update');
    });

    Route::middleware('User')->group(function () {
        Route::get('/user', function () {
            return view('user.dashboard');
        })->name('user.dashboard');
        Route::get('/studenthomes', [StudentHomesController::class, 'index'])->name('studenthomes.index');
    });
});

require __DIR__ . '/auth.php';
