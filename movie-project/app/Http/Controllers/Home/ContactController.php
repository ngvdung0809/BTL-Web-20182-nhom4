<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    //
    public function create_gopy(){
        return view('home.contact.gopy');
    }

    public function create_baoloi(){
        return view('home.contact.phanhoi');
    }
}
