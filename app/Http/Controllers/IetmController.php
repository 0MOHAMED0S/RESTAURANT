<?php

namespace App\Http\Controllers;

use App\Http\Requests\IetmRequest;
use App\Models\Ietm;
use App\Models\section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IetmController extends Controller
{
    public function create(){
        $sections=section::get();
        return view('admin.Ietms.add',compact('sections'));
    }

    public function  store(IetmRequest $request)
    {
        $data=$request->validated();
        $path=$request->file('path')->store('ProductsImages','public');
        $data['path']=$path;
        Ietm::create($data);
        return redirect()->back()->with('success', 'Data stored successfully');
    }

    public function ietms(){
        $ietms=Ietm::get();
        $sections=section::get();
        return view('admin.Ietms.Ietms',compact('ietms','sections'));
    }
    public function edit($id){
        $ietm=Ietm::find($id);
        $sections=section::get();
        return view('admin.Ietms.edit',compact('ietm','sections'));
    }

    public function update(IetmRequest $request, $id)
    {
        $ietm = Ietm::findOrFail($id);
        $data=$request->validated();
        if ($request->hasFile('path')) {
            $path = $request->file('path')->store('ProductsImages', 'public');
            $data['path']=$path;
            Storage::disk('public')->delete($ietm->path);
        }
        $ietm->update($data);
        return redirect()->back()->with('success', 'Data Updated Successfully');
    }


    public function  destroy($id)
    {
        $ietm = Ietm::findOrFail($id);
        $ietm->delete();
        Storage::disk('public')->delete($ietm->path);
        return redirect()->back()->with('success', 'Data Deleted successfully');
    }
}
