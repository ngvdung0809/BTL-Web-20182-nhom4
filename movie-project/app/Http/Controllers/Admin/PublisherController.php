<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;

use App\Models\Publisher;

class PublisherController extends Controller
{
    //
     public function index()
    {
        $publishers = Publisher::all();
        return view('admin.publisher.list', ['publishers' => $publishers]);
    }
     public function create()
    {
        return view('admin.publisher.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:publisher'],
            'phone' => ['required', 'string', 'max:11', 'min:10'],   
            'logo' => ['required']       
        ]);
        $p = new Publisher();

        if ($request->hasFile('logo')) {
            $path = Storage::disk('public')->put(Config::get('constants.PUBLISHER_IMAGE.PUBLISHER_LOGO_FOLDER'), $request->logo);
            $p->logo = $path;
        }else{
            $p->logo = Config::get('constants.PUBLISHER_IMAGE.DEFAULT_PUBLISHER_LOGO');
        }

        $p->name = $request->name;
        $p->address = $request->address;
        $p->email = $request->email;
        $p->phone = $request->phone;
        $p->other_description = $request->other_description;
        $p->save();

        return redirect()->route('admin_publisher_list')->with('success', 'Nhà sản xuất  '. $p->name.' được thêm mới thành công!');
    }
    
    public function edit($id)
    {
        $p = Publisher::find($id);
        return view('admin.publisher.edit', ['p' => $p]);
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
           'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string', 'max:11', 'min:10'],
            'logo' => ['required']
        ]);
        $p = Publisher::find($id);
        if ($request->hasFile('logo')) {
            $path = Storage::disk('public')->put(Config::get('constants.PUBLISHER_IMAGE.PUBLISHER_LOGO_FOLDER'), $request->logo);
            if($p->logo != Config::get('constants.PUBLISHER_IMAGE.DEFAULT_PUBLISHER_LOGO')){
                Storage::disk('public')->delete($p->logo);
            }
            $p->logo = $path;
        }
    
		$p->name = $request->name;
        $p->address = $request->address;
        $p->email = $request->email;
        $p->phone = $request->phone;
        $p->other_description = $request->other_description;
        $p->save();

        return redirect()->route('admin_publisher_list')->with('success', 'Nhà sản xuất '. $p->name.' đã được cập nhật thành công!');
    }

    public function destroy($id)
    {
        $p = Publisher::find($id);
        if($p->delete()){
            if($p->logo != Config::get('constants.PUBLISHER_IMAGE.DEFAULT_PUBLISHER_LOGO')){
                Storage::disk('public')->delete($p->logo);
            }
            return redirect()->route('admin_publisher_list')->with('success', 'Nhà sản xuất  '. $p->name.' đã được xóa thành công');
        }else{
            return redirect()->route('admin_publisher_list')->with('errors', 'Error');
        }
        
    }
}
