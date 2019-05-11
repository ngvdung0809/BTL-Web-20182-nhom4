<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;
use App\Models\Publisher;

class PublisherController extends HomeController
{
    public function view($id){
        $publisher = Publisher::find($id);
        $films = Publisher::find($id)->film;
        $publishers = Publisher::where('id', '!=', $id)->take(5)->get();
        
        return view('home.publisher.view', ['p'=>$publisher, 'films'=>$films, 'publishers' => $publishers]);
    }

    public function search(Request $request){
        $input = $request->input('input');
        $type = $request->input('type');

        if($type == 'name'){
            $publishers = Publisher::where('name', 'like', '%' .$input. '%')->get();
        }else{
            $publishers = Publisher::where('address', 'like', '%' .$input. '%')->get();
        }

        return view('home.publisher.search', ['publishers' => $publishers]);
    }
}
