<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote; // Assuming you have a Quote model


class QuoteController extends Controller
{
    public function store(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'specific_needs' => 'required|string|max:255',
            'consultation_date' => 'required|date',
            'contact_info' => 'required|email|max:255',
            'message' => 'required|string|max:255',
        ]);

        // Save quote request
        Quote::create($validatedData);

        // Redirect with success message
        return response()->json(['message' => 'Form submitted successfully'], 200);
        // return back()->with('success', 'Your quote request has been submitted successfully.');
    }
}
