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

Route::group(['prefix' => ''], function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/post/{title}', 'HomeController@showPost')->name('page.show-post');
    Route::get('/detail/{title}', 'HomeController@showPostDetail')->name('page.show-detail');
    Route::get('/{title}', 'HomeController@show')->name('page.show');
});
