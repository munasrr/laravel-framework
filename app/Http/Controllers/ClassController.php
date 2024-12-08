<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;

class ClassController extends Controller
{
    // Method to display the list of classes
    public function classlist()
    {
        $data = Classes::all();
        return view('index', ['data' => $data]);
    }

    // Method to handle form submissions and add new classes
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'class_name' => 'required|string|max:255',
            'class_fee' => 'required|numeric',
            'status' => 'required|in:Active,Deactive,Graduated',
        ]);

        // Create a new class record
        Classes::create([
            'class_name' => $request->class_name,
            'class_fee' => $request->class_fee,
            'status' => $request->status,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Class added successfully!');
    }
    // Method to delete a class by ID
public function destroy($id)
{
    // Find the class by ID or fail
    $class = Classes::findOrFail($id);

    // Delete the class
    $class->delete();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Class deleted successfully!');
}

}