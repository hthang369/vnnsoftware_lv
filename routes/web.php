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

    Route::get('/', 'System\SystemHomeController@index')->name('business-plan');
    Route::get('/company-details', 'Company\CompanyController@companyDetails')->name('business-plan-company-details');
    Route::get('/business-plan', 'BusinessPlan\BusinessPlanController@index')->name('business-plan-business-plan');
    Route::get('/business-plan/detail/{id}', 'BusinessPlan\BusinessPlanController@detail')->name('business-plan-business-plan-detail');
});
