<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Type;
use Illuminate\Support\Facades\View;

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
        $types = Type::all();
        $countries = Country::all();
        return view('home.layout', ['types'=>$types, 'countries'=>$countries]);
    }
}
