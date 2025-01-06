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

        public function fetchAvailableSlots($start, $end)
        {
            // Fetch slots for the specified date range
            $slots = Consultant::with('bookings')
                ->whereHas('availability', function ($query) use ($start, $end) {
                    $query->whereBetween('date', [$start, $end]);
                })
                ->get();

            return response()->json($slots);
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
            'slot_start' => 'required|date',
            'slot_end' => 'required|date|after:slot_start',
            'mentorship_type' => 'required|string',
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
            'user_id' => $validated['user_id'],
            'mentorship_service_id' => $validated['mentorship_service_id'],
            'booking_date' => $validated['booking_date'],
            'booking_time' => $validated['booking_time'],
            'status' => 'Pending',
            'payment_status' => 'Unpaid',
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

    public function create($id)
{
    $service = MentorshipService::findOrFail($id);

    return view('mentorship.book', compact('service'));
}
}
