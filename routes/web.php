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
        Route::get('/', 'Company\CompanyController@index')->name('Company.List');
        Route::get('detail/{id}', 'Company\CompanyController@detail')->name('Company.Detail');
        Route::get('update/{id}', 'Company\CompanyController@updateForm')->name('Company.Update.form');
        Route::post('update/{id}', 'Company\CompanyController@update')->name('Company.Update');
        Route::get('new', 'Company\CompanyController@newForm')->name('Company.New.form');
        Route::post('new', 'Company\CompanyController@register')->name('Company.New');
        Route::get('delete/{id}', 'Company\CompanyController@delete')->name('Company.Delete');
        Route::group(['prefix' => 'sort'], function () {
            Route::get('name', 'Company\CompanyController@sort')->name('Company.Sort.Name');
            Route::get('email', 'Company\CompanyController@sort')->name('Company.Sort.Email');
            Route::get('phone', 'Company\CompanyController@sort')->name('Company.Sort.Phone');
            Route::get('address', 'Company\CompanyController@sort')->name('Company.Sort.Address');
            Route::get('business-plan', 'Company\CompanyController@sort')->name('Company.Sort.Business Plan');
        });
    });

    // business plan route
    Route::group(['prefix' => 'business-plan'], function () {
        Route::get('/', 'BusinessPlan\BusinessPlanController@index')->name('Business Plan.List');
        Route::get('detail/{id}', 'BusinessPlan\BusinessPlanController@detailForm')->name('Business Plan.Detail');
        Route::get('new', 'BusinessPlan\BusinessPlanController@newForm')->name('Business Plan.New.form');
        Route::post('new', 'BusinessPlan\BusinessPlanController@new')->name('Business Plan.New');
        Route::get('update/{id}', 'BusinessPlan\BusinessPlanController@updateForm')->name('Business Plan.Update.form');
        Route::post('update/{id}', 'BusinessPlan\BusinessPlanController@update')->name('Business Plan.Update');
        Route::get('delete/{id}', 'BusinessPlan\BusinessPlanController@delete')->name('Business Plan.Delete');
        Route::group(['prefix' => 'sort'], function () {
            Route::get('name', 'BusinessPlan\BusinessPlanController@sort')->name('Company.Sort.Name');
            Route::get('description', 'BusinessPlan\BusinessPlanController@sort')->name('Company.Sort.Description');
        });
    });

    // user management route
    Route::group(['prefix' => 'user-management'], function () {
        Route::get('/', 'User\UserController@index')->name('User Management.List');
        Route::get('detail/{id}', 'User\UserController@detail')->name('User Management.Detail');
        Route::get('update/{id}', 'User\UserController@updateForm')->name('User Management.Update[Permission].form');
        Route::post('update/{id}', 'User\UserController@update')->name('User Management.Update[Permission]');
        Route::get('update-password/{id}',
            'User\UserController@updatePasswordForm')->name('User Management.Update Password.form');
        Route::post('update-password', 'User\UserController@updatePassword')->name('User Management.Update Password');
        Route::get('new', 'User\UserController@newForm')->name('User Management.New.form');
        Route::post('new', 'User\UserController@register')->name('User Management.New');
        Route::get('delete/{id}', 'User\UserController@delete')->name('User Management.Delete');
        Route::group(['prefix' => 'sort'], function () {
            Route::get('name', 'User\UserController@sort')->name('User.Sort.Name');
            Route::get('email', 'User\UserController@sort')->name('User.Sort.Email');
            Route::get('phone', 'User\UserController@sort')->name('User.Sort.Phone');
            Route::get('address', 'User\UserController@sort')->name('User.Sort.Address');
        });
    });

    // role management route
    Route::group(['prefix' => 'role'], function () {
        Route::get('/', 'Role\RoleController@index')->name('Role.List');
        Route::get('detail/{id}', 'Role\RoleController@detail')->name('Role.Detail');
        Route::get('update/{id}', 'Role\RoleController@updateForm')->name('Role.Update.form');
        Route::post('update/{id}', 'Role\RoleController@update')->name('Role.Update');
        Route::get('new', 'Role\RoleController@newForm')->name('Role.New[Permission].form');
        Route::post('new', 'Role\RoleController@register')->name('Role.New[Permission]');
        Route::get('delete/{id}', 'Role\RoleController@delete')->name('Role.Delete');
        Route::get('set-permission/{id}',
            'RoleHasFeatureApi\RoleHasFeatureApiController@setPermissionForm')->name('Role.Set Permission For Role[Permission].form');
        Route::post('set-permission/{id}',
            'RoleHasFeatureApi\RoleHasFeatureApiController@setPermission')->name('Role.Set Permission For Role[Permission]');
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
        Route::get('/', 'ApprovalApiToken\ApprovalApiTokenController@index')->name('Approval Api Token.List');
        Route::get('approval-token/{id}',
            'ApprovalApiToken\ApprovalApiTokenController@approvalToken')->name('Approval Api Token.Approval Token');
        Route::get('stop-token/{id}',
            'ApprovalApiToken\ApprovalApiTokenController@stopToken')->name('Approval Api Token.Stop Token');
        Route::get('reopen-token/{id}',
            'ApprovalApiToken\ApprovalApiTokenController@reopenToken')->name('Approval Api Token.ReOpen Token');
        Route::get('delete-token/{id}',
            'ApprovalApiToken\ApprovalApiTokenController@deleteToken')->name('Approval Api Token.Delete Token');
    });
});
