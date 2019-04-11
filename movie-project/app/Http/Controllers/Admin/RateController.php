<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Film;

class RateController extends Controller
{
    public function index()
    {
        $films = Film::all();
        return view('admin.rate.list', ['films'=>$films]);
    }
}
