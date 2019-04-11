<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Film;

class UserFilmController extends Controller
{
    public function index()
    {
        $films = Film::all();
        return view('admin.user_film.list', ['films'=>$films]);
    }
}
