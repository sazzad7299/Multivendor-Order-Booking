<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Developer\AuthController;
use App\Http\Controllers\Auth\PasswordResetLinkController;


Route::prefix('vendor')->middleware('theme:developer')->name('developer.')->group(function(){
    Route::middleware(['guest:developer'])->group(function(){
        Route::view('/login','auth.login')->name('login');
        Route::view('/register','auth.register')->name('register');
        Route::post('/login',[AuthController::class,'store']);
        Route::post('/register',[AuthController::class,'register']);

        //phone number verification
        Route::match(['get','post'],'/verify',[AuthController::class,'verifiedcode'])->name('verifiedcode');

        //resend verification Code
        Route::match(['get','post'],'/resend-code',[AuthController::class,'resendcode'])->name('resendcode');

        //Email Verifiation
        Route::get('verified/{code}',[AuthController::class,'verified']);
        Route::get('/forgot-password', [AuthController::class, 'forget'])->name('password.request');
        Route::post('/forgot-password', [AuthController::class, 'generatePassword'])->name('password.email');
    });

    Route::middleware(['auth:developer'])->group(function () {
        Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
        Route::get('/home',[OrderController::class, 'home'])->name('home');

        //OrderController

        Route::get('/orders', [OrderController::class, 'view'])->name('view');
        Route::match(['get','post'],'/orders/add', [OrderController::class, 'add'])->name('add');
        // Route::post('/orders/store', [OrderController::class, 'store'])->name('store');
        Route::get('/orders/edit/{id}', [OrderController::class, 'edit'])->name('edit');
        Route::match(['get','post'],'/orders/update/{id}', [OrderController::class, 'update'])->name('update');
        Route::get('/order/delete/{id}', [OrderController::class, 'delete'])->name('delete');
        Route::get('/order/view/{id}', [OrderController::class, 'viewDetails'])->name('viewDetails');


        //Profile Controling

        Route::get('/profile',[AuthController::class,'profile'])->name('profile');
        Route::match(['get','post'],'/profile/update/', [AuthController::class, 'changepass'])->name('profile.update');
    });
});
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');