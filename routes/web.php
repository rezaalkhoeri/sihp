<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('sihp.home');
});

Route::get('/login', 'AdminController@loginIndex')->name('login');

Route::group(['prefix' => 'SIHP/compliance'], function () {
    Route::get('/category', 'CategoryController@Index')->name('compliance-category');
    Route::post('/category-add', 'CategoryController@add')->name('add-category');
    Route::post('/category-edit', 'CategoryController@edit')->name('edit-category');
    Route::post('/category-update', 'CategoryController@update')->name('update-category');
    Route::post('/category-delete', 'CategoryController@delete')->name('delete-category');
    
    
    Route::get('/classification', 'ClassificationController@Index')->name('compliance-classification');
    Route::post('/classification-add', 'ClassificationController@add')->name('add-classification');
    Route::post('/classification-edit', 'ClassificationController@edit')->name('edit-classification');
    Route::post('/classification-update', 'ClassificationController@update')->name('update-classification');
    Route::post('/classification-delete', 'ClassificationController@delete')->name('delete-classification');
    
    Route::get('/compliance-status', 'ComplianceStatusController@Index')->name('compliance-status');
    Route::post('/compliance-status-add', 'ComplianceStatusController@add')->name('add-compliance-status');
    Route::post('/compliance-status-edit', 'ComplianceStatusController@edit')->name('edit-compliance-status');
    Route::post('/compliance-status-update', 'ComplianceStatusController@update')->name('update-compliance-status');
    Route::post('/compliance-status-delete', 'ComplianceStatusController@delete')->name('delete-compliance-status');
    
    Route::get('/criteria', 'CriteriaController@Index')->name('compliance-criteria');
    Route::post('/criteria-add', 'CriteriaController@add')->name('add-criteria');
    Route::post('/criteria-edit', 'CriteriaController@edit')->name('edit-criteria');
    Route::post('/criteria-update', 'CriteriaController@update')->name('update-criteria');
    Route::post('/criteria-delete', 'CriteriaController@delete')->name('delete-criteria');
    
    Route::get('/permit-period', 'PermitPeriodController@Index')->name('compliance-permitPeriod');
    Route::post('/permit-period-add', 'PermitPeriodController@add')->name('add-permit-period');
    Route::post('/permit-period-edit', 'PermitPeriodController@edit')->name('edit-permit-period');
    Route::post('/permit-period-update', 'PermitPeriodController@update')->name('update-permit-period');
    Route::post('/permit-period-delete', 'PermitPeriodController@delete')->name('delete-permit-period');
    
    Route::get('/probability', 'ProbabilityController@Index')->name('compliance-probability');
    Route::post('/probability-add', 'ProbabilityController@add')->name('add-probability');
    Route::post('/probability-edit', 'ProbabilityController@edit')->name('edit-probability');
    Route::post('/probability-update', 'ProbabilityController@update')->name('update-probability');
    Route::post('/probability-delete', 'ProbabilityController@delete')->name('delete-probability');
    
    Route::get('/related', 'RelatedController@Index')->name('compliance-related');
    Route::post('/related-add', 'RelatedController@add')->name('add-related');
    Route::post('/related-edit', 'RelatedController@edit')->name('edit-related');
    Route::post('/related-update', 'RelatedController@update')->name('update-related');
    Route::post('/related-delete', 'RelatedController@delete')->name('delete-related');
    
    Route::get('/severity', 'SeverityController@Index')->name('compliance-severity');
    Route::post('/severity-add', 'SeverityController@add')->name('add-severity');
    Route::post('/severity-edit', 'SeverityController@edit')->name('edit-severity');
    Route::post('/severity-update', 'SeverityController@update')->name('update-severity');
    Route::post('/severity-delete', 'SeverityController@delete')->name('delete-severity');
    
    Route::get('/compliance-evaluation', 'ComplianceEvalController@Index')->name('compliance-eval');     
});

Route::group(['prefix' => 'SIHP/admin'], function () {
    Route::get('/user', 'AdminController@userIndex')->name('admin-userIndex');
    Route::get('/roles', 'AdminController@rolesIndex')->name('admin-rolesIndex');
    Route::get('/audit-log', 'AdminController@logIndex')->name('admin-logIndex');
});