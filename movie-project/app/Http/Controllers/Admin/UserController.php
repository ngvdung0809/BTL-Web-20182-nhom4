<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\EditRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;
use App\Models\User;
use App\Models\Country;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $countries = Country::all();
        return view('admin.user.list', ['users' => $users, 'countries'=>$countries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('admin.user.create',['countries'=>$countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
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
        $user->role= $request->role;
        $user->phone = $request->phone;
        $user->country_id = $request->country_id;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->other_description = $request->other_description;

        if ($user->save()) {
            return redirect()->route('admin_user_list')->with('success', 'Người dùng '. $user->name .' đã được thêm thành công');
        } else{
            return redirect()->route('admin_user_create')->with('errors', 'Error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.user.view',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $countries = Country::all();
        return view('admin.user.edit',['user'=>$user, 'countries'=>$countries]);
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
            return redirect()->route('admin_user_list')->with('success', 'Thông tin người dùng '. $user->name .' đã được cập nhật thành công');
        } else{
            return redirect()->route('admin_user_create')->with('errors', 'Error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user->delete()){
            if($user->image != Config::get('constants.USER_AVATAR.AVATAR_DEFAULT')){
                Storage::disk('public')->delete($user->image);
            }
            return redirect()->route('admin_user_list')->with('success', 'Xóa người dùng'. $user->name .' thành công');
        }else{
            return redirect()->route('admin_user_list')->with('errors', 'Error');
        }
    }
}
