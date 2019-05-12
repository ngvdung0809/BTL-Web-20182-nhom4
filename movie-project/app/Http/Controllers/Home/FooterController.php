<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FooterController extends HomeController
{
    public function about()
    {
    	return view('home.about');
    }
    public function faq()
    {
    	return view('home.faq');
    }
    public function dieukhoan()
    {
    	return view('home.dieukhoan');
    }
    public function privacy()
    {
    	return view('home.privacy');
    }
}
