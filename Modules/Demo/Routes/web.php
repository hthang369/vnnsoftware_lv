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

Route::prefix('demo')->group(function() {
    Route::get('/', 'DemoController@index');

    Route::get('detail/{detail}', function () {
        return view('detail');
    })->name('detail.show');

    Route::get('product/{detail}', function () {
        return view('detail_product');
    })->name('product.show');
});
