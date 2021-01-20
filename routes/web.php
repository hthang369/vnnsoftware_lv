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

if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}

Route::get('/', function () {
    return redirect('system-admin/company');
});

Auth::routes();

Route::post('login', 'User\UserController@login')->name('User.Login');
Route::post('register', 'User\UserController@register')->name('User.New');

//, 'middleware' => ['auth']
Route::group(['prefix' => 'system-admin', 'middleware' => ['auth']], function () {
    // company route
    Route::group(['prefix' => 'company'], function () {
        Route::get('/', 'Company\CompanyController@index')->name('LAKA company manage.Company list');
        Route::get('detail/{id}', 'Company\CompanyController@detail')->name('LAKA company manage.Detail');
        Route::get('update/{id}', 'Company\CompanyController@updateForm')->name('LAKA company manage.Update company info.form');
        Route::post('update/{id}', 'Company\CompanyController@update')->name('LAKA company manage.Update company info');
        Route::get('new', 'Company\CompanyController@newForm')->name('LAKA company manage.Add company.form');
        Route::post('new', 'Company\CompanyController@register')->name('LAKA company manage.Add company');
        Route::get('delete/{id}', 'Company\CompanyController@delete')->name('LAKA company manage.Delete company');
    });

    // business plan route
    Route::group(['prefix' => 'business-plan'], function () {
        Route::get('/', 'BusinessPlan\BusinessPlanController@index')->name('LAKA business plan.Business plan list');
        Route::get('detail/{id}', 'BusinessPlan\BusinessPlanController@detailForm')->name('LAKA business plan.Detail');
        Route::get('new', 'BusinessPlan\BusinessPlanController@newForm')->name('LAKA business plan.Add business plan.form');
        Route::post('new', 'BusinessPlan\BusinessPlanController@new')->name('LAKA business plan.Add business plan');
        Route::get('update/{id}', 'BusinessPlan\BusinessPlanController@updateForm')->name('LAKA business plan.Update business plan info.form');
        Route::post('update/{id}', 'BusinessPlan\BusinessPlanController@update')->name('LAKA business plan.Update business plan info');
        Route::get('delete/{id}', 'BusinessPlan\BusinessPlanController@delete')->name('LAKA business plan.Delete business plan');
    });

    // user management route
    Route::group(['prefix' => 'user-management'], function () {
        Route::get('/', 'User\UserController@index')->name('LMT user manage.LMT user list');
        Route::get('detail/{id}', 'User\UserController@detail')->name('LMT user manage.LMT user info (detail)');
        Route::get('update/{id}', 'User\UserController@updateForm')->name('LMT user manage.Update.form[Permission]');
        Route::post('update/{id}', 'User\UserController@update')->name('LMT user manage.Update.[Permission]');
        Route::get('update-password/{id}',
            'User\UserController@updatePasswordForm')->name('LMT user manage.Update Password.form');
        Route::post('update-password', 'User\UserController@updatePassword')->name('LMT user manage.Update Password');
        Route::get('new', 'User\UserController@newForm')->name('LMT user manage.Add LMT user.form');
        Route::post('new', 'User\UserController@register')->name('LMT user manage.Add LMT user');
        Route::get('delete/{id}', 'User\UserController@delete')->name('LMT user manage.LMT user delete');
    });

    // role management route
    Route::group(['prefix' => 'role'], function () {
        Route::get('/', 'Role\RoleController@index')->name('LMT role manage.Role list');
        Route::get('detail/{id}', 'Role\RoleController@detail')->name('LMT role manage.Detail');
        Route::get('update/{id}', 'Role\RoleController@updateForm')->name('LMT role manage.Update.form');
        Route::post('update/{id}', 'Role\RoleController@update')->name('LMT role manage.Update');
        Route::get('new', 'Role\RoleController@newForm')->name('LMT role manage.Add role.form[Permission]');
        Route::post('new', 'Role\RoleController@register')->name('LMT role manage.Add role.[Permission]');
        Route::get('delete/{id}', 'Role\RoleController@delete')->name('LMT role manage.Role delete');
        Route::get('set-permission/{id}',
            'RoleHasFeatureApi\RoleHasFeatureApiController@setPermissionForm')->name('LMT role manage.Role setting.form[Permission]');
        Route::post('set-permission/{id}',
            'RoleHasFeatureApi\RoleHasFeatureApiController@setPermission')->name('LMT role manage.Role setting.[Permission]');
    });

    // feature-api management route
    Route::group(['prefix' => 'feature-api'], function () {
        Route::get('/', 'FeatureApi\FeatureApiController@index')->name('Feature Api.List[Permission]');
        Route::get('delete/{id}', 'FeatureApi\FeatureApiController@delete')->name('Feature Api.Delete');
        Route::get('save-all-to-db',
            'FeatureApi\FeatureApiController@saveAllRoutesToDB')->name('Feature Api.Save all to DB[Permission]');
    });

    // version route
    Route::get('version', 'Version\VersionController@index')->name('Version.List');

    // role has feature-api management route
//    Route::group(['prefix' => 'role-has-feature-api'], function () {
//        Route::get('ajax-check-is-used-feature-api/{feature_id}', 'RoleHasFeatureApi\RoleHasFeatureApiController@ajaxCheckIsUsedFeatureApi')->name('role-has-Feature Api.ajax-check-is-used-feature-api');
//    });

    // approval api token route
    Route::group(['prefix' => 'approval-api-token'], function () {
        Route::get('/', 'ApprovalApiToken\ApprovalApiTokenController@index')->name('LAKA user manage.LAKA User list');
        Route::get('approval-token/{id}',
            'ApprovalApiToken\ApprovalApiTokenController@approvalToken')->name('LAKA user manage.Approve access token');
        Route::get('stop-token/{id}',
            'ApprovalApiToken\ApprovalApiTokenController@stopToken')->name('LAKA user manage.Pending access token');
        Route::get('reopen-token/{id}',
            'ApprovalApiToken\ApprovalApiTokenController@reopenToken')->name('LAKA user manage.ReOpen access Token');
        Route::get('delete-token/{id}',
            'ApprovalApiToken\ApprovalApiTokenController@deleteToken')->name('LAKA user manage.Delete access Token');
    });

    // user management for app chat route
    Route::group(['prefix' => 'user-management-for-app-chat'], function () {
        Route::get('/', 'UserManagementForAppChat\UserManagementForAppChatController@index')->name('LAKA user manage.LAKA User list');
        Route::get('detail/{id}', 'UserManagementForAppChat\UserManagementForAppChatController@detailForm')->name('LAKA user manage.Detail');
        Route::get('new', 'UserManagementForAppChat\UserManagementForAppChatController@newForm')->name('LAKA user manage.Create LAKA user.form');
        Route::post('new', 'UserManagementForAppChat\UserManagementForAppChatController@register')->name('LAKA user manage.Create LAKA user');
        Route::get('delete/{id}', 'UserManagementForAppChat\UserManagementForAppChatController@delete')->name('LAKA user manage.Delete LAKA user');
    });
});
