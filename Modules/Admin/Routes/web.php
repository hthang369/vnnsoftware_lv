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
    Route::resource('configs', 'ConfigsController');
    Route::resource('slides', 'CategoriesController', ['except' => ['update']]);
    Route::post('slides/{slides}', 'AdvertisesController@update')->name('slides.update');

    Route::resource('advertises', 'AdvertisesController', ['except' => ['update']]);
    Route::post('advertises/{advertise}', 'AdvertisesController@update')->name('advertises.update');

    Route::resource('group_users', 'CategoriesController');
    Route::resource('users', 'CategoriesController');
});

