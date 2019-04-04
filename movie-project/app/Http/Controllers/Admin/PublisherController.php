<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            'email' => ['required', 'email'],
            'phone' => ['required', 'string', 'max:11', 'min:10'],
            'logo' => ['required', 'string']
        ]);

        $p = new Publisher();
        $p->name = $request->name;
        $p->address = $request->address;
        $p->email = $request->email;
        $p->phone = $request->phone;
        $p->logo = $request->logo;
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
            'logo' => ['required', 'string']
        ]);

        $p = Publisher::find($id);

        if(($p->name == $request->name) && ($p->address == $request->address) && ($p->email == $request->email)
 			&& ($p->phone == $request->phone) && ($p->logo == $request->logo) && ($p->other_description == $request->other_description))
            return redirect()->back()->with('error', 'Bạn không sửa đổi thông tin gì !');
		$p->name = $request->name;
        $p->address = $request->address;
        $p->email = $request->email;
        $p->phone = $request->phone;
        $p->logo = $request->logo;
        $p->other_description = $request->other_description;
        $p->save();

        return redirect()->route('admin_publisher_list')->with('success', 'Nhà sản xuất '. $p->name.' đã được cập nhật thành công!');
    }

    public function destroy($id)
    {
        $p = Publisher::find($id);
        $p->delete();

        return redirect()->route('admin_publisher_list')->with('success', 'Nhà sản xuất  '. $p->name.' đã được xóa thành công');
    }
}
