<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CRMController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\SettingController;


Route::middleware(['web'])->group(function () {
    Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:login')->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/head', [DashboardController::class, 'head'])->name('head');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/crmview', [CRMController::class, 'index'])->name('crm.index');
    Route::post('/crmvstore', [CRMController::class, 'store'])->name('crm.store');
    Route::post('/newStage', [CRMController::class, 'newStage'])->name('crm.newStage');

    Route::get('/lead', [LeadController::class, 'index'])->name('lead.index');
    Route::get('/lea-add', [LeadController::class, 'creat'])->name('lead.creat');
    Route::POST('/lead-store', [LeadController::class, 'store'])->name('lead.store');

    Route::get('/settings', [SettingController::class, 'index'])->name('setting.index');
    Route::get('/users', [SettingController::class, 'userIndex'])->name('setting.userIndex');
    Route::get('/users_creat', [SettingController::class, 'usercreat'])->name('setting.usercreat');
    Route::post('/invitMail', [SettingController::class, 'invitMail'])->name('setting.invitMail');

});
