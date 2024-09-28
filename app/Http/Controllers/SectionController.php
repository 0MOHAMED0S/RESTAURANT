<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionRequest;
use App\Models\section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function sections(){
        $sections=section::get();
        return view('admin.Sections.Sections',compact('sections'));
    }
    public function  store(SectionRequest $request)
    {
        $data=$request->validated();
        $namo = str_replace(' ', '-', $request->name);
        $data['namo']=$namo;
        Section::create($data);
        return redirect()->back()->with('success', value: 'Data stored successfully');
    }

    public function  update(SectionRequest $request,$id)
    {
        $section =  section::find($id);
        $data=$request->validated();
        $namo = str_replace(' ', '-', $request->name);
        $data['namo']=$namo;
        $section->update($data);
        return redirect()->back()->with('success', 'Data Updated Successfully');
    }
    public function updateActiveSection(Request $request)
    {
        $validatedData= $request->validate([
            'active_section_id' => 'required|exists:sections,id',
        ]);
        $selectedSectionId = $validatedData['active_section_id'];

        Section::where('active', 1)->update(['active' => 0]);

        Section::where('id', $selectedSectionId)->update(['active' => 1]);
        return redirect()->back()->with('success', 'Active section updated successfully.');
    }

    public function  destroy($id)
    {
        $section = section::findOrFail($id);
        $sectionount = $section->ietms->count();
        if ($sectionount > 0) {
            return redirect()->back()->with('error', 'Section cannot be deleted because there are ' . $sectionount . ' Ietms in this section!');
        }
        $section->delete();
        return redirect()->back()->with('success', 'Section Deleted successfully.');
    }
}
