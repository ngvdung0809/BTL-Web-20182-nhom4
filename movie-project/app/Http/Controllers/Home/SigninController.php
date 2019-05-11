<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;
use App\Models\User;
use Illuminate\Validation\Rule;

class SigninController extends Controller
{
    public function signin(){

        $countries = Country::all();
        return view('home.user.signin',['countries'=>$countries]);
    }

    public function store(Request $request){

        $request->validate([
            'username' => ['required', 'min:3', 'max:255'],
            'name' => ['required', 'min:3', 'max:255'],
            'gender' => ['required', Rule::in(['male', 'female', 'other'])],
            'birth_day' => ['required', 'date'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'min:9', 'max:15'],
            'country_id' => ['required', 'numeric'],
            'password' => ['required', 'min:6', 'confirmed']     
        ]);


        $user = new User();
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put(Config::get('constants.USER_AVATAR.AVATAR_FOLDER'), $request->image);
            $user->image = $path;
        }else{
            $user->image = Config::get('constants.USER_AVATAR.AVATAR_DEFAULT');
        }
        $user->username = $request->username;
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->birth_day = $request->birth_day;
        $user->role= '0';
        $user->phone = $request->phone;
        $user->country_id = $request->country_id;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->other_description = 'no';
        $user->save();

        return redirect()->route('home_index')->with('success','Đăng ký thành công');
    }
}
