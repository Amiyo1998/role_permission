<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\backend\BlogController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\RolesController;
use App\Http\Controllers\backend\AdminsController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\Auth\PasswordResetLinkController;
use App\Http\Controllers\backend\Auth\AuthenticatedSessionController;



require __DIR__.'/auth.php';
Route::get('/home',[HomeController::class,'home'])->name('home');
Route::get('/',[HomeController::class,'redirectHome'])->name('index-home');


Route::prefix('admin')->group(function () {
    Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::resource('roles', RolesController::class);
    Route::resource('users', UserController::class);
    Route::resource('admins', AdminsController::class);
    Route::resource('blogs', BlogController::class);

    //Login Routes
    Route::get('/login',[AuthenticatedSessionController::class,'create'])->name('admin.login');
    Route::post('/login/submit',[AuthenticatedSessionController::class,'store'])->name('admin.login.submit');

    //Logout Routes
    Route::post('/logout/submit',[AuthenticatedSessionController::class,'destroy'])->name('admin.logout.submit');

    //Forget Password Routes
    Route::get('/password/reset',[PasswordResetLinkController::class,'create'])->name('admin.password.request');
    Route::post('/password/reset/submit',[AuthenticatedSessionController::class,'reset'])->name('admin.password.update');
});
