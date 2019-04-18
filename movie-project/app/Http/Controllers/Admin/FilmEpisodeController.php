<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use App\Models\FilmEpisode;
use App\Models\Film;
use App\Http\Requests\FilmEpisode\FilmEpisodeRequest;
use App\Http\Requests\FilmEpisode\UpdateFilmEpisodeRequest;
class FilmEpisodeController extends Controller
{

    // public function index($id)
    // {
    //     $film=Film::find($id);
    //     $filmEpisode=$film->film_episode();
    //     return view('admin.film_episode.list',['filmEpisode'=>$filmEpisode]);
    // }


    public function create($id)
    {   $film=Film::find($id);
        $filmName=$film->name;
        return view('admin.film_episode.create',['film_id'=>$id,'filmName'=>$filmName]);
    }


    public function store(FilmEpisodeRequest $request,$id)
    {

       $filmEpisode=new FilmEpisode();
       if ($request->hasFile('image')) {
        $pathImage = Storage::disk('public')->put(Config::get('constants.FILM_EPISODE.FILM_EPISODE_FOLDER_IMAGE'), $request->image);
        $filmEpisode->image = $pathImage;
       }
       $filmEpisode->episode=$request->episode;
       $filmEpisode->film_id=$id;
       $filmEpisode->content=$request->content;
       $filmEpisode->save();
       return redirect()->route('admin_film_episode_create',['id'=>$id])->with('success', 'Thêm tập phim thành công');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $filmEpisode=FilmEpisode::find($id);
        return view('admin.film_episode.edit',['filmEpisode'=>$filmEpisode]);
    }

    public function update(UpdateFilmEpisodeRequest $request, $id)
    {
        $filmEpisode=FilmEpisode::find($id);
        $filmId=$filmEpisode->film_id;
        if ($request->hasFile('image')) {
            $pathImage = Storage::disk('public')->put(Config::get('constants.FILM_EPISODE.FILM_EPISODE_FOLDER_IMAGE'), $request->image);
            Storage::disk('public')->delete($filmEpisode->image);
            $filmEpisode->image = $pathImage;
           }
        $filmEpisode->episode=$request->episode;
        $filmEpisode->content=$request->content;
        $filmEpisode->save();
        return redirect()->route('admin_film_view',['id'=>$filmId])->with('success', 'Sửa tập phim thành công');

    }

    public function destroy($id)
    {
        $filmEpisode=FilmEpisode::find($id);
        $filmId=$filmEpisode->film_id;
        Storage::disk('public')->delete($filmEpisode->image);
        $filmEpisode->delete();
        return redirect()->route('admin_film_view',['id'=>$filmId])->with('success', 'Xóa tập phim thành công');
    }
}
