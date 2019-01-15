<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    //
    public function route()
    {
        return view('contact');
    }

    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contacts.index',compact('contacts'));
        
    }
    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('admin.contacts.edit',compact('contact'));
    }
    public function update(Request $request,$id)
    {
        $contact = Contact::find($id);
        $this->validate($request,[
            'contact_name'     => 'required|min:2',
            'contact_email'    => 'required|email',
            'contact_subject'  => 'required|min:5',
            'contact_message'  => 'required|min:10'
        ]);

        $contact->contact_name      = $request->input('contact_name');
        $contact->contact_email     = $request->input('contact_email');
        $contact->contact_subject   = $request->input('contact_subject');
        $contact->contact_message   = $request->input('contact_message');

        $contact->save();
        return redirect('/adminpanel/contact')->with('flash_message','تم التعديل بنجاح');
    
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'contact_name'     => 'required|min:2',
            'contact_email'    => 'required|email',
            'contact_subject'  => 'required|min:5',
            'contact_message'  => 'required|min:10'
        ]);

        $contact = new Contact();
        $contact->contact_name      = $request->input('contact_name');
        $contact->contact_email     = $request->input('contact_email');
        $contact->contact_subject   = $request->input('contact_subject');
        $contact->contact_message   = $request->input('contact_message');

        $contact->save();
        return redirect('/contact')->with('flash_message','تم استلام رسالتك بنجاح وسوف نرد عليك فى اقرب وقت ممكن');
    }
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect('/adminpanel/contact')->with('flash_message','تم حذف الرسالة بنجاح');
    }
}
