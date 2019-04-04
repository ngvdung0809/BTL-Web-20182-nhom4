<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Adventisment;
use App\Http\Requests\AdventismentRequest;

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
        $ads->name = $request->name;
        $ads->image = $request->image;
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

        $ads->name = $request->name;
        $ads->image = $request->image;
        $ads->link=$request->link;
        $ads->active=$request->active;
        $ads->save();

        return redirect()->route('admin_adventisment_list')->with('success', 'Quảng Cáo  '. $ads->name.' được thêm mới thành công');

    }

    public function destroy($id){ 
        $ads=Adventisment::find($id);
        $ads->delete();
        return redirect()->route('admin_adventisment_list')->with('success', 'Thông tin quảng cáo  '. $ads->name.' đã được xóa thành công');
    }
}
