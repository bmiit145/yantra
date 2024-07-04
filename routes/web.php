<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\authController;

//auth

Route::get('/' , [authController::class, 'loginPage']);
Route::get('/login', [authController::class, 'loginPage'])->name('login');

