<?php

use App\Http\Controllers\OrderController;

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->middleware('theme:admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin'])->group(function () {
        Route::view('/login', 'auth.login')->name('login');
        Route::post('/login', [AuthController::class, 'store']);
    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
        Route::view('/home', 'home')->name('home');



        //OrderController

        Route::get('/orders', [OrderController::class, 'orderlist'])->name('orderlist');
        Route::get('/orders/add', [OrderController::class, 'add'])->name('add');
        Route::post('/orders/store', [OrderController::class, 'store'])->name('store');
        Route::get('/orders/edit/{id}', [OrderController::class, 'edit'])->name('edit');
        Route::match(['get','post'],'/orders/update/{id}', [OrderController::class, 'update'])->name('update');
        Route::get('/order/delete/{id}', [OrderController::class, 'delete'])->name('delete');


        //Vendor Controller

        Route::get('/vendors', [AuthController::class, 'vendors'])->name('vendors');
        Route::match(['get','post'],'/vendor/add', [AuthController::class, 'addVendor'])->name('addVendor');
        // Route::post('/orders/store', [AuthController::class, 'store'])->name('store');
        Route::get('/vendor/edit/{id}', [AuthController::class, 'editvendor'])->name('editvendor');
        Route::post('/vendors/update/{id}', [AuthController::class, 'updateVendor'])->name('updateVendor');
        



        
    });
});