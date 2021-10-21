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
    Route::get('/', 'AdminController@index')->name('admin.index');

    Route::resource('posts', 'PostsController');
    Route::resource('news', 'NewsController');
    Route::resource('pages', 'PagesController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('menus', 'MenusController', ['except' => ['index', 'create', 'edit']]);
    Route::get('view-menus/{menu?}', 'MenusController@view')->name('menus.index');
    Route::get('menus/create/{menu?}', 'MenusController@create')->name('menus.create');
    Route::get('menus/{id}/edit/{menu?}', 'MenusController@edit')->name('menus.edit');
    Route::get('menus/sort-order/{menu?}', 'MenusController@sort')->name('menus.sort');

    Route::resource('slides', 'SlidesController', ['except' => ['update']]);
    Route::post('slides/{slides}', 'SlidesController@update')->name('slides.update');

    Route::resource('advertises', 'AdvertisesController', ['except' => ['update']]);
    Route::post('advertises/{advertise}', 'AdvertisesController@update')->name('advertises.update');

    Route::resource('roles', 'RolesController')->names('role');

    Route::resource('permission-role', 'PermissionRoleController')->names('role_has_permissions');

    Route::resource('users', 'UsersController');

    Route::resource('media', 'MediaController');
});
