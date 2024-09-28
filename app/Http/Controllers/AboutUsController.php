<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutRequest;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    public function index(){
    $aboutus=AboutUs::first();
    return view('admin.About.Aboutus',compact('aboutus'));
    }
    public function  update(AboutRequest $request)
    {
        $aboutus =  AboutUs::first();
        $data=$request->validated();
        if ($request->file('first_path')) {
            $first_path = $request->file('first_path')->store('AboutImages','public');
            Storage::disk('public')->delete($aboutus->first_path);
            $data['first_path']=$first_path;
        }
        if ($request->file('second_path')) {
            $second_path = $request->file('second_path')->store('AboutImages','public');
            Storage::disk('public')->delete($aboutus->second_path);
            $data['second_path']=$second_path;
        }
        $aboutus->update($data);
        return redirect()->back()->with('success', 'Data Updated Successfully');
    }
}
