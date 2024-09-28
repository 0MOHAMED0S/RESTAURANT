<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\contactus;
use Illuminate\Http\Request;

class ContactusController extends Controller
{
    public function contactus(){
        $contactus=contactus::first();
        return view('admin.Contact.Contact',compact('contactus'));
    }
    public function update(ContactRequest $request, $id)
    {
        $contactus = contactus::find($id);
        $data=$request->validated();
        $contactus->update($data);
        return redirect()->back()->with('success', 'Data Updated Successfully');
    }
}
