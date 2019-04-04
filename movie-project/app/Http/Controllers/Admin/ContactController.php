<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
class ContactController extends Controller
{
    //
    public function GetListContact(){
        $contacts=Contact::all();
        return view('admin/contact/list',['contacts'=>$contacts]);
    }
    public function GetShowContact($id){
        if(Contact::where('id',$id)->exists()){
            $contact=Contact::find($id);
            return view('admin/contact/show',['contact'=>$contact]);
      }
      else{
          return redirect()->route('admin_contact_list')->with('error','Phản hồi không tồn tại');
      }

    }
    public function DeleteContact($id){
        if(Contact::where('id',$id)->exists()){
              $contact=Contact::find($id);
              $contact->delete();
              return redirect()->route('admin_contact_list')->with('success','Xóa thành công');
        }
        else{
            return redirect()->route('admin_contact_list')->with('error','Phản hồi không tồn tại');
        }
    }
}
