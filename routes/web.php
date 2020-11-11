<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'system-admin'], function () {
    // company route
    Route::get('/company', 'Company\CompanyController@index')->name('company');
    Route::get('/company/detail/{id}', 'Company\CompanyController@companyDetail')->name('company-detail');
    Route::get('/company/new', 'Company\CompanyController@newForm')->name('company-new');
    Route::get('/company/update/{id}', 'Company\CompanyController@updateForm')->name('company-update');
    // business plan route
    Route::get('/business-plan', 'BusinessPlan\BusinessPlanController@index')->name('business-plan');
    Route::get('/business-plan/detail/{id}', 'BusinessPlan\BusinessPlanController@businessDetail')->name('business-plan-detail');
    Route::get('/business-plan/new', 'BusinessPlan\BusinessPlanController@newForm')->name('business-plan-new');
    Route::get('/business-plan/update/{id}', 'BusinessPlan\BusinessPlanController@updateForm')->name('business-plan-update');
});
