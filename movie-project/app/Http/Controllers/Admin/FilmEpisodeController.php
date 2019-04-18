<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FilmEpisode;
use App\Models\Film;
use App\Http\Requests\FilmEpisode\FilmEpisodeRequest;
class FilmEpisodeController extends Controller
{

    public function index($id)
    {
        $film=Film::find($id);
        $filmEpisode=$film->film_episode();
        return view('admin.film_episode.list',['filmEpisode'=>$filmEpisode]);
    }


    public function create($id)
    {   $film=Film::find($id);
        $filmName=$film->name;
        return view('admin.film_episode.create',['film_id'=>$id,'filmName'=>$filmName]);
    }


    public function store(FilmEpisodeRequest $request,$id)
    {

    }


    public function show($id)
    {
        //
    }


    public function edit($id,$filmId)
    {

    }


    public function update(Request $request, $id,$filmId)
    {

    }


    public function destroy($id,$filmId)
    {
        $filmEpisode=FilmEpisode::find($id);
        Storage::disk('public')->delete($filmEpisode->image);
        $filmEpisode->delete();
        return redirect()->route('admin_film_episode_list',['id'=>$filmId])->with('success', 'Xóa tập phim thành công');
    }
}
