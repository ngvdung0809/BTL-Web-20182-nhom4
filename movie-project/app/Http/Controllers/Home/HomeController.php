<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\Country;
use App\Models\Type;
use App\Models\Adventisment;
use App\Models\Person;
use App\Models\UserFilm;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function __construct()
    {
        $typeHome = Type::all();
        $countryHome = Country::all();
        View::share(['typeHome'=>$typeHome, 'countryHome'=>$countryHome]);
    }

    public function showHome()
    {
        //film slide
        $filmSlide = Film::where('slide', Config::get('constants.FILM.SLIDE'))->get();

        //series film
        $seriesFilmNew = Film::where('series_film', Config::get('constants.FILM.SERIES_FILM'))->where('status', Config::get('constants.FILM_STATUS.COMPLETED'))->orderBy('updated_at', 'DESC')->take(12)->get();
        $seriesFilmComingSoon = Film::where('series_film', Config::get('constants.FILM.SERIES_FILM'))->where('status', Config::get('constants.FILM_STATUS.TRAILER'))->take(12)->get();
        $seriesFilmRate = Film::where('series_film', Config::get('constants.FILM.SERIES_FILM'))->orderBy('rate', 'DESC')->take(12)->get();
        $seriesFilmView = Film::where('series_film', Config::get('constants.FILM.SERIES_FILM'))->orderBy('view', 'DESC')->take(12)->get();

        //retail film
        $retailFilmNew = Film::where('retail_film', Config::get('constants.FILM.RETAIL_FILM'))->where('status', Config::get('constants.FILM_STATUS.COMPLETED'))->orderBy('updated_at', 'DESC')->take(12)->get();
        $retailFilmComingSoon = Film::where('retail_film', Config::get('constants.FILM.RETAIL_FILM'))->where('status', Config::get('constants.FILM_STATUS.TRAILER'))->take(12)->get();
        $retailFilmRate = Film::where('retail_film', Config::get('constants.FILM.RETAIL_FILM'))->orderBy('rate', 'DESC')->take(12)->get();
        $retailFilmView = Film::where('retail_film', Config::get('constants.FILM.RETAIL_FILM'))->orderBy('view', 'DESC')->take(12)->get();

        //demo film
        $demoFilmNew = Film::where('demo_film', Config::get('constants.FILM.DEMO_FILM'))->where('status', Config::get('constants.FILM_STATUS.COMPLETED'))->orderBy('updated_at', 'DESC')->take(12)->get();
        $demoFilmComingSoon = Film::where('demo_film', Config::get('constants.FILM.DEMO_FILM'))->where('status', Config::get('constants.FILM_STATUS.TRAILER'))->take(12)->get();
        $demoFilmRate = Film::where('demo_film', Config::get('constants.FILM.DEMO_FILM'))->orderBy('rate', 'DESC')->take(12)->get();
        $demoFilmView = Film::where('demo_film', Config::get('constants.FILM.DEMO_FILM'))->orderBy('view', 'DESC')->take(12)->get();

        //theaters film
        $theatersFilmNew = Film::where('theaters_film', Config::get('constants.FILM.THEATERS_FILM'))->where('status', Config::get('constants.FILM_STATUS.COMPLETED'))->orderBy('updated_at', 'DESC')->take(12)->get();
        $theatersFilmComingSoon = Film::where('theaters_film', Config::get('constants.FILM.THEATERS_FILM'))->where('status', Config::get('constants.FILM_STATUS.TRAILER'))->take(12)->get();
        $theatersFilmRate = Film::where('theaters_film', Config::get('constants.FILM.THEATERS_FILM'))->orderBy('rate', 'DESC')->take(12)->get();
        $theatersFilmView = Film::where('theaters_film', Config::get('constants.FILM.THEATERS_FILM'))->orderBy('view', 'DESC')->take(12)->get();

        //adventisment
        $adventisment = Adventisment::where('active', Config::get('constants.ADVENTISMENT.ACTIVE'))->first();

        //Person
        $person = Person::orderBy('view', 'DESC')->take(7)->get();

        //Film tag
        $tagFilm = Film::orderBy('view', 'DESC')->take(15)->get();

        //film comming soon
        $filmCommingSoon = Film::where('status', Config::get('constants.FILM_STATUS.TRAILER'))->orderBy('created_at', 'DESC')->take(4)->get();

        //Film hot
        $filmHotDay = UserFilm::where('updated_at', 'like', Carbon::now()->format('Y-m-d') . '%')->orderBy('view', 'DESC')->take(15)->get();
        $filmHotWeek = UserFilm::where('updated_at', '>', Carbon::now()->subDays(7)->format('Y-m-d') . ' 00:00:00')->where('updated_at', '<', Carbon::now()->format('Y-m-d') . ' 23:59:59')->orderBy('view', 'DESC')->take(15)->get();
        $filmHotMonth = UserFilm::where('updated_at', 'like', Carbon::now()->format('Y-m') . '%')->orderBy('view', 'DESC')->take(15)->get();

        //return
        return view('home.home', [
            //slide
            'filmSlide'=>$filmSlide,
            //series fim
            'seriesFilmNew'=>$seriesFilmNew,
            'seriesFilmComingSoon'=>$seriesFilmComingSoon,
            'seriesFilmRate'=>$seriesFilmRate,
            'seriesFilmView'=>$seriesFilmView,
            //retail film
            'retailFilmNew'=>$retailFilmNew,
            'retailFilmComingSoon'=>$retailFilmComingSoon,
            'retailFilmRate'=>$retailFilmRate,
            'retailFilmView'=>$retailFilmView,
            //demo film
            'demoFilmNew'=>$demoFilmNew,
            'demoFilmComingSoon'=>$demoFilmComingSoon,
            'demoFilmRate'=>$demoFilmRate,
            'demoFilmView'=>$demoFilmView,
            //theater film
            'theatersFilmNew'=>$theatersFilmNew,
            'theatersFilmComingSoon'=>$theatersFilmComingSoon,
            'theatersFilmRate'=>$theatersFilmRate,
            'theatersFilmView'=>$theatersFilmView,
            //adventisment
            'adventisment'=>$adventisment,
            //person
            'person'=>$person,
            //tag film
            'tagFilm'=>$tagFilm,
            //film comming soon
            'filmCommingSoon'=>$filmCommingSoon,
            //film hot
            'filmHotDay'=>$filmHotDay,
            'filmHotWeek'=>$filmHotWeek,
            'filmHotMonth'=>$filmHotMonth,
        ]);
    }
}
