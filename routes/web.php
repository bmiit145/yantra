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
use App\Http\Controllers\SalesController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ManufacturingController;

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
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // crm
    Route::resource('/crm', CRMController::class , [ 'except' => ['show'] ]);
    Route::get('/crm/{crm}', [CRMController::class, 'show'])->name('crm.show')->defaults('crm', 'new');
    Route::post('/newStage', [CRMController::class, 'newStage'])->name('crm.newStage');
    Route::post('/stage/setSequence', [CRMController::class, 'updateStageSequence'])->name('crm.updateStageSequence');
    Route::get('/addActivity', [CRMController::class, 'addActivityView'])->name('crm.addActivityView');
    Route::get('/forecasting' , [CRMController::class, 'forecasting'])->name('crm.forecasting');
    Route::post('/update-sale-deadline/{id}', [CRMController::class, 'updateDeadline']);
    Route::get('/getdedline/{monthYear}', [CRMController::class, 'getdedline'])->name('crm.getdedline');
    Route::post('/new/sale/{sale?}' , [CRMController::class, 'newSales'])->name('crm.newSales')->defaults('sale', 'new');


    // sale
    Route::post('sale/setPriority' , [CRMController::class, 'setPriority'])->name('sale.setPriority');
    Route::post('sale/setStage' , [CRMController::class, 'setStage'])->name('sale.setStage');
    Route::post('sale/setStage' , [CRMController::class, 'setStage'])->name('sale.setStage');



    Route::get('orders' , [SalesController::class, 'index'])->name('orders.index');
    Route::get('orders/new' , [SalesController::class, 'create'])->name('orders.create');
    Route::get('products' , [SalesController::class, 'product_index'])->name('product.index');
    Route::get('products/new' , [SalesController::class, 'product_create'])->name('product.create');
    Route::get('pricelists' , [SalesController::class, 'Pricelists_index'])->name('pricelists.index');
    Route::get('pricelists/new' , [SalesController::class, 'Pricelists_create'])->name('pricelists.create');


    //contact
    Route::resource('/contact', ContactController::class , [ 'except' => [] ]);
//    Route::get('/contact-create', [ContactController::class, 'create'])->name('contact.create');
    Route::post('/contact/save', [ContactController::class, 'save'])->name('contact.save');
    Route::get('/suggestions/contacts', [ContactController::class, 'getSuggestions'])->name('contact.suggestions');

    // Employee
    Route::resource('employee', EmployeeController::class);
    Route::post('/save-employee', [EmployeeController::class, 'store']);

    // Experience
    Route::put('experience/{id}', [EmployeeController::class, 'update'])->name('experience.update');
    Route::get('/employees/names', [EmployeeController::class, 'getEmployeeNames'])->name('getEmployeeNames');
    Route::post('/save', [EmployeeController::class, 'save'])->name('experience.save');
    Route::post('/discard', [EmployeeController::class, 'discard'])->name('discard');

    // Skill
    Route::get('/skill/{skill?}', [EmployeeController::class, 'skill_add'])->name('skill.add');
    Route::post('/skills/store', [EmployeeController::class, 'skill_store'])->name('skills.store');
    Route::get('/skills/view', [EmployeeController::class, 'skill_view'])->name('skill.view');
    Route::delete('/skills/delete/{id}', [EmployeeController::class, 'skill_delete'])->name('skills.delete');
    Route::delete('/skills/level/delete/{id}', [EmployeeController::class, 'skillLevelDelete'])->name('skills.level.delete');

    Route::post('/save-selected-skill', [EmployeeController::class, 'saveSelectedSkill'])->name('saveSelectedSkill');
    Route::get('/get-skills-by-type', [EmployeeController::class, 'getSkillsByType'])->name('getSkillsByType');


    // Skill Type
    Route::post('/skill_types/store', [EmployeeController::class, 'skill_type_store'])->name('skill_types.store');

    // Skill Level
    Route::post('/skill-levels/store', [EmployeeController::class, 'skill_level_store'])->name('skill_levels.store');
    Route::delete('/skill-levels/delete/{id}', [EmployeeController::class, 'skill_level_delete'])->name('skill_levels.delete');

    //Tag
    Route::get('/tags', [TagController::class, 'fetchTags']);

    // lead
    Route::get('/lead', [LeadController::class, 'index'])->name('lead.index');
    Route::post('/lead-data', [LeadController::class, 'getLeads'])->name('lead.get');
    Route::get('/lead-add/{id?}', [LeadController::class, 'create'])->name('lead.create');
    Route::POST('/lead-store', [LeadController::class, 'store'])->name('lead.store');
    Route::POST('/storeLead', [LeadController::class, 'storeLead'])->name('lead.storeLead');
    Route::get('/lead-kanban', [LeadController::class, 'show'])->name('lead.kanban')->defaults('lead', 'kanban');
    Route::post('/lead/updatePriority', [LeadController::class, 'updatePriority'])->name('lead.updatePriority');
    Route::get('/lead-calendar', [LeadController::class, 'calendar'])->name('lead.calendar')->defaults('lead', 'calendar');
    Route::get('/activities', [LeadController::class, 'fetchActivities'])->name('activities.fetch');
    Route::get('/activity-detail/{id}', [LeadController::class, 'activityDetail'])->name('lead.activityDetail');
    Route::post('/lead-filter', [LeadController::class, 'filter'])->name('lead.filter');



    Route::get('/leads/similar/{productName}', [LeadController::class, 'showSimilarLeads'])->name('leads.similar');
    Route::post('/leads/storeLost', [LeadController::class, 'storeLost'])->name('leads.storeLost');
    Route::post('/leads/manageLostReasons', [LeadController::class, 'manageLostReasons'])->name('leads.markAsLost');

    // Activities Store Route
    Route::post('/schedule-activity', [LeadController::class, 'scheduleActivityStore'])->name('lead.scheduleActivityStore');
    Route::get('/activities-edit/{id?}', [LeadController::class, 'activitiesEdit'])->name('lead.activitiesEdit');
    Route::post('/activities/update', [LeadController::class, 'activitiesUpdate'])->name('lead.activitiesUpdate');
    Route::delete('/activities/{id?}', [LeadController::class, 'activitiesDelete'])->name('lead.activitiesDelete');
    Route::post('/update-activity-status', [LeadController::class, 'activitiesUpdateStatus'])->name('lead.activitiesUpdateStatus');


    // Check Email Or Phone Exists Route
    Route::post('/check-email', [LeadController::class, 'checkEmail'])->name('checkEmail');
    Route::post('/check-phone', [LeadController::class, 'checkPhone'])->name('checkPhone');

    //fetch-states
    Route::post('/fetch-states', [LeadController::class, 'fetchState'])->name('fetch-states');

    // Add Title
    Route::post('/add-title', [LeadController::class, 'addTitle'])->name('add-title');
    Route::post('/add-tag', [LeadController::class, 'addTag'])->name('add-tag');

    // setting
    Route::get('/settings', [SettingController::class, 'index'])->name('setting.index');
    Route::get('/settings/res.users/{id?}', [SettingController::class, 'UserEdit'])->name('setting.user');

    Route::get('/users', [SettingController::class, 'userIndex'])->name('setting.users');
    Route::get('/users_create', [SettingController::class, 'usercreate'])->name('setting.user.create');

    // mail invite
    Route::post('/invitMail', [SettingController::class, 'invitMail'])->name('setting.invitMail');

    // user update
    Route::post('/user-update', [userController::class, 'userNewOrUpdate'])->name('user.update');

    // Manufacturing
    Route::resource('manufacturing', ManufacturingController::class);
    Route::get('/unbuild/order', [ManufacturingController::class, 'unbuild_order'])->name('manufacture.unbuild.order');
    Route::get('/scrap/order', [ManufacturingController::class, 'scrap_order'])->name('manufacture.scrap.order');
    Route::get('/bills/of/material', [ManufacturingController::class, 'bills_of_material'])->name('manufacture.bills_of_material');
    Route::get('/production/analysis', [ManufacturingController::class, 'production_analysis'])->name('manufacture.production_analysis');
    

});
