<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Contact;

class ContactController extends HomeController
{
    //
    public function create_gopy(){
        return view('home.contact.gopy');
    }

    public function create_baoloi(){
        return view('home.contact.phanhoi');
    }

    public function gopystore(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:publisher'],
            'message' => ['required','min:1'],
        ]);
        $p = new Contact();

        $p->name = $request->name;
        $p->email = $request->email;
        $p->subject = 'Góp ý';
        $p->message = $request->message;
        $p->save();

        return redirect()->route('home_contact_gopy')->with('success', 'Phản hồi thành công');
    }

    public function baoloistore(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:publisher'],
            'subject'=>['required','min:1'] ,
            'message' => ['required','min:1'],
        ]);
        $p = new Contact();

        $p->name = $request->name;
        $p->email = $request->email;
        $p->subject = $request->subject;
        $p->message = $request->message;
        $p->save();

        return redirect()->route('home_contact_phanhoi')->with('success', 'Phản hồi thành công');
    }
}
