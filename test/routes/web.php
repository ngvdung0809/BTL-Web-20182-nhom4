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

Route::get('/test', function () {
    return view('layouts.test');
});

Route::get('/test1', function () {
    return view('layouts.test1');
});

Route::get('/test2', function () {
    return view('layouts.test2');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
