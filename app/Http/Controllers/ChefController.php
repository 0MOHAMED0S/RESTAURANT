<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChefRequest;
use App\Models\Chef;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChefController extends Controller
{
    public function chefs(){
        $chefs=Chef::get();
        return view('admin.Chefs.Chefs',compact('chefs'));
    }

    public function  store(ChefRequest $request)
    {
        $data=$request->validated();
        $path = $request->file('path')->store('ChefsImages','public');
        $data['path']=$path;
        Chef::create($data);
        return redirect()->back()->with('success', 'Data stored successfully');
    }

    public function update(ChefRequest $request, $id)
    {
        $chef = Chef::findOrFail($id);
        $data=$request->validated();

        if ($request->file('path')) {
            $path = $request->file('path')->store('ChefsImages','public');
            $data['path']=$path;
            Storage::disk('public')->delete($chef->path);
        }
        $chef->update($data);
        return redirect()->back()->with('success', 'Data Updated Successfully');
    }

    public function  destroy($id)
    {
        $chef = Chef::findOrFail($id);
        $chef->delete();
        Storage::disk('public')->delete($chef->path);
        return redirect()->back()->with('success', 'Chef Deleted successfully');
    }
}
