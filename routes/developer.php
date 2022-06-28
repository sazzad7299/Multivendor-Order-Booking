<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Developer\AuthController;
use App\Http\Controllers\Auth\PasswordResetLinkController;


Route::prefix('developer')->middleware('theme:developer')->name('developer.')->group(function(){
    Route::middleware(['guest:developer'])->group(function(){
        Route::view('/login','auth.login')->name('login');
        Route::view('/register','auth.register')->name('register');
        Route::post('/login',[AuthController::class,'store']);
        Route::post('/register',[AuthController::class,'register']);
        Route::get('verified/{code}',[AuthController::class,'verified']);
        Route::get('/forgot-password', [AuthController::class, 'forget'])->name('password.request');
        Route::post('/forgot-password', [AuthController::class, 'generatePassword'])->name('password.email');
    });

    Route::middleware(['auth:developer'])->group(function () {
        Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
        Route::view('/home', 'home')->name('home');
    });
});
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');