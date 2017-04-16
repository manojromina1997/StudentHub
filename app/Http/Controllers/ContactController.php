<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{public function getContact(Request $request)
    {
     return view('others.contactus');
    }
        public function postContact(Request $request)
    {
      Contact::create ([
      'name'=> $request->input('name'),
      'email'=> $request->input('email'),
      'message'=> $request->input('message'),
    
      ]);
       return redirect()->route('contactus')->with('success','Contacted  successfully');
    }
}
