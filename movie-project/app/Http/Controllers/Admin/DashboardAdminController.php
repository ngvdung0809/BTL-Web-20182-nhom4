<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\User;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Server;
use App\Models\Type;
use App\Models\Publisher;
use App\Models\Person;
use App\Http\Controllers\Controller;

class DashboardAdminController extends Controller
{
    //
    public function index(){

        $numberFilm=Film::count();
        $numberUser=User::count();
        $numberComment=Comment::count();
        $numberContact=Contact::count();
        $numberActor=Person::where('job','actor')->count();
        $numberType=Type::count();
        $numberDirector=Person::where('job','director')->count();
        $numberPublisher=Publisher::count();
        $newUser=User::orderBy('created_at', 'DESC')->limit(8)->get(['username','image']);
        $newComment=Comment::orderBy('created_at','DESC')->limit(8)->get();
        $oldComment=Comment::orderBy('created_at','DESC')->limit(40)->get();
        $newFilm=Film::orderBy('created_at','DESC')->limit(10)->get();
        $newContact=Contact::orderBy('created_at','DESC')->first();
        $newServer=Server::orderBy('created_at','DESC')->limit(4)->get();

        return view('admin.dashboard.index',['numberFilm'=>$numberFilm,'numberUser'=>$numberUser,
            'numberComment'=>$numberComment,'numberContact'=>$numberContact,
            'newUser'=>$newUser,'newComment'=>$newComment,'oldComment'=>$oldComment,
            'newFilm'=>$newFilm,'contact'=>$newContact,
            'newServer'=>$newServer,'numberType'=>$numberType,'numberActor'=>$numberActor,'numberPublisher'=>$numberPublisher,'numberDirector'=>$numberDirector]);
    }
}
