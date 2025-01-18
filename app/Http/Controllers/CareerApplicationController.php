<?php

namespace App\Http\Controllers;

use App\Models\CareerApplication;
use Illuminate\Http\Request;

class CareerApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:career_applications,email',
            'position' => 'required|string',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Store the uploaded resume file
        $resumePath = $request->file('resume')->store('resumes', 'public');

        // Save the application to the database
        CareerApplication::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'position' => $validated['position'],
            'resume_path' => $resumePath,
        ]);

        // Return a success response
        return back()->with('success', 'Your application has been submitted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(CareerApplication $careerApplication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CareerApplication $careerApplication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CareerApplication $careerApplication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CareerApplication $careerApplication)
    {
        //
    }
}
