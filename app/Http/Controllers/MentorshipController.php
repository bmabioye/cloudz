<?php

namespace App\Http\Controllers;

use App\Models\MentorshipService;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class MentorshipController extends Controller
{
    public function landing()
    {
        $services = MentorshipService::all(); // Fetch all mentorship services
        $testimonials = Testimonial::all(); // Fetch all testimonials

        return view('mentorship.landing', compact('services', 'testimonials'));
    }
}
