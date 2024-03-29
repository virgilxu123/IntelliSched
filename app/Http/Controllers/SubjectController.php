<?php

namespace App\Http\Controllers;

use App\Models\Term;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::with('term')->get();

        return view('manage-subjects', compact('subjects'));
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
            'course_code' => 'required|unique:subjects,course_code',
            'description' => 'required',
            'units' => 'required',
            'year_level' => 'required',
            'term_id' => 'required',
            'subject_type' => 'required',
            'laboratory' => 'required',
        ]);
        // Create a new faculty using mass assignment
        $subject = Subject::create($validatedData);

        return redirect()->route('manage-subjects')->with('success', 'Subject created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        $subject->load('term');
        $subject->term_name = $subject->term->term;

        return response()->json($subject);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        $validatedData = $request->validate([
            'course_code' => 'required|unique:subjects,course_code,'. $subject->id,
            'description' => 'required',
            'units' => 'required',
            'year_level' => 'required',
            'term_id' => 'required',
            'subject_type' => 'required',
            'laboratory' => 'required',
        ]);
        $subject->update($validatedData);

        // Include the term data in the response
        $subject->load('term'); // Load the term relationship
        $subject->term_name = $subject->term->term; // Add the term name to the subject object

        return response()->json(['success' => true, 'message' => 'Changes has been saved!', 'updatedData' => $subject]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return response()->json(['success' => true, 'message' => 'Subject has been deleted!','deletedData' => ['id' => $subject->id]]);
    }
}
