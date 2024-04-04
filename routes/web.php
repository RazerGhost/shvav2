<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentHomesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StudentHomesController::class, 'homes'])->name('studenthomes.homes');
Route::get('/home/{studenthome}', [StudentHomesController::class, 'home'])->name('studenthomes.home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Routes for Admins to view the dashboard
    Route::middleware('Admin')->group(function () {
        Route::get('/admin', [AdminController::class,'index'])->name('admin.dashboard');
        Route::get('/createemployee', [AdminController::class, 'create'])->name('admin.createemployee');
        Route::post('/storeemployee', [AdminController::class, 'store'])->name('admin.storeemployee');
        
    });

    //Routes for Employees to create and edit homes
    Route::middleware('Employee')->group(function () {
        Route::get('/createhome', [StudentHomesController::class, 'create'])->name('studenthomes.create');
        Route::post('/storehome', [StudentHomesController::class, 'store'])->name('studenthomes.store');
        Route::get('/edithome/{studenthome}', [StudentHomesController::class, 'edit'])->name('studenthomes.edit');
        Route::patch('/updatehome/{studenthome}', [StudentHomesController::class, 'update'])->name('studenthomes.update');
        Route::delete('/deletehome/{studenthome}', [StudentHomesController::class, 'destroy'])->name('studenthomes.destroy');
    });

    //Routes for Providers to view the dashboard
    Route::middleware('Provider')->group(function () {
        Route::get('/provider', function () {
            return view('provider.dashboard');
        })->name('provider.dashboard');
    });

    //Routes for Users to view the dashboard
    Route::middleware('User')->group(function () {
        Route::get('/user', function () {
            return view('user.dashboard');
        })->name('user.dashboard');
    });
});

require __DIR__ . '/auth.php';
