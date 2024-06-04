<?php

namespace App\Http\Controllers;

use App\Models\section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function  store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);
        $section = new section;
        $section->name = $validatedData['name'];
        $section->namo = str_replace(' ', '-', $validatedData['name']);
        $section->save();
        return redirect()->back()->with('success', 'Data stored successfully');
    }

    public function  update(Request $request,$id)
    {
        $section =  section::find($id);
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);
        $section->name = $validatedData['name'];
        $section->namo = str_replace(' ', '-', $validatedData['name']);
        $section->save();
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
        $ietm = section::find($id);
        if (!$ietm) {
            return redirect()->back()->with('error', 'Product not found');
        }

        $ietm->delete();
        return redirect()->back()->with('success', 'Data Deleted successfully.');
    }
}
