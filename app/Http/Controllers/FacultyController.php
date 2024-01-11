<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

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
            'name' => 'required|string|max:255',
            'rank' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);
    
        // Create a new faculty using mass assignment
        $faculty = Faculty::create($validatedData);
    
        return redirect()->route('manage-faculty')->with('success', 'Faculty created successfully!');

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
        //
    }
}
