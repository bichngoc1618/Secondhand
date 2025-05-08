<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\contact;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        try {
            

            $contact = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'subject' => $request->input('subject'),
                'feedback' => $request->input('feedback'),
            ];
    
     
           contact::create($contact);
           Alert::success('
           Feedback sent successfully','We will respond to you in the shortest possible time');
            return redirect()->back();
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with('error', 'Please enter again!');
        }
    }
    public function index()
    {
        $contact = contact::paginate(10); 
        return view('Admin.contact.index', compact('contact'));
    }
    public function destroy(contact $contact)
    {
        try {
            $contact->delete();
            return redirect()->route('contact.index');
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}
