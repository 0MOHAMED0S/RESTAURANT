<?php

namespace App\Http\Controllers;

use App\Http\Requests\WelcomeRequest;
use App\Models\welcome as ModelsWelcome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class welcome extends Controller
{
    public function welcomepage(){
        $welcomes=ModelsWelcome::first();
        return view('admin.welcomepage',compact('welcomes'));
    }
    public function  update(WelcomeRequest $request)
    {
        $welcomes =  ModelsWelcome::first();
        $data=$request->validated();
        if ($request->file('logo_path')) {
            $logo_path = $request->file('logo_path')->store('WelcomeImages','public');
            Storage::disk('public')->delete($welcomes->logo_path);
            $data['logo_path']=$logo_path;
        }
        if ($request->file('main_path')) {
            $main_path = $request->file('main_path')->store('WelcomeImages','public');
            Storage::disk('public')->delete($welcomes->main_path);
            $data['main_path']=$logo_path;
        }
        $welcomes->update($data);
        return redirect()->back()->with('success', 'Data Updated Successfully');
    }
}
