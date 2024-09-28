<?php

namespace App\Http\Controllers;

use App\Http\Requests\GallaryRequest;
use App\Models\GallaryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GallaryController extends Controller
{
    public function gallary(){
        $gallarys=GallaryImage::get();
        return view('admin.Gallary.Gallary',compact('gallarys'));
    }

    public function  store(GallaryRequest $request)
    {
        $data=$request->validated();
        $path = $request->file('path')->store('GallaryImages','public');
        $data['path']=$path;
        GallaryImage::create($data);
        return redirect()->back()->with('success', 'Data stored successfully');
    }

    public function  destroy($id)
    {
        $gallary = GallaryImage::findOrFail($id);
        $gallary->delete();
        Storage::disk('public')->delete($gallary->path);
        return redirect()->back()->with('success', 'Data Deleted successfully');
    }
}
