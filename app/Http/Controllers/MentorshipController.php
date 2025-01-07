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

      /**
     * Get all mentorship services.
     */
    public function getMentorshipServices()
    {
        try {
            $services = MentorshipService::all();
    
            return response()->json([
                'success' => true,
                'data' => $services,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get all mentorship types.
     */
    // public function getTypes(): JsonResponse
    // {
    //     $types = MentorshipType::all();
    //     return response()->json($types, 200);
    // }


    public function getMentorshipTypes()
    {
        try {
            $types = MentorshipType::all();
    
            return response()->json([
                'success' => true,
                'data' => $types,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }


}
