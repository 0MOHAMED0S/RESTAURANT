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
            'section_id' => 'required|exists:sections,id',
            'name' => 'required|string',
            'path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|integer',
        ]);

        $image = $request->file('path');
        $imageName = $image->getClientOriginalName();
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
            'path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'section_id' => 'required|exists:sections,id',
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
        $menus->section_id = $validatedData['section_id'];
        $menus->price = $validatedData['price'];
        $menus->path = $path;
        $menus->save();
        return redirect()->back()->with('success', 'Data Updated Successfully');
    }


    public function  destroy($id)
    {
        $ietm = menu::find($id);
        if (!$ietm) {
            return redirect()->back()->with('error', 'Product not found');
        }

        $ietm->delete();
        return redirect()->back()->with('success', 'Data Deleted successfully');
    }
}
