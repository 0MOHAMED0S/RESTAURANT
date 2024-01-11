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
            'path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Adjusted for images and made it nullable
        ]);

        $image = $request->file('path'); // Assuming 'path' is the file input
        $imageName = $image->getClientOriginalName(); // You can customize this as needed
        $path = $image->storeAs('MainImages', $imageName, 'public');
        $roses = new gallary;
        $roses->path = $path;
        $roses->save();
        return redirect()->back()->with('success', 'Data stored successfully');

    }

    public function  destroy($id)
    {
        $gallary = gallary::find($id);
        // Check if the product exists
        if (!$gallary) {
            return redirect()->back()->with('error', 'Chef not found');
        }

        // Proceed with the deletion
        $gallary->delete();
        return redirect()->back()->with('success', 'Chef Deleted successfully');
    }
}
