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
    })->name('admin_index');

    Route::group(['prefix'=>'user'],function(){
        Route::get('/list','Admin\UserController@index')->name('admin_user_list');
        Route::get('/view/{id}','Admin\UserController@show')->name('admin_user_view');
        Route::get('/create','Admin\UserController@create')->name('admin_user_create');
        Route::post('/store','Admin\UserController@store')->name('admin_user_store');
        Route::get('/edit/{id}','Admin\UserController@edit')->name('admin_user_edit');
        Route::post('/update/{id}','Admin\UserController@update')->name('admin_user_update');
        Route::post('/delete/{id}','Admin\UserController@destroy')->name('admin_user_delete');
    });

    Route::group(['prefix'=>'film'],function(){
        Route::get('/list','Admin\FilmController@index')->name('admin_film_list');
        Route::get('/view/{id}','Admin\FilmController@show')->name('admin_film_view');
        Route::get('/create','Admin\FilmController@create')->name('admin_film_create');
        Route::post('/store','Admin\FilmController@store')->name('admin_film_store');
        Route::get('/edit/{id}','Admin\FilmController@edit')->name('admin_film_edit');
        Route::post('/update/{id}','Admin\FilmController@update')->name('admin_film_update');
        Route::post('/delete/{id}','Admin\FilmController@destroy')->name('admin_film_delete');
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

    Route::group(['prefix'=>'rate'],function(){
        Route::get('/list','Admin\UserFilmController@index')->name('admin_user_film_list');
    });

    Route::group(['prefix'=>'episode'],function(){
        // Route::get('/{id}/list','Admin\FilmEpisodeController@index')->name('admin_film_episode_list');
        Route::get('/{id}/create','Admin\FilmEpisodeController@create')->name('admin_film_episode_create');
        Route::post('/{id}/store','Admin\FilmEpisodeController@store')->name('admin_film_episode_store');
        Route::get('/edit/{id}','Admin\FilmEpisodeController@edit')->name('admin_film_episode_edit');
        Route::post('/update/{id}','Admin\FilmEpisodeController@update')->name('admin_film_episode_update');
        Route::get('/delete/{id}','Admin\FilmEpisodeController@destroy')->name('admin_film_episode_delete');
    });


    Route::group(['prefix'=>'comment'],function(){
        Route::get('/list','Admin\CommentController@index')->name('admin_comment_list');
        Route::post('/delete/{id}','Admin\CommentController@destroy')->name('admin_comment_delete');
        Route::get('/search', 'Admin\CommentController@search')->name('admin_comment_search');
    });


     Route::group(['prefix'=>'server'],function(){
            Route::get('/list','Admin\ServerController@index')->name('admin_server_list');
            Route::get('/create','Admin\ServerController@create')->name('admin_server_create');
            Route::post('/store','Admin\ServerController@store')->name('admin_server_store');
            Route::get('/edit/{id}','Admin\ServerController@edit')->name('admin_server_edit');
            Route::post('/update/{id}','Admin\ServerController@update')->name('admin_server_update');
            Route::post('/delete/{id}','Admin\ServerController@destroy')->name('admin_server_delete');
    });

});

Route::group(['prefix'=>'home'],function(){
    Route::get('/index',function () {
        return view('home.layout');
    })->name('home_index');


    Route::group(['prefix'=>'actor'],function(){
       Route::get('/list', 'Home\ActorController@index')->name('home_actor_list');
       Route::get('/search', 'Home\ActorController@search')->name('home_actor_search');
       Route::get('/view/{id}','Home\ActorController@view')->name('home_actor_view');

    });

     Route::group(['prefix'=>'director'],function(){
       Route::get('/list', 'Home\DirectorController@index')->name('home_director_list');
       Route::get('/search', 'Home\DirectorController@search')->name('home_director_search');
       Route::get('/view/{id}','Home\DirectorController@view')->name('home_director_view');

    });
    
    Route::get('/about', 'Home\FooterController@about')->name('home_about');
    Route::get('/faq', 'Home\FooterController@faq')->name('home_faq');
    Route::get('/dieukhoan', 'Home\FooterController@dieukhoan')->name('home_dieukhoan');
    Route::get('/privacy', 'Home\FooterController@privacy')->name('home_privacy');


    Route::get('/watch/film/{id}','Home\WatchFilmController@watch')->name('watch_film');
    Route::post('/comment','Home\WatchFilmController@PostComment');

    Route::get('/publisher/{id}', 'Home\PublisherController@view')->name('home_publisher_view');
    Route::get('/publisher_search', 'Home\PublisherController@search')->name('home_publisher_search');

    Route::group(['prefix'=>'/user/{user_id}'],function(){
        Route::group(['prefix'=>'/profile'],function(){
            Route::get('/view', 'Home\UserProfileController@showProfile')->name('home_user_profile_view_profile');
            Route::post('/update', 'Home\UserProfileController@updateProfile')->name('home_user_profile_update_profile');
        });

        Route::group(['prefix'=>'/change_password'],function(){
            Route::get('/view', 'Home\UserProfileController@showChangePassword')->name('home_user_profile_view_change_password');
            Route::post('/update', 'Home\UserProfileController@updateChangePassword')->name('home_user_profile_update_change_password');
        });

        Route::post('/change_avatar', 'Home\UserProfileController@changeAvatar')->name('home_user_profile_change_avatar');

        Route::group(['prefix'=>'/film'],function(){
            Route::get('/watch_later', 'Home\UserProfileController@showFilmWatchLater')->name('home_user_profile_view_film_watch_later');
            Route::get('/favorist', 'Home\UserProfileController@showFavoristFilm')->name('home_user_profile_view_favorist_film');
            Route::get('/rate', 'Home\UserProfileController@showRateFilm')->name('home_user_profile_view_film_review');
            Route::get('watch_history', 'Home\UserProfileController@showFilmWatchHistory')->name('home_user_profile_view_film_watch_history');
        });
    });


});


