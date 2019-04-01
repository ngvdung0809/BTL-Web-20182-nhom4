<?php
use Illuminate\Support\Facades\Route;
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
<<<<<<< HEAD
    
    Route::group(['prefix' => 'type'], function () {
        Route::get('list','Admin\TypeController@GetListType');
        Route::get('create','Admin\TypeController@GetNewType');
        Route::post('create','Admin\TypeController@PostNewType');
        Route::get('edit/{id}','Admin\TypeController@GetEditType');
        Route::post('edit/{id}','Admin\TypeController@PostEditType');
        Route::get('delete/{id}','Admin\TypeController@DeleteType');
    });


=======

    Route::group(['prefix'=>'country'],function(){
        Route::get('/list','Admin\CountryController@index')->name('admin_country_list');

        Route::get('/create','Admin\CountryController@create')->name('admin_country_create');
        Route::post('/store','Admin\CountryController@store')->name('admin_country_store');

        Route::get('/edit/{id}','Admin\CountryController@edit')->name('admin_country_edit');
        Route::post('/update/{id}','Admin\CountryController@update')->name('admin_country_update');

        Route::post('/delete/{id}','Admin\CountryController@destroy')->name('admin_country_delete');
    });
>>>>>>> 6fca92fb10e6e77d5840f538c9edca846e4aa408
});
