<?php

namespace App\Http\Controllers;

use App\Models\gallary;
use Illuminate\Http\Request;

class GallaryController extends Controller
{
    public function gallary(){
        $gallarys=gallary::get();
        return view('admin.gallary',compact('gallarys'));
    }

    public function  store(Request $request)
    {
        $validatedData = $request->validate([
            'path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('path');
        $imageName = $image->getClientOriginalName();
        $path = $image->storeAs('MainImages', $imageName, 'public');
        $roses = new gallary;
        $roses->path = $path;
        $roses->save();
        return redirect()->back()->with('success', 'Data stored successfully');

    }

    public function  destroy($id)
    {
        $gallary = gallary::find($id);
        if (!$gallary) {
            return redirect()->back()->with('error', 'Chef not found');
        }

        $gallary->delete();
        return redirect()->back()->with('success', 'Chef Deleted successfully');
    }
}
