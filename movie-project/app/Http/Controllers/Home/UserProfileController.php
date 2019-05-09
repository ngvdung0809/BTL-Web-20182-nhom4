<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\EditRequest;
use App\Http\Requests\User\ChangePasswordRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
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

    public function showChangePassword($id)
    {
        $user = User::find($id);
        return view('home.user_profile.change_password', ['user'=>$user]);
    }

    public function updateChangePassword(ChangePasswordRequest $request, $id)
    {
        $user = User::find($id);

        if (!(Hash::check($request->get('current-password'), $user->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Mật khẩu không chính xác. Vui lòng thử lại.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","Mật khẩu mới phải khác mật khẩu hiện tại. Vui lòng chọn mật khẩu khác.");
        }

        //Change Password
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Thay đổi mật khẩu thành công");
    }

    public function changeAvatar(Request $request, $id){
        if ($request->ajax()) {
            $user = User::find($id);
            if ($request->hasFile('image_directly')) {
                $path = Storage::disk('public')->put(Config::get('constants.USER_AVATAR.AVATAR_FOLDER'), $request->image_directly);
                if($user->image != Config::get('constants.USER_AVATAR.AVATAR_DEFAULT')){
                    Storage::disk('public')->delete($user->image);
                }
                $user->image = $path;
                $user->save();
            }

            return $user;
        }

        return null;
    }

    public function showFavoristFilm($id)
    {
        $user = User::find($id);
        $films = [];
        foreach ($user->film as $film) {
            if($film->pivot->liked == Config::get('constants.USER_FILM.LIKE')){
                array_push($films, $film);
            }
        }

        return view('home.user_profile.favorist_film', ['user'=>$user, 'films'=>$films]);
    }

    public function showFilmWatchLater($id)
    {
        $user = User::find($id);
        $films = [];
        foreach ($user->film as $film) {
            if($film->pivot->watch_later == Config::get('constants.USER_FILM.WATCHLATER')){
                array_push($films, $film);
            }
        }

        return view('home.user_profile.film_watch_later', ['user'=>$user, 'films'=>$films]);
    }

    public function showRateFilm($id)
    {
        $user = User::find($id);
        $films = [];
        foreach ($user->film as $film) {
            if($film->pivot->point != 0){
                array_push($films, $film);
                $film->point = $film->pivot->point;
            }
        }
        return view('home.user_profile.rate_film', ['user'=>$user, 'films'=>$films]);
    }
}
