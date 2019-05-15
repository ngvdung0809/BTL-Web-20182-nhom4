<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\Type;
use App\Models\Person;
use App\Models\Adventisment;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;

class FilmController extends HomeController
{
    public function index()
    {
        //film
        $films = Film::all();

        $typePage = '';
        //return
        return view('home.film.list', ['films'=>$films, 'typePage'=>$typePage]);
    }

    public function view($id)
    {
        //film
        $film = Film::find($id);

        //film ralated
        $filmRalated = [];
        array_push($filmRalated, $film);
        $filmCache = Film::where('tag', 'like', '%' . $film->tag . '%')->get();
        foreach ($filmCache as $key => $value) {
            if(!in_array($value->id, array_pluck($filmRalated, 'id'))){
                array_push($filmRalated, $value);
            }
        }
        foreach ($film->type as $type) {
            foreach ($type->film as $key => $value) {
                if(!in_array($value->id, array_pluck($filmRalated, 'id'))){
                    array_push($filmRalated, $value);
                }
            }
        }
        array_shift($filmRalated);
        //return
        return view('home.film.view', ['film'=>$film, 'filmRalated'=>$filmRalated]);
    }

    public function searchFilm($name, $nameId)
    {
        $films = [];
        $typePage = '';
        //search film
        if($name == 'type'){
            $types = Type::where('id', $nameId)->get();
            foreach ($types as $type) {
                foreach ($type->film as $key => $value) {
                    if(!in_array($value->id, array_pluck($films, 'id'))){
                        array_push($films, $value);
                    }
                }
            }
        }elseif ($name == 'actor'){
            $actors = Person::where('id', $nameId)->get();
            foreach ($actors as $actor) {
                foreach ($actor->filmact as $key => $value) {
                    if(!in_array($value->id, array_pluck($films, 'id'))){
                        array_push($films, $value);
                    }
                }
            }
        }else{
            $films = Film::where($name, $nameId)->get();
        }
        //type page
        if($name == 'type'){
            $typePage = ' phim theo Thể loại';
        }elseif ($name == 'actor') {
            $typePage = ' phim theo Diễn viên';
        }elseif ($name == 'name') {
            $typePage = ' phim theo Tên phim';
        }elseif ($name == 'publisher_id') {
            $typePage = ' phim theo Nhà sản xuất';
        }elseif ($name == 'director_id') {
            $typePage = ' phim theo Đạo diễn';
        }elseif ($name == 'country_id') {
            $typePage = ' phim theo Quốc gia';
        }elseif ($name == 'released') {
            $typePage = ' phim theo Năm sản xuất';
        }elseif ($name == 'tag') {
            $typePage = ' phim theo Thẻ tag';
        }elseif ($name == 'series_film') {
            $typePage = ' Phim bộ';
        }elseif ($name == ' retail_film') {
            $typePage = ' Phim lẻ';
        }elseif ($name == 'demo_film') {
            $typePage = ' Phim thuyết minh';
        }elseif ($name == 'theaters_film') {
            $typePage = ' Phim chiếu rạp';
        }elseif ($name == 'status') {
            $typePage = ' Phim sắp chiếu';
        }

        //return
        return view('home.film.list', ['films'=>$films, 'typePage'=>$typePage]);
    }

    public function searchFilmLike(Request $request)
    {
        $property = $request->property;
        $keyword = $request->keyword;
        $films = Film::where($property, 'like', '%' . $keyword . '%')->get();
        $typePage = '';
        //type page
        if($property == 'type'){
            $typePage = ' phim theo Thể loại';
        }elseif ($property == 'actor') {
            $typePage = ' phim theo Diễn viên';
        }elseif ($property == 'name') {
            $typePage = ' phim theo Tên phim';
        }elseif ($property == 'publisher_id') {
            $typePage = ' phim theo Nhà sản xuất';
        }elseif ($property == 'director_id') {
            $typePage = ' phim theo Đạo diễn';
        }elseif ($property == 'country_id') {
            $typePage = ' phim theo Quốc gia';
        }elseif ($property == 'released') {
            $typePage = ' phim theo Năm sản xuất';
        }elseif ($property == 'tag') {
            $typePage = ' phim theo Thẻ tag';
        }elseif ($property == 'series_film') {
            $typePage = ' Phim bộ';
        }elseif ($property == ' retail_film') {
            $typePage = ' Phim lẻ';
        }elseif ($property == 'demo_film') {
            $typePage = ' Phim thuyết minh';
        }elseif ($property == 'theaters_film') {
            $typePage = ' Phim chiếu rạp';
        }elseif ($property == 'status') {
            $typePage = ' Phim sắp chiếu';
        }

        //return
        return view('home.film.list', ['films'=>$films, 'typePage'=>$typePage]);
    }
}
