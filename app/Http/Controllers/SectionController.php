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
        // Validate the form data
        $validatedData= $request->validate([
            'active_section_id' => 'required|exists:sections,id', // Add any other validation rules as needed
        ]);
        // Get the selected section ID from the request
        $selectedSectionId = $validatedData['active_section_id'];

        // Update the current active section to be inactive
        Section::where('active', 1)->update(['active' => 0]);

        // Update the new active section
        Section::where('id', $selectedSectionId)->update(['active' => 1]);
        return redirect()->back()->with('success', 'Active section updated successfully.');
    }

    public function  destroy($id)
    {
        $ietm = section::find($id);
        // Check if the product exists
        if (!$ietm) {
            return redirect()->back()->with('error', 'Product not found');
        }

        // Proceed with the deletion
        $ietm->delete();
        return redirect()->back()->with('success', 'Data Deleted successfully.');
    }
}
