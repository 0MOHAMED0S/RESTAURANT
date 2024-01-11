<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function edit(){
        $aboutus=AboutUs::first();
    return view('admin.edit_aboutus',compact('aboutus'));
    }  
    public function  update(Request $request)
    {
        $aboutus =  AboutUs::first();
        $validatedData = $request->validate([
            'details' => 'required|string',
            'first_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Adjusted for images
            'second_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Adjusted for images and made it nullable
            'booktable_number' => 'required|integer',
        ]);
        if ($request->file('first_path')) {
            $image = $request->file('first_path');
            $imageName = $image->getClientOriginalName();
            $first_path = $image->storeAs('MainImages', $imageName, 'public');
        } else {
            $first_path = $aboutus->first_path;
        }

        if ($request->file('second_path')) {
            $image = $request->file('second_path');
            $imageName = $image->getClientOriginalName();
            $second_path = $image->storeAs('MainImages', $imageName, 'public');
        } else {
            $second_path = $aboutus->second_path;
        }

        $aboutus->details = $validatedData['details'];
        $aboutus->booktable_number = $validatedData['booktable_number'];
        $aboutus->first_path = $first_path;
        $aboutus->second_path = $second_path;
        $aboutus->save();
        return redirect()->back()->with('success', 'Data Updated Successfully');
    }
}
