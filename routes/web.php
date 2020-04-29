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

Route::get('/user', 'AdminController@userIndex')->name('admin-userIndex');
Route::get('/roles', 'AdminController@rolesIndex')->name('admin-rolesIndex');
Route::get('/audit-log', 'AdminController@logIndex')->name('admin-logIndex');

Route::get('/category', 'CategoryController@Index')->name('compliance-category');
Route::post('/category-add', 'CategoryController@add')->name('add-category');
Route::post('/category-edit', 'CategoryController@edit')->name('edit-category');
Route::post('/category-update', 'CategoryController@update')->name('update-category');
Route::post('/category-delete', 'CategoryController@delete')->name('delete-category');


Route::get('/classification', 'ClassificationController@Index')->name('compliance-classification');
Route::get('/compliance-evaluation', 'ComplianceEvalController@Index')->name('compliance-eval');
Route::get('/compliance-status', 'ComplianceStatusController@Index')->name('compliance-status');
Route::get('/criteria', 'CriteriaController@Index')->name('compliance-criteria');
Route::get('/permit-period', 'PermitPeriodController@Index')->name('compliance-permitPeriod');
Route::get('/probability', 'ProbabilityController@Index')->name('compliance-probability');
Route::get('/related', 'RelatedController@Index')->name('compliance-related');
Route::get('/severity', 'SeverityController@Index')->name('compliance-severity');
