<?php

namespace App\Http\Controllers;

use App\Models\MentorshipService;
use App\Models\Booking;
use App\Models\Consultant;
use App\Models\Topic;
use App\Models\MentorshipType;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Show mentorship services.
     */
    public function index(Request $request)
    {
        $mentorshipServices = MentorshipService::query();

        // Filter by mentorship type
        if ($request->has('type_id')) {
            $mentorshipServices->where('mentorship_type_id', $request->type_id);
        }

        // Filter by topic
        if ($request->has('topic_id')) {
            $mentorshipServices->where('topic_id', $request->topic_id);
        }

        // Filter by consultant specialization
        if ($request->has('specialization')) {
            $mentorshipServices->whereHas('consultant', function ($query) use ($request) {
                $query->where('specialization', $request->specialization);
            });
        }

        return response()->json([
            'mentorship_services' => $mentorshipServices->with('consultant', 'mentorshipType', 'topic')->get(),
        ]);
    }

    /**
     * Show available slots for a mentorship service.
     */
    public function showAvailability($serviceId)
    {
        $service = MentorshipService::findOrFail($serviceId);
        $availability = $service->consultant->availability;

        return response()->json([
            'service' => $service,
            'availability' => $availability, // Example format: ["2025-01-10 14:00:00", "2025-01-11 10:00:00"]
        ]);
    }

    /**
     * Create a new booking.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mentorship_service_id' => 'required|exists:mentorship_services,id',
            'booking_date' => 'required|date',
            'booking_time' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);

        // Check availability
        $service = MentorshipService::findOrFail($request->mentorship_service_id);
        $availability = $service->consultant->availability;

        $selectedSlot = $request->booking_date . ' ' . $request->booking_time;

        if (!in_array($selectedSlot, $availability)) {
            return response()->json(['error' => 'Selected slot is not available'], 422);
        }

        // Create booking
        $booking = Booking::create([
            'user_id' => $request->user_id,
            'mentorship_service_id' => $request->mentorship_service_id,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'status' => 'Pending',
        ]);

        \Log::info($request->all());
        return response()->json(['message' => 'Booking created successfully', 'booking' => $booking]);
    }

    /**
     * Update booking status.
     */
    public function updateStatus(Request $request, $bookingId)
    {
        $request->validate([
            'status' => 'required|in:Pending,Confirmed,Cancelled',
        ]);

        $booking = Booking::findOrFail($bookingId);
        $booking->update(['status' => $request->status]);

        return response()->json(['message' => 'Booking status updated successfully', 'booking' => $booking]);
    }
}
