<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Adventisment;
use App\Http\Requests\AdventismentRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;

class AdventismentController extends Controller
{
    //
    public function index()
    {
        $ads = Adventisment::all();
        return view('admin.adventisment.list', ['ads' => $ads]);
    }

    public function create(){ 
        return view('admin.adventisment.create');
    }

    public function store(AdventismentRequest $request){ 

        $ads = new Adventisment();
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put(Config::get('constants.ADVENTISMENT_IMG.IMG_PATH'), $request->image);
            $ads->image = $path;
        }else{
            $ads->image = Config::get('constants.ADVENTISMENT_IMG.IMG_DEFAULT');
        }
        $ads->name = $request->name;
        
        $ads->link=$request->link;
        $ads->active=$request->active;
        $ads->save();

        return redirect()->route('admin_adventisment_list')->with('success', 'Quảng Cáo  '. $ads->name.' được thêm mới thành công');
        
    }

    public function edit($id){ 
        $ads=Adventisment::find($id);
        return view('admin.adventisment.edit', ['ads' => $ads]);

    }

    public function update(AdventismentRequest $request,$id){ 
        $ads=  Adventisment::find($id);
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put(Config::get('constants.ADVENTISMENT_IMG.IMG_PATH'), $request->image);
            if($ads->image != Config::get('constants.ADVENTISMENT_IMG.IMG_DEFAULT')){
                Storage::disk('public')->delete($ads->image);
            }
            $ads->image = $path;
        }

        $ads->name = $request->name;
        $ads->link=$request->link;
        $ads->active=$request->active;
        $ads->save();

        return redirect()->route('admin_adventisment_list')->with('success', 'Quảng Cáo  '. $ads->name.' được thêm mới thành công');

    }

    public function destroy($id){ 
        $ads=Adventisment::find($id);
        if($ads->delete()){
            if($ads->image != Config::get('constants.ADVENTISMENT_IMG.IMG_DEFAULT')){
                Storage::disk('public')->delete($ads->image);
            }
            return redirect()->route('admin_adventisment_list')->with('success', 'Xóa quảng cáo'. $ads->name .' thành công');
        }else{
            return redirect()->route('admin_adventisment_list')->with('errors', 'Error');
        }
    }
}
