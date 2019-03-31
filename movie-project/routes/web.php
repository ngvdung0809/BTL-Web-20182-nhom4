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

Route::group(['prefix'=>'admin'],function(){
    Route::get('/index',function () {
        return view('admin.layout');
    });

    Route::group(['prefix'=>'country'],function(){
        Route::get('/list','Admin\CountryController@index')->name('admin_country_list');

        Route::get('/create','Admin\CountryController@create')->name('admin_country_create');
        Route::post('/store','Admin\CountryController@store')->name('admin_country_store');

        Route::get('/edit/{id}','Admin\CountryController@edit')->name('admin_country_edit');
        Route::post('/update/{id}','Admin\CountryController@update')->name('admin_country_update');

        Route::post('/delete/{id}','Admin\CountryController@destroy')->name('admin_country_delete');
    });
});
