<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'regisform'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('profile', [AuthController::class, 'editProfile'])->name('profile.edit');
    Route::put('profile', [AuthController::class, 'updateProfile'])->name('profile.update');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('role:admin')->group(function () {
        Route::get('product', [ProductController::class, 'index'])->name('product.index');
        Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('product/{product}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
    });
});
