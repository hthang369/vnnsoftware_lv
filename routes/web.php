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

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}

Route::get('/', function () {
    return redirect('system-admin/version');
});

Auth::routes();

// Route::post('register', 'User\UserController@register')->name('User.New');
Route::get('research-list', 'ResearchLaravel\ResearchLaravelController@list');

Route::group(['prefix' => 'system-admin', 'middleware' => ['auth:web', 'permission']], function () {
    // version route
    Route::get('version', 'Versions\VersionController@index')->name('version.index');//->middleware("log.activity:Version index");

    Route::resource('company', 'Companys\CompanyController');
//     // company route
//     Route::group(['prefix' => 'company'], function () {
//         Route::get('/', 'Company\CompanyController@index')->name('LAKA company manage.Company index')->middleware("log.activity:Company index");
//         Route::get('list', 'Company\CompanyController@list')->name('LAKA company manage.Company list')->middleware("log.activity:Company list");
//         Route::get('detail/{id}', 'Company\CompanyController@detail')->name('LAKA company manage.Detail')->middleware("log.activity:Company detail");
//         Route::get('update/{id}', 'Company\CompanyController@updateForm')->name('LAKA company manage.Update company info')->middleware("log.activity:Update company info");
//         Route::post('update/{id}', 'Company\CompanyController@update')->name('LAKA company manage.Update company info')->middleware("log.activity:Update company info");
//         Route::get('new', 'Company\CompanyController@newForm')->name('LAKA company manage.Add company')->middleware("log.activity:Add company");
//         Route::post('new', 'Company\CompanyController@register')->name('LAKA company manage.Add company')->middleware("log.activity:Add company");
//         Route::get('delete/{id}', 'Company\CompanyController@delete')->name('LAKA company manage.Delete company')->middleware("log.activity:Delete company");
//         Route::get('search', 'Company\CompanyController@searchForm')->name('LAKA company manage.Search company')->middleware("log.activity:Search company");
//     });

//     // business plan route
//     Route::group(['prefix' => 'business-plan'], function () {
//         Route::get('/', 'BusinessPlan\BusinessPlanController@index')->name('LAKA business plan.Business plan index')->middleware("log.activity:Business plan index");
//         Route::get('list', 'BusinessPlan\BusinessPlanController@list')->name('LAKA business plan.Business plan list')->middleware("log.activity:Business plan list");
//         Route::get('detail/{id}', 'BusinessPlan\BusinessPlanController@detailForm')->name('LAKA business plan.Detail')->middleware("log.activity:Business plan detail");
//         Route::get('new', 'BusinessPlan\BusinessPlanController@newForm')->name('LAKA business plan.Add business plan')->middleware("log.activity:Add business plan");
//         Route::post('new', 'BusinessPlan\BusinessPlanController@new')->name('LAKA business plan.Add business plan')->middleware("log.activity:Add business plan");
//         Route::get('update/{id}', 'BusinessPlan\BusinessPlanController@updateForm')->name('LAKA business plan.Update business plan info')->middleware("log.activity:Update business plan info");
//         Route::post('update/{id}', 'BusinessPlan\BusinessPlanController@update')->name('LAKA business plan.Update business plan info')->middleware("log.activity:Update business plan info");
//         Route::get('delete/{id}', 'BusinessPlan\BusinessPlanController@delete')->name('LAKA business plan.Delete business plan')->middleware("log.activity:Delete business plan");
//         Route::get('search', 'BusinessPlan\BusinessPlanController@searchForm')->name('LAKA business plan.Search business plan')->middleware("log.activity:Search business plan");
//     });

//     // user management route
//     Route::group(['prefix' => 'user-management'], function () {
//         Route::get('/', 'User\UserController@index')->name('LMT user manage.LMT user index')->middleware("log.activity:LMT user index");
//         Route::get('list', 'User\UserController@list')->name('LMT user manage.LMT user list')->middleware("log.activity:LMT user list");
//         Route::get('detail/{id}', 'User\UserController@detail')->name('LMT user manage.LMT user info (detail)')->middleware("log.activity:LMT user info (detail)");
//         Route::get('update/{id}', 'User\UserController@updateForm')->name('LMT user manage.Update')->middleware("log.activity:Update LMT user");
//         Route::post('update/{id}', 'User\UserController@update')->name('LMT user manage.Update')->middleware("log.activity:Update LMT user");
//         Route::get('update-password/{id}', 'User\UserController@updatePasswordForm')->name('LMT user manage.Update Password')->middleware("log.activity:Update Password LMT user");
//         Route::post('update-password', 'User\UserController@updatePassword')->name('LMT user manage.Update Password')->middleware("log.activity:Update Password LMT user");
//         Route::get('new', 'User\UserController@newForm')->name('LMT user manage.Add LMT user')->middleware("log.activity:Add LMT user");
//         Route::post('new', 'User\UserController@register')->name('LMT user manage.Add LMT user')->middleware("log.activity:Add LMT user");
//         Route::get('delete/{id}', 'User\UserController@delete')->name('LMT user manage.LMT user delete')->middleware("log.activity:Delete LMT user");
//         Route::get('search', 'User\UserController@searchForm')->name('LMT user manage.Search LMT user')->middleware("log.activity:Search LMT user");
//         Route::get('ssh', 'User\UserController@ssh')->name('LMT user manage.SSH')->middleware("log.activity:LMT user manage.SSH");
//     });

//     // role management route
//     Route::group(['prefix' => 'role'], function () {
//         Route::get('/', 'Role\RoleController@index')->name('LMT role manage.Role index')->middleware("log.activity:Role index");
//         Route::get('list', 'Role\RoleController@list')->name('LMT role manage.Role list')->middleware("log.activity:Role list");
//         Route::get('detail/{id}', 'Role\RoleController@detail')->name('LMT role manage.Detail')->middleware("log.activity:Role detail");
//         Route::get('update/{id}', 'Role\RoleController@updateForm')->name('LMT role manage.Update')->middleware("log.activity:Update Role");
//         Route::post('update/{id}', 'Role\RoleController@update')->name('LMT role manage.Update')->middleware("log.activity:Update Role");
//         Route::get('new', 'Role\RoleController@newForm')->name('LMT role manage.Add role')->middleware("log.activity:Add Role");
//         Route::post('new', 'Role\RoleController@register')->name('LMT role manage.Add role')->middleware("log.activity:Add Role");
//         Route::get('delete/{id}', 'Role\RoleController@delete')->name('LMT role manage.Role delete')->middleware("log.activity:Delete Role");
//         Route::get('ajax-check-is-used-role/{id}', 'Role\RoleController@ajaxCheckIsUsedRole')->name('LMT role manage.Ajax check is used role')->middleware("log.activity:Ajax check is used role");
//         Route::get('search', 'Role\RoleController@searchForm')->name('LMT role manage.Search role')->middleware("log.activity:Search Role");
//         Route::get('set-permission/{id}',
//             'RoleHasFeatureApi\RoleHasFeatureApiController@setPermissionForm')->name('LMT role manage.Role setting')->middleware("log.activity:Setting Role");
//         Route::post('set-permission/{id}',
//             'RoleHasFeatureApi\RoleHasFeatureApiController@setPermission')->name('LMT role manage.Role setting')->middleware("log.activity:Setting Role");

//     });

//     // version route
//     Route::group(['prefix' => 'deploy'], function () {
//         Route::get('/development', 'Deploy\DeployController@index')->name('Version Deploy.Deploy index.Development')->middleware("log.activity:Version Deploy");
//         Route::get('/staging', 'Deploy\DeployController@index')->name('Version Deploy.Deploy index.Staging')->middleware("log.activity:Version Deploy");
//         Route::get('/production', 'Deploy\DeployController@index')->name('Version Deploy.Deploy index.Production')->middleware("log.activity:Version Deploy");

//         // Route log-release
//         Route::group(['prefix' => 'log-release'], function () {
//             Route::get('/', [App\Http\Controllers\LogRelease\LogReleaseController::class, 'getLogReleaseList'])->name('Version Deploy.Deploy index.Show Log Release');
//             Route::get('search-log',[App\Http\Controllers\LogRelease\LogReleaseController::class,'searchLogRelease'])->name('Version Deploy.Deploy index.Search LogRelease');
//             Route::get('/{user_id}', [App\Http\Controllers\LogRelease\LogReleaseController::class, 'getLogReleaseByUserId'])->name('Version Deploy.Deploy index.Show Log Release By User Id');
//         });
//     });

//     Route::middleware(['log.activity:Version Deploy', 'log.release'])->group(function () {
//         Route::post('deploy', 'Deploy\DeployController@doDeploy')->name('Version Deploy.Deploy doDeploy');
//     });


// //    Route::post('deploy', 'Deploy\DeployController@doDeploy')->name('Version Deploy.Deploy doDeploy')->middleware("log.activity:Version Deploy");

//     // approval api token route
//     Route::group(['prefix' => 'approval-api-token'], function () {
//         Route::get('/', 'ApprovalApiToken\ApprovalApiTokenController@index')->name('LAKA user manage.LAKA User index');
//         Route::get('approval-token/{id}',
//             'ApprovalApiToken\ApprovalApiTokenController@approvalToken')->name('LAKA user manage.Approve access token');
//         Route::get('stop-token/{id}',
//             'ApprovalApiToken\ApprovalApiTokenController@stopToken')->name('LAKA user manage.Pending access token');
//         Route::get('reopen-token/{id}',
//             'ApprovalApiToken\ApprovalApiTokenController@reopenToken')->name('LAKA user manage.ReOpen access Token');
//         Route::get('delete-token/{id}',
//             'ApprovalApiToken\ApprovalApiTokenController@deleteToken')->name('LAKA user manage.Delete access Token');
//     });

//     // user management for app chat route
//     Route::group(['prefix' => 'user-management-for-app-chat'], function () {
//         Route::get('/', 'ApprovalApiToken\ApprovalApiTokenController@index')->name('LAKA user manage.LAKA User index')->middleware("log.activity:LAKA User index");
//         Route::get('list', 'ApprovalApiToken\ApprovalApiTokenController@list')->name('LAKA user manage.LAKA User list')->middleware("log.activity:LAKA User list");
//         Route::get('detail/{id}', 'UserManagementForAppChat\UserManagementForAppChatController@detailForm')->name('LAKA user manage.Detail')->middleware("log.activity:LAKA User detail");
//         Route::get('new', 'UserManagementForAppChat\UserManagementForAppChatController@newForm')->name('LAKA user manage.Create LAKA user')->middleware("log.activity:Create LAKA user");
//         Route::post('new', 'UserManagementForAppChat\UserManagementForAppChatController@register')->name('LAKA user manage.Create LAKA user')->middleware("log.activity:Create LAKA user");
//         Route::get('delete/{id}', 'UserManagementForAppChat\UserManagementForAppChatController@delete')->name('LAKA user manage.Delete LAKA user')->middleware("log.activity:Delete LAKA user");
//         Route::get('search', 'UserManagementForAppChat\UserManagementForAppChatController@searchForm')->name('LAKA user manage.Search LAKA user')->middleware("log.activity:Search LAKA user");
//         Route::get('list-user-for-control', 'ApprovalApiToken\ApprovalApiTokenController@listForControl')->name('LAKA user manage.LAKA User list for control')->middleware("log.activity:LAKA User list for control");
//         Route::get('disable-user/{id}', 'ApprovalApiToken\ApprovalApiTokenController@disableUser')->name('LAKA user manage.LAKA disable user')->middleware("log.activity:LAKA disable user");
//         Route::get('add-contact', 'ApprovalApiToken\ApprovalApiTokenController@addContactList')->name('LAKA user manage.LAKA User add company')->middleware("log.activity:LAKA User add company");
//         Route::post('add-contact/update/reset-pass', 'ApprovalApiToken\ApprovalApiTokenController@resetPassword')->name('LAKA user manage.LAKA User reset password')->middleware("log.activity:LAKA User reset password");
//         Route::get('add-contact/update/{id}', 'ApprovalApiToken\ApprovalApiTokenController@addContactUpdatePage')->name('LAKA user manage.LAKA User add company update')->middleware("log.activity:LAKA User add company update");
//         Route::post('add-contact/update/{id}', 'ApprovalApiToken\ApprovalApiTokenController@addContactsAndRoomsByCompany')->name('LAKA user manage.LAKA User add company update')->middleware("log.activity:LAKA User add company update");

//     });

//     Route::group(['prefix' => 'log'], function () {
//         Route::get("/", "LogActivity\LogActivityController@getAll")->name("LAKA Log User Activities By Items Per Page");
//         Route::get("/{id}", "LogActivity\LogActivityController@getLogActivityByUserId")->name("Log Activity By User Id");
//     });

});
