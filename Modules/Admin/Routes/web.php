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

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index');

    Route::resource('posts', 'PostsController');
    Route::resource('pages', 'PagesController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('menus', 'CategoriesController');
    Route::resource('configs', 'CategoriesController');
    Route::resource('slides', 'CategoriesController');
    Route::resource('advertises', 'AdvertisesController');
    Route::resource('group_users', 'CategoriesController');
    Route::resource('users', 'CategoriesController');
});

