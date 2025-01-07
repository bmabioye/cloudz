<?php

namespace App\Http\Controllers;

use App\Models\MentorshipService;
use App\Models\Booking;
use App\Models\Consultant;
use App\Models\Topic;
use App\Models\Availability;
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
        $availability = json_decode($service->consultant->getAvailableSlots, true);
    
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
        'user_id' => 'required|exists:users,id',
        'mentorship_service_id' => 'required|exists:mentorship_services,id',
        'consultant_id' => 'required|exists:consultants,id',
        'slot_start' => 'required|date',
        'slot_end' => 'required|date|after:slot_start',
    ]);




    // Update the consultant's availability

    $availability = Availability::where('consultant_id', $validated['consultant_id'])
    ->where('date', explode('T', $validated['slot_start'])[0])
    ->where('start_time', explode('T', $validated['slot_start'])[1])
    ->first();


    if (!$availability || $availability->is_booked) {
        return response()->json(['error' => 'Slot is no longer available'], 422);
    }

    $availability->is_booked = true;
    $availability->save();



    // Create the booking
        $booking = Booking::create([
            'user_id' => $validated['user_id'],
            'mentorship_service_id' => $validated['mentorship_service_id'],
            'consultant_id' => $validated['consultant_id'],
            'booking_date' => explode('T', $validated['slot_start'])[0],
            'booking_time' => explode('T', $validated['slot_start'])[1],
            'status' => 'Pending',
            'payment_status' => 'Unpaid',
        ]);

    // Log the request for debugging purposes
    \Log::info('Booking request', $request->all());

    return response()->json([
        'message' => 'Your Booking was successfully',
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

public function getAvailability(Request $request)
{
    $startDate = $request->query('start');
    $endDate = $request->query('end');

    $availability = Availability::whereBetween('date', [$startDate, $endDate])
        ->with('consultant')
        ->get()
        ->map(function ($slot) {
            return [
                'id' => $slot->id,
                'date' => $slot->date,
                'available' => $slot->isAvailable(), // Assuming this method calculates availability
            ];
        });

    return response()->json($availability);
}

public function getAvailabilityByDate(Request $request)
{
    $date = $request->query('date');
    $availability = Availability::where('date', $date)
        ->where('is_booked', false)
        ->get()
        ->map(function ($slot) {
            return [
                'id' => $slot->id,
                'date' => $slot->date,
                'available' => $slot->isAvailable(), // Assuming this method calculates availability
            ];
        });


    return response()->json($availability);
}


}

