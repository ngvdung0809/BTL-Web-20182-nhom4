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
        Route::get('list','Admin\TypeController@GetListType');
        Route::get('create','Admin\TypeController@GetNewType');
        Route::post('create','Admin\TypeController@PostNewType');
        Route::get('edit/{id}','Admin\TypeController@GetEditType');
        Route::post('edit/{id}','Admin\TypeController@PostEditType');
        Route::get('delete/{id}','Admin\TypeController@DeleteType');
    });


});
