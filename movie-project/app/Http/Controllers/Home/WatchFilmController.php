<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Models\FilmEpisode;
use App\Models\Server;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Home\HomeController;

class WatchFilmController extends HomeController
{
    public function watch($id){
        if(FilmEpisode::where('id',$id)->exists()){
            $filmEpisode = FilmEpisode::find($id);
            $number_link = Server::where('episode_id',$id)->count();
            $episode = FilmEpisode::where('film_id',$filmEpisode->film_id);
            $sortEpisode = $episode->orderBy('episode', 'ASC')->get();
            return view('home.watch-film.film',['filmEpisode'=>$filmEpisode,'number_link'=>$number_link,'sortEpisode'=>$sortEpisode]);

        }else{
            return view('error.error');
        }
    }

    public function PostComment(Request $request){
        if(Auth::check()){
            $comment = $request->comment;
            $film_id=$request->id;
            $newComment=new Comment();
            $newComment->film_id=$film_id;
            $newComment->comment=$comment;
            $newComment->user_id=Auth::user()->id;
            $newComment->save();
            $true="true";
            $data=view("home/watch-film/comment",compact('newComment'))->render();
            return response()->json(['html'=>$data,'success'=>$true]);
        }else{
            $data="Bạn chưa đăng nhập";
            $false="false";
            return response()->json(['html'=>$data,'success'=>$false]);
        }

    }
}
