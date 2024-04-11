<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\StudentHomesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StudentHomesController::class, 'homes'])->name('studenthomes.homes');
Route::get('/home/{studenthome}', [StudentHomesController::class, 'home'])->name('studenthomes.home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{user}', [UserProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [UserProfileController::class, 'destroy'])->name('profile.destroy');

    //Routes for Admins to view the dashboard + create/edit employees and users
    Route::middleware('Admin')->group(function () {
        Route::get('/admin', [UserController::class, 'index'])->name('employee.dashboard');
        Route::get('/createuser', [UserController::class, 'create'])->name('employee.createuser');
        Route::post('/storeuser', [UserController::class, 'store'])->name('employee.storeuser');
        Route::get('/edituser/{user}', [UserController::class, 'edit'])->name('employee.edituser');
        Route::patch('/updateuser/{user}', [UserController::class, 'update'])->name('employee.updateuser');
        Route::delete('/deleteuser/{user}', [UserController::class, 'destroy'])->name('employee.deleteuser');
    });

    //Routes for Employees to view the dashboard + create/edit homes and users
    Route::middleware('Employee')->group(function () {
        Route::get('/employee', [UserController::class, 'index'])->name('employee.dashboard');
        //Routes for Employees to create and edit homes
        Route::get('/createhome', [StudentHomesController::class, 'create'])->name('studenthomes.create');
        Route::post('/storehome', [StudentHomesController::class, 'store'])->name('studenthomes.store');
        Route::get('/edithome/{studenthome}', [StudentHomesController::class, 'edit'])->name('studenthomes.edit');
        Route::patch('/updatehome/{studenthome}', [StudentHomesController::class, 'update'])->name('studenthomes.update');
        Route::delete('/deletehome/{studenthome}', [StudentHomesController::class, 'destroy'])->name('studenthomes.destroy');

        //Routes for Employees to create/edit Students or Providers/Companies
        Route::get('/createuser', [UserController::class, 'create'])->name('employee.createuser');
        Route::post('/storeuser', [UserController::class, 'store'])->name('employee.storeuser');
        Route::get('/edituser/{user}', [UserController::class, 'edit'])->name('employee.edituser');
        Route::patch('/updateuser/{user}', [UserController::class, 'update'])->name('employee.updateuser');
        Route::delete('/deleteuser/{user}', [UserController::class, 'destroy'])->name('employee.deleteuser');
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
