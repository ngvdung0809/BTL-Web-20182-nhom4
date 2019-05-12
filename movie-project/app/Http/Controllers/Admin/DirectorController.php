<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;
use App\Models\Person;
use App\Models\Country;

class DirectorController extends Controller
{
     /**     
     * @return \Illuminate\Http\Response
     */
     //show the list of directors

    public function index()
    {
        $persons = Person::where('job', 'director')->get()->map(function($person) {
            $getcountry = Country::find($person->country_id)->name;
            $person->country_id = $getcountry;
            return $person;
        });
        return view('admin.director.list', ['persons' => $persons]);
    }

    /**
     * create new data.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getcountries = Country::all();
        return view('admin.director.create', ['getcountries' => $getcountries]);
    }

 
    /**
     * Store new data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            //'gender' => ['string', 'max:255'],
            //'birth_day' => ['date_format:Y-m-d'],
            'email' => ['required', 'string', 'max:255'],
            'country_id' => ['required', 'integer'],            
            //'hobby' => ['string', 'max:255'],
            //'forte' => ['string', 'max:255'],
            'job' => ['required', 'string', 'max:255'],
            //'story' => ['string'],
            'view' => ['integer'],
            //'description' => ['string']
        ]);

        $person = new Person();
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put(Config::get('constants.PERSON_IMG.IMG_PATH'), $request->image);
            $person->image = $path;
        }else{
            $person->image = Config::get('constants.PERSON_IMG.IMG_DEFAULT');
        }
        $person->name = $request->name;
        $person->gender = $request->gender;
        $person->birth_day = $request->birth_day;
        $person->email = $request->email;
        $person->country_id = $request->country_id;        
        $person->hobby = $request->hobby;
        $person->forte = $request->forte;
        $person->job = $request->job;
        $person->story = $request->story;
        $person->view = $request->view;
        $person->description = $request->description;
        $person->save();

        return redirect()->route('admin_director_list')->with('success', 'Thông tin '.$person->name.' được thêm mới thành công');
    }


 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getcountries = Country::all();
        $person = Person::find($id);       
        return view('admin.director.edit', ['person' => $person, 'getcountries' => $getcountries]);
    }

 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            //'gender' => ['string', 'max:255'],
            //'birth_day' => ['date_format:Y-m-d'],
            'email' => ['required', 'string', 'max:255'],
            'country_id' => ['required', 'integer'],
            //'hobby' => ['string', 'max:255'],
            //'forte' => ['string', 'max:255'],
            'job' => ['required', 'string', 'max:255'],
            //'story' => ['string'],
            'view' => ['integer'],
            //'description' => ['string']
        ]);

        $person = Person::find($id);
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put(Config::get('constants.PERSON_IMG.IMG_PATH'), $request->image);
            $person->image = $path;
        }else{
            $oldperson = Person::find($id);
            $person->image = $oldperson->image;
        }
        if(($person->name == $request->name) && ($person->gender == $request->gender) 
            && ($person->birth_day == $request->birth_day) && ($person->email == $request->email)
            && ($person->country_id == $request->country_id) && ($person->hobby == $request->hobby)
            && ($person->forte == $request->forte) && ($person->story == $request->story) 
            && ($person->view == $request->view) && ($person->description == $request->description))
            return redirect()->back()->with('error', 'Bạn không sửa đổi thông tin gì !!!');

        $person->name = $request->name;
        $person->gender = $request->gender;
        $person->birth_day = $request->birth_day;
        $person->email = $request->email;
        $person->country_id = $request->country_id;
        $person->hobby = $request->hobby;
        $person->forte = $request->forte;
        $person->job = $request->job;
        $person->story = $request->story;
        $person->view = $request->view;
        $person->description = $request->description;
        $person->save();

        return redirect()->route('admin_director_list')->with('success', 'Thông tin '.$person->name.' đã được cập nhật thành công');
    }

 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $person = Person::find($id);
        $person->delete();

        return redirect()->route('admin_director_list')->with('success', 'Thông tin '. $person->name.' đã được xóa thành công');
    }
 
}
