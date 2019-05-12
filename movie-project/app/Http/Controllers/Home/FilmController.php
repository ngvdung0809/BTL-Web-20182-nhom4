<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\Adventisment;
use Illuminate\Support\Facades\Config;

class FilmController extends HomeController
{
    public function index()
    {
        //film
        $films = Film::all();
        //adventisment
        $adventisment = Adventisment::where('active', Config::get('constants.ADVENTISMENT.ACTIVE'))->first();
        //return
        return view('home.film.list', ['films'=>$films, 'adventisment'=>$adventisment]);
    }

    public function view($id)
    {
        //film
        $film = Film::find($id);
        //adventisment
        $adventisment = Adventisment::where('active', Config::get('constants.ADVENTISMENT.ACTIVE'))->first();
        //film ralated
        $filmRalated = [];
        $filmCache = Film::where('tag', 'like', '%' . $film->tag . '%')->get();
        foreach ($filmCache as $key => $value) {
            array_push($filmRalated, $value);
        }
        foreach ($film->type as $type) {
            foreach ($type->film as $key => $value) {
                array_push($filmRalated, $value);
            }
        }
        //return
        return view('home.film.view', ['film'=>$film, 'adventisment'=>$adventisment, 'filmRalated'=>$filmRalated]);
    }
}
