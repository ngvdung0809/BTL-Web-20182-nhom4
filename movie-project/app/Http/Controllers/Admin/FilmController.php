<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Film\CreateRequest;
use App\Http\Requests\Film\EditRequest;
use App\Models\Film;
use App\Models\Publisher;
use App\Models\Person;
use App\Models\Country;
use App\Models\Type;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::all();
        return view('admin.film.list', ['films'=>$films]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $publishers = Publisher::all();
        $directors = Person::where('job', 'director')->get();
        $actors = Person::where('job', 'actor')->get();
        $countries = Country::all();
        $typies = Type::all();
        return view('admin.film.create', ['publishers'=>$publishers, 'directors'=>$directors, 'actors'=>$actors, 'countries'=>$countries, 'typies'=>$typies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $film = new Film();
        if ($request->hasFile('image')) {
            $pathImage = Storage::disk('public')->put(Config::get('constants.FILM_IMAGE.FILM_IMAGE_FOLDER'), $request->image);
            $film->image = $pathImage;
        }

        if ($request->hasFile('trailer_link')) {
            $pathTrailerFilm = Storage::disk('public')->put(Config::get('constants.FILM.FILM_TRAILER_FOLDER'), $request->trailer_link);
            $film->trailer_link = $pathTrailerFilm;
        }
        $film->name = $request->name;
        $film->tag = $request->tag;
        $film->publisher_id = $request->publisher_id;
        $film->director_id = $request->director_id;
        $film->country_id = $request->country_id;
        $film->released = $request->released;
        $film->content = $request->content;
        $film->other_description = $request->other_description;
        $film->save();
        $film->actor()->attach($request->actor_id);
        $film->type()->attach($request->type_id);

        return redirect()->route('admin_film_list')->with('success', 'Film has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $film = Film::find($id);
        $liked = 0;
        $view = 0;
        $share = 0;
        $rate = 0;
        if (count($film->user) > 0) {
            foreach ($film->user as $user) {
                $liked = $liked + $user->pivot->liked;
                $view = $view + $user->pivot->view;
                $share = $share + $user->pivot->share;
                $rate = $rate + $user->pivot->point;
            }
            $rate = $rate/count($film->user);
        }
        return view('admin.film.view', ['film'=>$film, 'rate'=>$rate, 'liked'=>$liked, 'view'=>$view, 'share'=>$share]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $film = Film::find($id);
        foreach ($film->type as $type) {
            $film->typeId = $film->type->pluck('id')->all();
        }
        foreach ($film->actor as $actor) {
            $film->actorId = $film->actor->pluck('id')->all();
        }
        $publishers = Publisher::all();
        $directors = Person::where('job', 'director')->get();
        $actors = Person::where('job', 'actor')->get();
        $countries = Country::all();
        $typies = Type::all();
        return view('admin.film.edit', ['publishers'=>$publishers, 'directors'=>$directors, 'actors'=>$actors, 'countries'=>$countries, 'typies'=>$typies, 'film'=>$film]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, $id)
    {
        $film = Film::find($id);
        if ($request->hasFile('image')) {
            $pathImage = Storage::disk('public')->put(Config::get('constants.FILM_IMAGE.FILM_IMAGE_FOLDER'), $request->image);
            Storage::disk('public')->delete($film->image);
            $film->image = $pathImage;
        }

        if ($request->hasFile('trailer_link')) {
            $pathTrailerFilm = Storage::disk('public')->put(Config::get('constants.FILM.FILM_TRAILER_FOLDER'), $request->trailer_link);
            Storage::disk('public')->delete($film->trailer_link);
            $film->trailer_link = $pathTrailerFilm;
        }
        $film->name = $request->name;
        $film->tag = $request->tag;
        $film->publisher_id = $request->publisher_id;
        $film->director_id = $request->director_id;
        $film->country_id = $request->country_id;
        $film->released = $request->released;
        $film->content = $request->content;
        $film->other_description = $request->other_description;
        $film->save();
        $film->actor()->detach();
        $film->actor()->attach($request->actor_id);
        $film->type()->detach();
        $film->type()->attach($request->type_id);

        return redirect()->route('admin_film_list')->with('success', 'Film has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $film = Film::find($id);
        Storage::disk('public')->delete($film->image);
        Storage::disk('public')->delete($film->trailer_link);
        $film->actor()->detach();
        $film->type()->detach();
        $film->delete();

        return redirect()->route('admin_film_list')->with('success', 'Film has been deleted successfully');
    }
}
