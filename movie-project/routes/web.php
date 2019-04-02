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


    Route::group(['prefix' => 'type'], function () {
        Route::get('list','Admin\TypeController@GetListType')->name('admin_typet_list');
        Route::get('create','Admin\TypeController@GetNewType')->name('admin_type_create');
        Route::post('create','Admin\TypeController@PostNewType')->name('admin_type_store');
        Route::get('edit/{id}','Admin\TypeController@GetEditType')->name('admin_type_edit');
        Route::post('edit/{id}','Admin\TypeController@PostEditType')->name('admin_type_update');
        Route::get('delete/{id}','Admin\TypeController@DeleteType')->name('admin_type_delete');
    });
    
    Route::group(['prefix' => 'contact'], function () {
        Route::get('list','Admin\ContactController@GetListContact')->name('admin_contact_list');
        Route::get('show/{id}','Admin\ContactController@GetShowContact')->name('admin_contact_show');
        Route::get('delete/{id}','Admin\ContactController@DeleteContact')->name('admin_contact_delete');
    });


    Route::group(['prefix'=>'country'],function(){
        Route::get('/list','Admin\CountryController@index')->name('admin_country_list');

        Route::get('/create','Admin\CountryController@create')->name('admin_country_create');
        Route::post('/store','Admin\CountryController@store')->name('admin_country_store');

        Route::get('/edit/{id}','Admin\CountryController@edit')->name('admin_country_edit');
        Route::post('/update/{id}','Admin\CountryController@update')->name('admin_country_update');

        Route::post('/delete/{id}','Admin\CountryController@destroy')->name('admin_country_delete');
    });

    Route::group(['prefix'=>'publisher'],function(){
        Route::get('/list','Admin\PublisherController@index')->name('admin_publisher_list');

        Route::get('/create','Admin\PublisherController@create')->name('admin_publisher_create');
        Route::post('/store','Admin\PublisherController@store')->name('admin_publisher_store');

        Route::get('/edit/{id}','Admin\PublisherController@edit')->name('admin_publisher_edit');
        Route::post('/update/{id}','Admin\PublisherController@update')->name('admin_publisher_update');

        Route::post('/delete/{id}','Admin\PublisherController@destroy')->name('admin_publisher_delete');
    });

});
