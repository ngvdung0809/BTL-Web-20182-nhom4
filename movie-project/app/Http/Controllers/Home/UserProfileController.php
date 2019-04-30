<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\EditRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;
use App\Models\User;
use App\Models\Country;

class UserProfileController extends Controller
{

    public function showProfile($id)
    {
        $user = User::find($id);
        $countries = Country::all();
        return view('home.user_profile.profile', ['user'=>$user, 'countries'=>$countries]);
    }

    public function updateProfile(EditRequest $request, $id)
    {
        $request->validate(['email'=>'unique:users,email,' . $id]);

        $user = User::find($id);
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put(Config::get('constants.USER_AVATAR.AVATAR_FOLDER'), $request->image);
            if($user->image != Config::get('constants.USER_AVATAR.AVATAR_DEFAULT')){
                Storage::disk('public')->delete($user->image);
            }
            $user->image = $path;
        }
        $user->username = $request->username;
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->birth_day = $request->birth_day;
        $user->role= $request->role;
        $user->phone = $request->phone;
        $user->country_id = $request->country_id;
        $user->email = $request->email;
        $user->other_description = $request->other_description;

        if ($user->save()) {
            return redirect()->back()->with('success', 'Thông tin đã được cập nhật thành công');
        } else{
            return redirect()->back()->with('errors', 'Error');
        }
    }
}
