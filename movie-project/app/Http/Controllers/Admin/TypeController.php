<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TypeRequest;
use App\Http\Requests\EditTypeRequest;
use App\Models\Type;


class TypeController extends Controller
{
    //
    public function GetListType(){
        $types=Type::all();
        return view('admin/type/list',['types'=>$types]);
    }
    public function GetNewType(){
        return view('admin/type/create');
    }
    public function PostNewType(TypeRequest $request){
        $type= new Type();
        $type->name=$request->name;
        $type->abbrev=$request->abbrev;
        $type->save();
        return redirect('admin/type/list')->with('success','Thêm thành công');
    }
    public function GetEditType($id){
        if(Type::where('id',$id)->exists()){
            $type=Type::where('id',$id)->first();
            return view('admin/type/edit',['type'=>$type]);
      }
      else{
          return redirect('admin/type/list')->with('error','Thể loại không tồn tại');
      }
    }
    public function PostEditType(EditTypeRequest $request,$id){
        if(Type::where('id',$id)->exists()){
            $type=Type::where('id',$id)->first();
            $type->name=$request->name;
            $type->abbrev=$request->abbrev;
            $type->save();
            return redirect('admin/type/list')->with('success','Sửa thành công');
      }
      else{
          return redirect('admin/type/list')->with('error','Thể loại không tồn tại');
      }
    }
    public function DeleteType($id){
        if(Type::where('id',$id)->exists()){
              $type=Type::where('id',$id)->first();
              $type->delete();
              return redirect('admin/type/list')->with('success','Xóa thành công');
        }
        else{
            return redirect('admin/type/list')->with('error','Thể loại không tồn tại');
        }
    }
}
