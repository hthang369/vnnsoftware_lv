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

Route::group(['middleware' => 'auth:web', 'prefix' => 'admin'], function() {
    Route::get('/', 'AdminController@index')->name('admin.view');

    Route::resource('posts', 'PostsController');
    Route::resource('pages', 'PagesController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('menus', 'CategoriesController');

    Route::resource('slides', 'SlidesController', ['except' => ['update']]);
    Route::post('slides/{slides}', 'SlidesController@update')->name('slides.update');

    Route::resource('advertises', 'AdvertisesController', ['except' => ['update']]);
    Route::post('advertises/{advertise}', 'AdvertisesController@update')->name('advertises.update');

    Route::resource('roles', 'RolesController')->names('role');

    Route::resource('permission-role', 'PermissionRoleController')->names('role_has_permissions');

    Route::resource('users', 'CategoriesController');
});

