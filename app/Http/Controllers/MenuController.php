<?php

namespace App\Http\Controllers;

use App\Models\menu;
use App\Models\section;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function create(){
        $sections=section::get();
    return view('admin.create_menu',compact('sections'));
    }  

    public function  store(Request $request)
    {
        $validatedData = $request->validate([
            'details' => 'required|string',
            'section_id' => 'required|exists:sections,id', // Check if the selected section_id exists in the sections table
            'name' => 'required|string', 
            'path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Adjusted for images and made it nullable
            'price' => 'required|integer',
        ]);

        $image = $request->file('path'); // Assuming 'path' is the file input
        $imageName = $image->getClientOriginalName(); // You can customize this as needed
        $path = $image->storeAs('MainImages', $imageName, 'public');
        $roses = new menu;
        $roses->name = $validatedData['name'];
        $roses->details = $validatedData['details'];
        $roses->price = $validatedData['price'];
        $roses->section_id = $validatedData['section_id'];
        $roses->path = $path;
        $roses->save();
        return redirect()->back()->with('success', 'Data stored successfully');

    }

    public function edit($id){
        $menu=menu::find($id);
        $sections=section::get();
    return view('admin.edit_menu',compact('menu','sections'));
    }

    public function update(Request $request, $id)
    {
        $menus = Menu::find($id);
    
        $validatedData = $request->validate([
            'name' => 'required|string',
            'details' => 'required|string',
            'path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Adjusted for images
            'section_id' => 'required|exists:sections,id', // Check if the selected section_id exists in the sections table
            'price' => 'required|integer',
        ]);
        
    
        if ($request->file('path')) {
            $image = $request->file('path');
            $imageName = $image->getClientOriginalName();
            $path = $image->storeAs('MainImages', $imageName, 'public');
        } else {
            $path = $menus->path;
        }
    
        $menus->name = $validatedData['name'];
        $menus->details = $validatedData['details'];
        $menus->section_id = $validatedData['section_id']; // Corrected attribute name
        $menus->price = $validatedData['price'];
        $menus->path = $path;
        $menus->save();
        return redirect()->back()->with('success', 'Data Updated Successfully');
    }
    

    public function  destroy($id)
    {
        $ietm = menu::find($id);
        // Check if the product exists
        if (!$ietm) {
            return redirect()->back()->with('error', 'Product not found');
        }

        // Proceed with the deletion
        $ietm->delete();
        return redirect()->back()->with('success', 'Data Deleted successfully');
    }
}
