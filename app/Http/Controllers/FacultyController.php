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
        try {
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
                return response()->json(['success' => true]);
            }

            // Return a JSON response indicating an error
            return response()->json(['success' => false, 'message' => 'Faculty not created!'], 500);
        } catch (\Illuminate\Database\QueryException $e) {
            // If there's a database-related error (e.g., unique constraint violation), return an appropriate JSON response
            return response()->json(['success' => false, 'message' => 'Faculty already exists!'], 422);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Faculty $faculty)
    {
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faculty $faculty)
    {
        $faculty->delete();
        return redirect()->route('manage-faculty')->with('delete', 'A faculty member has been deleted!');
    }
}
