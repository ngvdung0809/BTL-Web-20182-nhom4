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
}
