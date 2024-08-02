<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CRMController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmployeeController;

Route::middleware(['web'])->group(function () {
    Route::get('/login', [AuthController::class, 'loginPage'])->name('loginPage');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:login')->name('login');
    Route::post('/sendOTP', [AuthController::class, 'sendOTP'])->name('sendOTP');
    Route::get('/showPassword/{token}', [SettingController::class, 'showPassword'])->name('login.showPassword');
    Route::post('/updatePassword', [SettingController::class, 'updatePassword'])->name('login.updatePassword');
    Route::get('/reset-password/{encEmail}' , [SettingController::class, 'resetPassword'])->name('reset.password');

    // error page
    Route::get('/404' , [SettingController::class, 'error_404'])->name('error_404');
    Route::get('/500' , [SettingController::class, 'error_500'])->name('error_500');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dataTable/users', [UserController::class, 'getUsers'])->name('api.users');

    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/head', [DashboardController::class, 'head'])->name('head');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // crm
    Route::resource('/crm', CRMController::class , [ 'except' => [] ]);
    Route::post('/newStage', [CRMController::class, 'newStage'])->name('crm.newStage');
    Route::get('/addActivity', [CRMController::class, 'addActivityView'])->name('crm.addActivityView');

    //contact
    Route::resource('/contact', ContactController::class , [ 'except' => [] ]);
//    Route::get('/contact-create', [ContactController::class, 'create'])->name('contact.create');
    Route::post('/contact/save', [ContactController::class, 'save'])->name('contact.save');
    
    // Employee
    Route::resource('employee', EmployeeController::class);

    // lead
    Route::get('/lead', [LeadController::class, 'index'])->name('lead.index');
    Route::get('/lea-add', [LeadController::class, 'creat'])->name('lead.creat');
    Route::POST('/lead-store', [LeadController::class, 'store'])->name('lead.store');

    // setting
    Route::get('/settings', [SettingController::class, 'index'])->name('setting.index');
    Route::get('/settings/res.users/{id?}', [SettingController::class, 'UserEdit'])->name('setting.user');

    Route::get('/users', [SettingController::class, 'userIndex'])->name('setting.users');
    Route::get('/users_create', [SettingController::class, 'usercreate'])->name('setting.user.create');

    // mail invite
    Route::post('/invitMail', [SettingController::class, 'invitMail'])->name('setting.invitMail');

    // user update
    Route::post('/user-update', [userController::class, 'userNewOrUpdate'])->name('user.update');

});
