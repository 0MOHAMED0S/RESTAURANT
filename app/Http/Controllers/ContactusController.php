<?php

namespace App\Http\Controllers;

use App\Models\contactus;
use Illuminate\Http\Request;

class ContactusController extends Controller
{
    public function contactus(){
        $contactus=contactus::first();
        return view('admin.contactus',compact('contactus'));
    }
    public function update(Request $request, $id)
    {
        $contactus = contactus::find($id);
    
        $validatedData = $request->validate([
            'link' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|string',
            'number' => 'required|string',
            'opening_hour' => 'required|string',
            'facebook' => 'string|nullable',
            'instgram' => 'string|nullable',
        ]);

        $contactus->link = $validatedData['link'];
        $contactus->address = $validatedData['address'];
        $contactus->facebook = $validatedData['facebook'];
        $contactus->instgram = $validatedData['instgram'];
        $contactus->opening_hour = $validatedData['opening_hour'];
        $contactus->email = $validatedData['email'];
        $contactus->number = $validatedData['number']; 
        $contactus->save();
        return redirect()->back()->with('success', 'Data Updated Successfully');
    }
}
