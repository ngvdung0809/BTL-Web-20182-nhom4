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

    Route::group(['prefix'=>'user'],function(){
        Route::get('/list','Admin\UserController@index')->name('admin_user_list');
        Route::get('/view/{id}','Admin\UserController@show')->name('admin_user_view');
        Route::get('/create','Admin\UserController@create')->name('admin_user_create');
        Route::post('/store','Admin\UserController@store')->name('admin_user_store');
        Route::get('/edit/{id}','Admin\UserController@edit')->name('admin_user_edit');
        Route::post('/update/{id}','Admin\UserController@update')->name('admin_user_update');
        Route::post('/delete/{id}','Admin\UserController@destroy')->name('admin_user_delete');
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

    Route::group(['prefix'=>'adventisment'],function(){
        Route::get('/list','Admin\AdventismentController@index')->name('admin_adventisment_list');
        Route::get('/create','Admin\AdventismentController@create')->name('admin_adventisment_create');
        Route::post('/store','Admin\AdventismentController@store')->name('admin_adventisment_store');
        Route::get('/edit/{id}','Admin\AdventismentController@edit')->name('admin_adventisment_edit');
        Route::post('/update/{id}','Admin\AdventismentController@update')->name('admin_adventisment_update');
        Route::post('/delete/{id}','Admin\AdventismentController@destroy')->name('admin_adventisment_delete');
    });

    Route::group(['prefix'=>'director'],function(){
            Route::get('/list','Admin\DirectorController@index')->name('admin_director_list');

            Route::get('/create','Admin\DirectorController@create')->name('admin_director_create');
            Route::post('/store','Admin\DirectorController@store')->name('admin_director_store');

            Route::get('/edit/{id}','Admin\DirectorController@edit')->name('admin_director_edit');
            Route::post('/update/{id}','Admin\DirectorController@update')->name('admin_director_update');

            Route::post('/delete/{id}','Admin\DirectorController@destroy')->name('admin_director_delete');
        });
     
     Route::group(['prefix'=>'actor'],function(){
            Route::get('/list','Admin\ActorController@index')->name('admin_actor_list');

            Route::get('/create','Admin\ActorController@create')->name('admin_actor_create');
            Route::post('/store','Admin\ActorController@store')->name('admin_actor_store');

            Route::get('/edit/{id}','Admin\ActorController@edit')->name('admin_actor_edit');
            Route::post('/update/{id}','Admin\ActorController@update')->name('admin_actor_update');

            Route::post('/delete/{id}','Admin\ActorController@destroy')->name('admin_actor_delete');
    });
});
