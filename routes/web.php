<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CRMController;
use App\Http\Controllers\LeadController;


Route::middleware(['web'])->group(function () {
    Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:login')->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/crmview', [CRMController::class, 'index'])->name('crm.index');
    Route::post('/crmvstore', [CRMController::class, 'store'])->name('crm.store');
    Route::post('/newStage', [CRMController::class, 'newStage'])->name('crm.newStage');

    Route::get('/lead', [LeadController::class, 'index'])->name('lead.index');
    Route::get('/lea-add', [LeadController::class, 'creat'])->name('lead.creat');

});
