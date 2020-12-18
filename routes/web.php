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
    return redirect('system-admin/company');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('login', 'User\UserController@login')->name('user.login');
Route::post('register', 'User\UserController@register')->name('user.register');

//, 'middleware' => ['auth']
Route::group(['prefix' => 'system-admin', 'middleware' => ['auth']], function () {
    // company route
    Route::group(['prefix' => 'company'], function () {
        Route::get('/', 'Company\CompanyController@index')->name('company.list');
        Route::get('detail/{id}', 'Company\CompanyController@detail')->name('company.detail');
        Route::get('update/{id}', 'Company\CompanyController@updateForm')->name('company.update.form');
        Route::post('update/{id}', 'Company\CompanyController@update')->name('company.update');
        Route::get('new', 'Company\CompanyController@newForm')->name('company.register.form');
        Route::post('new', 'Company\CompanyController@register')->name('company.register');
        Route::get('delete/{id}', 'Company\CompanyController@delete')->name('company.delete');
    });

    // business plan route
    Route::group(['prefix' => 'business-plan'], function () {
        Route::get('/', 'BusinessPlan\BusinessPlanController@index')->name('business-plan.list');
        Route::get('detail/{id}', 'BusinessPlan\BusinessPlanController@detailForm')->name('business-plan.detail');
        Route::get('new', 'BusinessPlan\BusinessPlanController@newForm')->name('business-plan.new.form');
        Route::post('new', 'BusinessPlan\BusinessPlanController@new')->name('business-plan.new');
        Route::get('update/{id}', 'BusinessPlan\BusinessPlanController@updateForm')->name('business-plan.update.form');
        Route::post('update/{id}', 'BusinessPlan\BusinessPlanController@update')->name('business-plan.update');
        Route::get('delete/{id}', 'BusinessPlan\BusinessPlanController@delete')->name('business-plan.delete');
    });

    // user management route
    Route::group(['prefix' => 'user-management'], function () {
        Route::get('/', 'User\UserController@index')->name('user-management.list');
        Route::get('detail/{id}', 'User\UserController@detail')->name('user-management.detail');
        Route::get('update/{id}', 'User\UserController@updateForm')->name('user-management.update.form');
        Route::post('update/{id}', 'User\UserController@update')->name('user-management.update');
        Route::get('update-password/{id}', 'User\UserController@updatePasswordForm')->name('user-management.update-password.form');
        Route::post('update-password', 'User\UserController@updatePassword')->name('user-management.update-password');
        Route::get('new', 'User\UserController@newForm')->name('user-management.new');
        Route::post('new', 'User\UserController@register')->name('user-management.register');
        Route::get('delete/{id}', 'User\UserController@delete')->name('user-management.delete');
    });

    // role management route
    Route::group(['prefix' => 'role'], function () {
        Route::get('/', 'Role\RoleController@index')->name('role.list');
        Route::get('detail/{id}', 'Role\RoleController@detail')->name('role.detail');
        Route::get('update/{id}', 'Role\RoleController@updateForm')->name('role.update.form');
        Route::post('update/{id}', 'Role\RoleController@update')->name('role.update');
        Route::get('new', 'Role\RoleController@newForm')->name('role.new');
        Route::post('new', 'Role\RoleController@register')->name('role.register');
        Route::get('delete/{id}', 'Role\RoleController@delete')->name('role.delete');
    });

    // feature-api management route
    Route::group(['prefix' => 'feature-api'], function () {
        Route::get('/', 'FeatureApi\FeatureApiController@index')->name('feature-api.list');
        Route::get('delete/{id}', 'FeatureApi\FeatureApiController@delete')->name('feature-api.delete');
        Route::get('save-all-to-db', 'FeatureApi\FeatureApiController@saveAllRoutesToDB')->name('feature-api.saveAllRoutesToDB');
    });

    // version route
    Route::get('version', 'Version\VersionController@index')->name('version.list');

    // role has feature-api management route
    Route::group(['prefix' => 'role-has-feature-api'], function () {
        Route::get('set-permission/{id}', 'RoleHasFeatureApi\RoleHasFeatureApiController@setPermissionForm')->name('role-has-feature-api.set-permission.form');
        Route::post('set-permission/{id}', 'RoleHasFeatureApi\RoleHasFeatureApiController@setPermission')->name('role-has-feature-api.set-permission');
        Route::get('ajax-check-is-used-feature-api/{feature_id}', 'RoleHasFeatureApi\RoleHasFeatureApiController@ajaxCheckIsUsedFeatureApi')->name('role-has-feature-api.ajax-check-is-used-feature-api');
    });

    // approval api token route
    Route::group(['prefix' => 'approval-api-token'], function () {
        Route::get('/', 'ApprovalApiToken\ApprovalApiTokenController@index')->name('approval-api-token.list');
        Route::get('approval-token/{id}', 'ApprovalApiToken\ApprovalApiTokenController@approvalToken')->name('approval-api-token.approval-token');
        Route::get('stop-token/{id}', 'ApprovalApiToken\ApprovalApiTokenController@stopToken')->name('approval-api-token.stop-token');
        Route::get('reopen-token/{id}', 'ApprovalApiToken\ApprovalApiTokenController@reopenToken')->name('approval-api-token.reopen-token');
        Route::get('delete-token/{id}', 'ApprovalApiToken\ApprovalApiTokenController@deleteToken')->name('approval-api-token.delete-token');
    });

    // top menu route
    Route::group(['prefix' => 'top-menu'], function () {
        Route::get('/', 'TopMenu\TopMenuController@index')->name('top-menu.list');
        Route::get('detail/{id}', 'TopMenu\TopMenuController@detail')->name('top-menu.detail');
        Route::get('update/{id}', 'TopMenu\TopMenuController@updateForm')->name('top-menu.update.form');
        Route::post('update/{id}', 'TopMenu\TopMenuController@update')->name('top-menu.update');
        Route::get('new', 'TopMenu\TopMenuController@newForm')->name('top-menu.register.form');
        Route::post('new', 'TopMenu\TopMenuController@register')->name('top-menu.register');
        Route::get('delete/{id}', 'TopMenu\TopMenuController@delete')->name('top-menu.delete');
    });

    // left menu route
    Route::group(['prefix' => 'left-menu'], function () {
        Route::get('/', 'LeftMenu\LeftMenuController@index')->name('left-menu.list');
        Route::get('detail/{id}', 'LeftMenu\LeftMenuController@detail')->name('left-menu.detail');
        Route::get('update/{id}', 'LeftMenu\LeftMenuController@updateForm')->name('left-menu.update.form');
        Route::post('update/{id}', 'LeftMenu\LeftMenuController@update')->name('left-menu.update');
        Route::get('new', 'LeftMenu\LeftMenuController@newForm')->name('left-menu.register.form');
        Route::post('new', 'LeftMenu\LeftMenuController@register')->name('left-menu.register');
        Route::get('delete/{id}', 'LeftMenu\LeftMenuController@delete')->name('left-menu.delete');
    });
});
