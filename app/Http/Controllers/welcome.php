<?php

namespace App\Http\Controllers;

use App\Models\welcome as ModelsWelcome;
use Illuminate\Http\Request;

class welcome extends Controller
{
    public function welcomepage(){
        $welcomes=ModelsWelcome::first();
        return view('admin.welcomepage',compact('welcomes'));
    }
    public function  update(Request $request)
    {
        $welcomes =  ModelsWelcome::first();
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'logo_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Adjusted for images
            'main_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Adjusted for images and made it nullable
            'hight_light' => 'required|string',
        ]);
        if ($request->file('logo_path')) {
            $image = $request->file('logo_path');
            $imageName = $image->getClientOriginalName();
            $logo_path = $image->storeAs('MainImages', $imageName, 'public');
        } else {
            $logo_path = $welcomes->logo_path;
        }

        if ($request->file('main_path')) {
            $image = $request->file('main_path');
            $imageName = $image->getClientOriginalName();
            $main_path = $image->storeAs('MainImages', $imageName, 'public');
        } else {
            $main_path = $welcomes->main_path;
        }

        $welcomes->name = $validatedData['name'];
        $welcomes->description = $validatedData['description'];
        $welcomes->hight_light = $validatedData['hight_light'];
        $welcomes->logo_path = $logo_path;
        $welcomes->main_path = $main_path;
        $welcomes->save();
        return redirect()->back()->with('success', 'Data Updated Successfully');
    }
}
