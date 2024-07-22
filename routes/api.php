<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/api/users', [UserController::class, 'getUsers'])->name('api.users');
