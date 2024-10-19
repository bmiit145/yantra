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
use App\Http\Controllers\GraphController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ManufacturingController;
use App\Http\Controllers\ConfigurationController;

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

    Route::get('/pipeline-list',[CRMController::class,'pipelineList'])->name('crm.pipeline.list');
    Route::post('/pipeline-list-data',[CRMController::class,'pipelineListData'])->name('crm.pipeline.list.data');
    Route::get('/pipeline-create/{id?}/{index?}',[CRMController::class,'pipelineCreate'])->name('crm.pipeline.create');
    Route::post('/pipeline-store',[CRMController::class,'pipelineStore'])->name('crm.pipeline.store');
    Route::get('/customer/{id}', [CRMController::class, 'getCustomerDetails'])->name('getCustomerDetails');
    Route::post('/update-stage', [CRMController::class,'updateStage'])->name('crm.updateStage');
    Route::post('/add-lost-reason', [CRMController::class, 'addLostReason'])->name('crm.pipeline.addLostReason');
    Route::post('/pipeline/manageLostReasons', [CRMController::class, 'pipelineManageLostReasons'])->name('crm.pipeline.markAsLost');
    Route::post('/pipeline-restore/{id}', [CRMController::class, 'restoreIsLost'])->name('crm.pipeline.restore');;
    // CRM pipeline Activities
    Route::post('/pipeline-schedule-activity', [CRMController::class, 'pipelineScheduleActivityStore'])->name('crm.pipeline.scheduleActivityStore');
    Route::get('/pipeline-activities-edit/{id?}', [CRMController::class, 'pipelineActivitiesEdit'])->name('crm.pipeline.activitiesEdit');
    Route::post('/pipeline-activities/update', [CRMController::class, 'pipelineActivitiesUpdate'])->name('crm.pipeline.activitiesUpdate');
    Route::delete('/pipeline-activities/{id?}', [CRMController::class, 'pipelineActivitiesDelete'])->name('crm.pipeline.activitiesDelete');
    Route::post('/pipeline-update-activity-status', [CRMController::class, 'pipelineActivitiesUpdateStatus'])->name('crm.pipeline.activitiesUpdateStatus');
    Route::get('/pipeline-activities', [CRMController::class, 'pipelinefetchActivities'])->name('crm.pipeline.activities.fetch');
    Route::get('/pipeline-activity-detail/{id}', [CRMController::class, 'pipelineactivityDetail'])->name('crm.pipeline.activityDetail');
    Route::get('/pipeline-calendar', [CRMController::class, 'calendar'])->name('crm.pipeline.calendar');
    Route::get('/pipeline-activity' , [CRMController::class, 'pipelineActivity'])->name('crm.pipeline.activity');
    Route::get('/pipeline-graph', [CRMController::class, 'pipelineGraph'])->name('crm.pipeline.graph');
    Route::post('/setColor', [CRMController::class, 'setColor'])->name('crm.setColor');
    Route::get('/pipelineDelete', [CRMController::class, 'pipelineDelete'])->name('crm.delete');
    Route::get('/pipeline-importpipline', [CRMController::class, 'importpipline'])->name('crm.importpipline');
    Route::post('/pipeline-import', [CRMController::class, 'import'])->name('crm.import');
    Route::get('/exportCrm', [CRMController::class, 'exportCrm'])->name('crm.exportCrm');
    

    // CRM pipeline Filter

    Route::get('/pipeline-filter', [CRMController::class, 'pipelineFilter'])->name('crm.pipeline.filter');
    Route::post('/pipeline-filter-group-by', [CRMController::class, 'pipelineFilterGroupBy'])->name('crm.pipeline.filter.group.by');
    Route::post('/pipeline-custom-filter', [CRMController::class, 'pipelineCustomFilter'])->name('crm.pipeline.custom.filter');


    // sale
    Route::post('sale/setPriority' , [CRMController::class, 'setPriority'])->name('sale.setPriority');
    Route::post('sale/setStage' , [CRMController::class, 'setStage'])->name('sale.setStage');
    Route::post('sale/setStage' , [CRMController::class, 'setStage'])->name('sale.setStage');     


    Route::get('activity' , [ActivityController::class, 'index'])->name('lead.activity');
    Route::post('/activity-submit-feedback', [ActivityController::class, 'submitFeedback'])->name('lead.submit.feedback');
    Route::get('/feedback-activity/{id}', [ActivityController::class, 'feedbackActivityShow'])->name('lead.feedback.activity.show');
    Route::post('/feedback-activity-update', [ActivityController::class, 'feedbackActivityUpdate'])->name('lead.feedback.activity.update');
    Route::delete('/feedback-activity-delete/{id}', [ActivityController::class, 'feedbackActivityDelete'])->name('lead.feedback.activity.delete');


    Route::get('orders' , [SalesController::class, 'index'])->name('orders.index');
    Route::get('orders/new' , [SalesController::class, 'create'])->name('orders.create');
    Route::get('products' , [SalesController::class, 'product_index'])->name('product.index');
    Route::get('products/new' , [SalesController::class, 'product_create'])->name('product.create');
    Route::post('products-store' , [SalesController::class, 'product_store'])->name('product.store');
    Route::get('pricelists' , [SalesController::class, 'Pricelists_index'])->name('pricelists.index');
    Route::get('pricelists/new' , [SalesController::class, 'Pricelists_create'])->name('pricelists.create');
    Route::get('teams_create/new/{id?}' , [SalesController::class, 'Teams_create'])->name('sales.create');
    Route::post('sales/teams_store' , [SalesController::class, 'teams_store'])->name('sales.teams_store');


    Route::get('configuration/activity-types' , [ConfigurationController::class, 'index'])->name('configuration.activitytype');
    Route::post('configuration/Store_activity_types' , [ConfigurationController::class, 'Store_activity_types'])->name('configuration.Store_activity_types');
    Route::post('configuration/update_activity_types/{id}' , [ConfigurationController::class, 'update_activity_types'])->name('configuration.update_activity_types');
    Route::get('configuration/delete_activity_types/{id}' , [ConfigurationController::class, 'delete_activity_types'])->name('configuration.delete_activity_types');
    Route::get('configuration/recurring_index' , [ConfigurationController::class, 'recurring_index'])->name('configuration.recurring_index');
    Route::post('configuration/store_recurring' , [ConfigurationController::class, 'store_recurring'])->name('configuration.store_recurring');
    Route::post('configuration/update_recurring/{id}' , [ConfigurationController::class, 'update_recurring'])->name('configuration.update_recurring');
    Route::get('configuration/delete_recurring/{id}' , [ConfigurationController::class, 'delete_recurring'])->name('configuration.delete_recurring');
    Route::get('configuration/tag_index' , [ConfigurationController::class, 'tag_index'])->name('configuration.tag_index');
    Route::post('configuration/store_tag' , [ConfigurationController::class, 'store_tag'])->name('configuration.store_tag');
    Route::post('configuration/update_tag/{id}' , [ConfigurationController::class, 'update_tag'])->name('configuration.update_tag');
    Route::get('configuration/delete_tag/{id}' , [ConfigurationController::class, 'delete_tag'])->name('configuration.delete_tag');
    Route::get('configuration/lostreasons_index/' , [ConfigurationController::class, 'lostreasons_index'])->name('configuration.lostreasons_index');
    Route::post('configuration/store_lostreasons/' , [ConfigurationController::class, 'store_lostreasons'])->name('configuration.store_lostreasons');
    Route::post('configuration/update_lostreasons/{id}' , [ConfigurationController::class, 'update_lostreasons'])->name('configuration.update_lostreasons');
    Route::get('configuration/delete_lostreasons/{id}' , [ConfigurationController::class, 'delete_lostreasons'])->name('configuration.delete_lostreasons');


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
    Route::get('/lead-add/{id?}/{index?}', [LeadController::class, 'create'])->name('lead.create');
    Route::POST('/lead-store', [LeadController::class, 'store'])->name('lead.store');
    Route::POST('/storeLead', [LeadController::class, 'storeLead'])->name('lead.storeLead');
    Route::get('/lead-kanban', [LeadController::class, 'show'])->name('lead.kanban')->defaults('lead', 'kanban');
    Route::post('/lead/updatePriority', [LeadController::class, 'updatePriority'])->name('lead.updatePriority');
    Route::get('/lead-calendar', [LeadController::class, 'calendar'])->name('lead.calendar')->defaults('lead', 'calendar');
    Route::get('/activities', [LeadController::class, 'fetchActivities'])->name('activities.fetch');
    Route::get('/activity-detail/{id}', [LeadController::class, 'activityDetail'])->name('lead.activityDetail');
    Route::post('/lead-filter', [LeadController::class, 'filter'])->name('lead.filter');
    Route::get('/lead-activities', [LeadController::class, 'activities'])->name('lead.activities');
    Route::post('/custom-filter', [LeadController::class, 'customFilter'])->name('lead.custom.filter');
    Route::post('/lead-send_message', [LeadController::class, 'send_message'])->name('lead.send_message');
    Route::post('/lead-send_message_by_lead', [LeadController::class, 'send_message_by_lead'])->name('lead.send_message_by_lead');
    Route::post('/lead-deleteImage', [LeadController::class, 'deleteImage'])->name('lead.deleteImage');
    Route::post('/lead-deleteImage1', [LeadController::class, 'deleteImage1'])->name('lead.deleteImage1');
    Route::get('/lead-downloadAllImages/{id}', [LeadController::class, 'downloadAllImages'])->name('lead.downloadAllImages');
    Route::get('/lead-delete_send_message', [LeadController::class, 'delete_send_message'])->name('lead.delete_send_message');
    Route::get('/lead-click_star', [LeadController::class, 'click_star'])->name('lead.click_star');
    Route::post('/lead-restore_lead', [LeadController::class, 'restore_lead'])->name('lead.restore_lead');
    Route::post('/lead-log_notes', [LeadController::class, 'log_notes'])->name('lead.log_notes');
    Route::get('/lead-delete_send_message_notes', [LeadController::class, 'delete_send_message_notes'])->name('lead.delete_send_message_notes');
    Route::get('/lead-click_star_notes', [LeadController::class, 'click_star_notes'])->name('lead.click_star_notes');
    Route::get('/lead-exportLead', [LeadController::class, 'exportLead'])->name('lead.exportLead');
    Route::get('/lead-import', [LeadController::class, 'importlead'])->name('lead.importlead');
    Route::post('/lead-import-store', [LeadController::class, 'import'])->name('lead.import');
    Route::get('/lead-downloadAllImagessend_message', [LeadController::class, 'downloadAllImagessend_message'])->name('lead.downloadAllImagessend_message');

    // Favorites Filter Route
    Route::post('/lead-favorites-filter',[LeadController::class,'favoritesFilter'])->name('lead.favorites.filter');
    Route::delete('/delete-lead-favorites/{id}', [LeadController::class, 'deleteFavoritesFilter']);



    Route::get('/leads/similar/{productName}', [LeadController::class, 'showSimilarLeads'])->name('leads.similar');
    Route::post('/leads/storeLost', [LeadController::class, 'storeLost'])->name('leads.storeLost');
    Route::post('/leads/manageLostReasons', [LeadController::class, 'manageLostReasons'])->name('leads.markAsLost');

    // Activities Store Route
    Route::post('/schedule-activity', [LeadController::class, 'scheduleActivityStore'])->name('lead.scheduleActivityStore');
    Route::get('/activities-edit/{id?}', [LeadController::class, 'activitiesEdit'])->name('lead.activitiesEdit');
    Route::post('/activities/update', [LeadController::class, 'activitiesUpdate'])->name('lead.activitiesUpdate');
    Route::delete('/activities/{id?}', [LeadController::class, 'activitiesDelete'])->name('lead.activitiesDelete');
    Route::post('/update-activity-status', [LeadController::class, 'activitiesUpdateStatus'])->name('lead.activitiesUpdateStatus');
    Route::post('/upload-file', [LeadController::class, 'uploadFile'])->name('lead.uploadFile');
    Route::post('/lead/delete-document', [LeadController::class, 'deleteDocument'])->name('lead.deleteDocument');
    Route::post('/lead/click_follow', [LeadController::class, 'click_follow'])->name('lead.click_follow');
    Route::post('/lead/invite-followers', [LeadController::class, 'invite_followers'])->name('lead.invite_followers');
    Route::post('/lead/remove_follower', [LeadController::class, 'removeFollower'])->name('lead.remove_follower');
    Route::post('/attachments/add', [LeadController::class, 'attachmentsAdd'])->name('lead.attachmentsAdd');
    Route::delete('/attachments/delete-file', [LeadController::class, 'attachmentsDeleteFile'])->name('lead.attachmentsDeleteFile');
    Route::post('DuplicateLead', [LeadController::class, 'DuplicateLead'])->name('lead.DuplicateLead');
    Route::post('DeleteLead', [LeadController::class, 'DeleteLead'])->name('lead.DeleteLead');



    
    // Star Store Route
    Route::post('/star-update/{id}', [ActivityController::class, 'startStore'])->name('start-store');


    // Check Email Or Phone Exists Route
    Route::post('/check-email', [LeadController::class, 'checkEmail'])->name('checkEmail');
    Route::post('/check-phone', [LeadController::class, 'checkPhone'])->name('checkPhone');

    //fetch-states
    Route::post('/fetch-states', [LeadController::class, 'fetchState'])->name('fetch-states');

    // Add Title
    Route::post('/add-title', [LeadController::class, 'addTitle'])->name('add-title');
    Route::post('/add-tag', [LeadController::class, 'addTag'])->name('add-tag');
    Route::post('/add-campaign', [LeadController::class, 'addCampaign'])->name('add-campaign');
    Route::post('/add-medium', [LeadController::class, 'addMedium'])->name('add-medium');
    Route::post('/add-source', [LeadController::class, 'addSource'])->name('add-source');


    // Activity Route
    Route::get('/all-activities',[ActivityController::class,'allActivities'])->name('lead.allActivities');
    Route::post('/all-activities-data', [ActivityController::class, 'AllActivitiesGetLeads'])->name('lead.AllActivitiesGetLeads');
    Route::post('/activity/done/{id}', [ActivityController::class, 'markAsDone'])->name('activity.markAsDone');
    Route::post('/activity/cancel/{id}', [ActivityController::class, 'cancelActivity'])->name('activity.cancel');
    Route::post('/activity/snooze/{id}', [ActivityController::class, 'snoozeActivity'])->name('activity.snooze');
    Route::get('/activity-kanban', [ActivityController::class, 'kanbanIndex'])->name('activity.kanban');
    Route::get('/activity-filter', [ActivityController::class, 'activityFilter'])->name('activity.filter');
    Route::post('/activity-custom-filter', [ActivityController::class, 'activityCustomFilter'])->name('activity.custom.filter');
    Route::get('/filter-activities', [ActivityController::class, 'filterActivities'])->name('activity.filter.activities');
    Route::post('/filter-activity-custom-filter', [ActivityController::class, 'filterActivityCustomFilter'])->name('filter-activity.custom.filter');



    Route::get('/graph/index', [GraphController::class, 'index'])->name('lead.graph');
    Route::get('/lead-graph-filter', [GraphController::class, 'leadGrapgFilter'])->name('lead.leadGrapgFilter');
    Route::get('/lead-graph-custom-filter', [GraphController::class, 'leadGrapgCustomFilter'])->name('lead.leadGrapgCustomFilter');
    Route::get('/lead-graph-group-filter', [GraphController::class, 'leadGrapgGroupFilter'])->name('lead.leadGrapgGroupFilter');


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
