<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Models\Country;
use App\Models\Film;
use Illuminate\Support\Facades\DB;

class ActorController extends HomeController
{
    //
	public function index(Request $request)
	{

		//SORTING
		$by = '';
		$order = '';
		$selectsort = $request->input('selectsort');
		if (($selectsort == 'default') || (empty($selectsort)) ) {
			$by = 'id';
			$order = 'ASC';
		}
		elseif ($selectsort == 'tenAZ') {
			$by = 'name';
			$order = 'ASC';
		}
		elseif ($selectsort == 'tenZA') {
			$by = 'name';
			$order = 'DESC';
		}
		elseif ($selectsort == 'ngaybl') {
			$by = 'birth_day';
			$order = 'ASC';
		}
		elseif ($selectsort == 'ngaylb') {
			$by = 'birth_day';
			$order = 'DESC';
		}
		elseif ($selectsort == 'viewASC') {
			$by = 'view';
			$order = 'ASC';
		}
		elseif ($selectsort == 'viewDESC') {
			$by = 'view';
			$order = 'DESC';
		}
		

		//FIND AND PAGING
		$persons = Person::where('job', 'actor')->orderBy($by,$order)->paginate(5); 
		foreach ($persons as $person ) {
			$getcountry = Country::find($person->country_id)->name;
            $person->country_id = $getcountry;
		}
		
		//GENERATE RANDOM POPULAR ACTORS
		$recommends = Person::where('job', 'actor')->orderBy('view','DESC')->offset(rand(0, 6))->limit(3)->get();
		$countries = Country::all();

		
		return view('home.actor.list', [
		    'persons' => $persons,
		    'presort' => $selectsort,
		    'recommends' => $recommends,
		    'countries' => $countries
		]);

		
	}

	public function search(Request $request)
	{
		//SORTING
		$by = '';
		$order = '';
		$selectsort = $request->input('selectsort');
		if (($selectsort == 'default') || (empty($selectsort)) ) {
			$by = 'id';
			$order = 'ASC';
		}
		elseif ($selectsort == 'tenAZ') {
			$by = 'name';
			$order = 'ASC';
		}
		elseif ($selectsort == 'tenZA') {
			$by = 'name';
			$order = 'DESC';
		}
		elseif ($selectsort == 'ngaybl') {
			$by = 'birth_day';
			$order = 'ASC';
		}
		elseif ($selectsort == 'ngaylb') {
			$by = 'birth_day';
			$order = 'DESC';
		}
		elseif ($selectsort == 'viewASC') {
			$by = 'view';
			$order = 'ASC';
		}
		elseif ($selectsort == 'viewDESC') {
			$by = 'view';
			$order = 'DESC';
		}

		//SEARCHING AND PAGING
		$name = $request->input('name');
		$findcountry = $request->input('country');
		$dataarray=array($name,$findcountry);

		$persons = Person::where([ ['job', 'actor'], ['name', 'like', "%{$name}%"], ['country_id', '=', $findcountry] ])
								->orderBy($by,$order)->paginate(5); 
		foreach ($persons as $person ) {
			$getcountry = Country::find($person->country_id)->name;
            $person->country_id = $getcountry;
		}
		
		//GENERATE RANDOM POPULAR ACTORS
		$recommends = Person::where('job', 'actor')->orderBy('view','DESC')->offset(rand(0, 6))->limit(3)->get();
		$countries = Country::all();

		return view('home.actor.search', [
		    'persons' => $persons,
		    'presort' => $selectsort,
		    'recommends' => $recommends,
		    'countries' => $countries,
		    'dataarray' => $dataarray
		]);
	}

	public function view(Request $request, $id)
	{
		$actor = Person::find($id);		
		$getcountry = Country::find($actor->country_id)->name;
        $actor->country_id = $getcountry;
		$actor->birth_day = date("j F Y", strtotime($actor->birth_day));

		$countries = Country::all();

		//SORTING
		$by = '';
		$order = '';
		$selectsort = $request->input('selectsort');
		if (($selectsort == 'default') || (empty($selectsort)) ) {
			$by = 'id';
			$order = 'ASC';
		}
		elseif ($selectsort == 'tenAZ') {
			$by = 'name';
			$order = 'ASC';
		}
		elseif ($selectsort == 'tenZA') {
			$by = 'name';
			$order = 'DESC';
		}
		elseif ($selectsort == 'ngayASC') {
			$by = 'released';
			$order = 'ASC';
		}
		elseif ($selectsort == 'ngayDESC') {
			$by = 'released';
			$order = 'DESC';
		}
		elseif ($selectsort == 'NSXASC') {
			$by = 'publisher_id';
			$order = 'ASC';
		}
		elseif ($selectsort == 'NSXDESC') {
			$by = 'publisher_id';
			$order = 'DESC';
		}
		elseif ($selectsort == 'QGASC') {
			$by = 'country_id';
			$order = 'ASC';
		}
		elseif ($selectsort == 'QGDESC') {
			$by = 'country_id';
			$order = 'DESC'
;		}
		
		$getallfilms = Person::find($id)->filmact()->orderBy($by,$order)->paginate(5);
		foreach ($getallfilms as $getallfilm ) {
			$getcountry = Country::find($getallfilm->country_id)->name;
            $getallfilm->country_id = $getcountry;
		}
          $filmactivestate = $request->filmactivestate;
          $as = $request->query();
          
		return  view('home.actor.view', [ 
											'actor' => $actor , 
											'countries' => $countries,
											'getallfilms' => $getallfilms,
		    								'presort' => $selectsort,
		    								'filmactivestate' => $filmactivestate
										]);
	}



}
