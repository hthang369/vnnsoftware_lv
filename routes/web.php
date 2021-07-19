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
    Route::get('confirm-dialog/{id}', 'Commons\CommonController@confirmDialog')->name('common.confirm');
    // version route
    Route::get('version', 'Versions\VersionController@index')->name('version.index');//->middleware("log.activity:Version index");
    // company route
    Route::resource('company', 'Companys\CompanyController');
    // business plan
    Route::resource('bussiness-plan', 'BusinessPlans\BusinessPlanController');
    // role management
    Route::resource('role', 'Roles\RoleController')->names('role-management');
    Route::get('role/set-permission/{id}', 'RoleHasPermissions\RoleHasPermissionController@showByRole')->name('permission-role.show');
    Route::post('role/set-permission/{id}', 'RoleHasPermissions\RoleHasPermissionController@update')->name('permission-role.update');

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
