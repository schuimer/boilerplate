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

Route::prefix('website')->group(function() {
    Route::get('/', 'WebsiteController@index')->name('Website');
    Route::get('create','WebsiteController@create')->name('Website.create');
    Route::post('store','WebsiteController@store')->name('Website.store');
    Route::get('show/{id}','WebsiteController@show')->name('Website.show');
    Route::get('edit/{id}','WebsiteController@edit')->name('Website.edit');
    Route::match(['put', 'patch'],'update/{id}','WebsiteController@update')->name('Website.update');
    Route::delete('destroy/{id}','WebsiteController@destroy')->name('Website.destroy');
});
