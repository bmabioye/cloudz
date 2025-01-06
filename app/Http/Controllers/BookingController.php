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
    public function showAvailability($serviceId, $date)
    {
        $service = MentorshipService::findOrFail($serviceId);
        $availability = json_decode($service->consultant->availability, true);
    
        $slots = collect($availability)
            ->where('date', $date)
            ->pluck('slots')
            ->flatten()
            ->toArray();
    
        return response()->json(['slots' => $slots]);
    }
    

/**
 * Create a new booking.
 */
public function store(Request $request)
{
    // Validate request data
    $validated = $request->validate([
        'slot_start' => 'required|date',
        'slot_end' => 'required|date|after:slot_start',
        'mentorship_service_id' => 'required|integer|exists:mentorship_services,id',
        'user_id' => 'required|integer|exists:users,id',
        'booking_date' => 'required|date',
        'booking_time' => 'required|string',
    ]);

    // Find the mentorship service and get the consultant's availability
    $service = MentorshipService::findOrFail($validated['mentorship_service_id']);
    $availability = json_decode($service->consultant->availability, true);

    // Check if the selected slot is available
    $selectedSlot = [
        'date' => $validated['booking_date'],
        'time' => $validated['booking_time']
    ];

    $isSlotAvailable = false;

    foreach ($availability as &$day) {
        if ($day['date'] === $selectedSlot['date'] && in_array($selectedSlot['time'], $day['slots'])) {
            $isSlotAvailable = true;

            // Remove the booked slot from the availability
            $day['slots'] = array_filter($day['slots'], function ($slot) use ($selectedSlot) {
                return $slot !== $selectedSlot['time'];
            });

            break;
        }
    }

    if (!$isSlotAvailable) {
        return response()->json(['error' => 'Selected slot is not available'], 422);
    }

    // Update the consultant's availability
    $service->consultant->update(['availability' => json_encode($availability)]);

    // Create the booking
    $booking = Booking::create([
        'user_id' => $validated['user_id'],
        'mentorship_service_id' => $validated['mentorship_service_id'],
        'booking_date' => $validated['booking_date'],
        'booking_time' => $validated['booking_time'],
        'status' => 'Pending',
        'payment_status' => 'Unpaid',
    ]);

    // Log the request for debugging purposes
    \Log::info('Booking request', $request->all());

    return response()->json([
        'message' => 'Booking created successfully',
        'booking' => $booking,
    ]);
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

public function getSlots(Request $request)
{
    $start = $request->start;
    $end = $request->end;

    $consultants = Consultant::with('availability')->get();

    $events = [];

    foreach ($consultants as $consultant) {
        $availability = json_decode($consultant->availability, true);

        foreach ($availability as $slot) {
            if ($slot['date'] >= $start && $slot['date'] <= $end) {
                $events[] = [
                    'title' => $consultant->name,
                    'start' => $slot['start_time'],
                    'end' => $slot['end_time'],
                    'extendedProps' => [
                        'consultant_id' => $consultant->id,
                    ],
                ];
            }
        }
    }

    return response()->json($events);
}


}

