<?php

namespace App\Http\Controllers;

use App\Models\MentorshipService;
use App\Models\MentorshipType;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class MentorshipController extends Controller
{
    public function landing()
    {
        $services = MentorshipType::all(); // Fetch all mentorship services
        $testimonials = Testimonial::all(); // Fetch all testimonials

        return view('mentorship.landing', compact('services', 'testimonials'));
    }

    public function showBookingForm()
    {
        // Fetch necessary data (services, types, topics, etc.)
        $services = \App\Models\MentorshipService::all();
        $types = \App\Models\MentorshipType::all();
        $topics = \App\Models\Topic::all();

        return view('mentorship.mentorship_booking', compact('services', 'types', 'topics'));
    }

    public function storeBooking(Request $request)
    {
        $validated = $request->validate([
            'mentorship_service_id' => 'required|exists:mentorship_services,id',
            'mentorship_type_id' => 'required|exists:mentorship_types,id',
            'topic_id' => 'required|exists:topics,id',
            'slot_start' => 'required|date',
            'slot_end' => 'required|date|after:slot_start',
        ]);

        // Create booking logic here...
        // Redirect back or return JSON response
        return redirect()->back()->with('success', 'Booking created successfully!');
    }
}
