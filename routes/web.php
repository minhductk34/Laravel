<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserAccountController;

Route::get("/", [IndexController::class, 'index']);
//Route::get("/show", [IndexController::class, 'show']);
Route::resource("listing", ListingController::class);
Route::get('/login', [AuthController::class, 'create'])
    ->name('login');
Route::post('/login', [AuthController::class, 'store'])
    ->name('login.store');
Route::delete('/login', [AuthController::class, 'destroy'])
    ->name('logout');
Route::resource('user-account', UserAccountController::class)
    ->only(['create', 'store']);
