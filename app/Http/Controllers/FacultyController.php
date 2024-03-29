<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faculties = Faculty::all();

        return view('manage-faculty', compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => [
                'required',
                Rule::unique('faculties')->where(function ($query) use ($request) {
                    return $query->where('last_name', $request->input('last_name'));
                }),
            ],
            'last_name' => 'required|string|max:255',
            'rank' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        // Create a new faculty using mass assignment
        $faculty = Faculty::create($validatedData);

        if ($faculty) {
            // Return a JSON response indicating success
            return redirect()->route('manage-faculty')->with('success', 'Faculty created successfully!');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Faculty $faculty)
    {
        if(request()->ajax()) {
            return response()->json($faculty);
        }
        return view('profile.faculty', compact('faculty'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faculty $faculty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faculty $faculty)
    {
        // Define custom validation rule
        $uniqueName = Rule::unique('faculties')->where(function ($query) use ($request, $faculty) {
            return $query->where('first_name', $request->first_name)
                ->where('last_name', '!=', $request->last_name) // Ensure last name is different
                ->orWhere('first_name', '!=', $request->first_name) // Ensure first name is different
                ->where('last_name', $request->last_name);
        });
        $validatedData = $request->validate([
            'first_name' => ['required', $uniqueName],
            'last_name' => ['required', $uniqueName],
            'rank' => 'required',
            'status' => 'required',
        ]);
        $faculty->update($validatedData);

        return response()->json(['success' => true, 'message' => 'Changes has been saved!', 'updatedData' => $faculty]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faculty $faculty)
    {
        $faculty->delete();
        if (request()->ajax()) {
            return response()->json(['success' => true, 'message' => 'Faculty deleted successfully!', 'deletedData' => ['id' => $faculty->id]]);
        }
        return redirect()->route('manage-faculty')->with('delete', 'A faculty member has been deleted!');
    }
}
