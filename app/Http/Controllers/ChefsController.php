<?php

namespace App\Http\Controllers;

use App\Models\chefs;
use Illuminate\Http\Request;

class ChefsController extends Controller
{
    public function chefs(){
        $chefs=chefs::get();
        return view('admin.chefs',compact('chefs'));
    }

    public function  store(Request $request)
    {
        $validatedData = $request->validate([
            'details' => 'required|string',
            'name' => 'required|string', 
            'path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Adjusted for images and made it nullable
            'rank' => 'required|string', 
        ]);
        $image = $request->file('path'); // Assuming 'path' is the file input
        $imageName = $image->getClientOriginalName(); // You can customize this as needed
        $path = $image->storeAs('MainImages', $imageName, 'public');
        $chefs = new chefs;
        $chefs->name = $validatedData['name'];
        $chefs->details = $validatedData['details'];
        $chefs->rank = $validatedData['rank'];
        $chefs->path = $path;
        $chefs->save();
        return redirect()->back()->with('success', 'Data stored successfully');
    }

    public function update(Request $request, $id)
    {
        $chefs = chefs::find($id);
    
        $validatedData = $request->validate([
            'name' => 'required|string',
            'rank' => 'required|string',
            'path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Adjusted for images
            'details' => 'required|string',
        ]);
        
    
        if ($request->file('path')) {
            $image = $request->file('path');
            $imageName = $image->getClientOriginalName();
            $path = $image->storeAs('MainImages', $imageName, 'public');
        } else {
            $path = $chefs->path;
        }
    
        $chefs->name = $validatedData['name'];
        $chefs->details = $validatedData['details'];
        $chefs->rank = $validatedData['rank']; // Corrected attribute name
        $chefs->path = $path;
        $chefs->save();
        return redirect()->back()->with('success', 'Data Updated Successfully');
    }

    public function  destroy($id)
    {
        $chef = chefs::find($id);
        // Check if the product exists
        if (!$chef) {
            return redirect()->back()->with('error', 'Chef not found');
        }

        // Proceed with the deletion
        $chef->delete();
        return redirect()->back()->with('success', 'Chef Deleted successfully');
    }
}
