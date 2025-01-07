<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    protected $fillable = ['name', 'email', 'specialization', 'availability'];

    // Automatically cast availability JSON to an array
    protected $casts = [
        'availability' => 'array',
    ];

    /**
     * Relationship: A consultant has many mentorship services
     */
    public function mentorshipServices()
    {
        return $this->hasMany(MentorshipService::class);
    }

    /**
     * Get available slots for the consultant
     * 
     * This assumes the availability is stored as JSON in the following format:
     * [
     *     "2025-01-06 10:00:00",
     *     "2025-01-06 11:00:00",
     *     "2025-01-07 14:00:00"
     * ]
     */
    public function getAvailableSlots($dateRange = null)
    {
        if (is_null($this->availability)) {
            return [];
        }

        $slots = $this->availability;

        // Optionally filter slots within a date range
        if ($dateRange) {
            $start = $dateRange['start'];
            $end = $dateRange['end'];

            $slots = array_filter($slots, function ($slot) use ($start, $end) {
                $slotTime = strtotime($slot);
                return $slotTime >= strtotime($start) && $slotTime <= strtotime($end);
            });
        }

        return $slots;
    }

    /**
     * Remove a booked slot from availability
     * 
     * @param string $bookedSlot - The booked slot datetime
     * @return void
     */
    public function removeBookedSlot($bookedSlot)
    {
        if (($key = array_search($bookedSlot, $this->availability)) !== false) {
            unset($this->availability[$key]);
            $this->availability = array_values($this->availability); // Re-index the array
            $this->save();
        }
    }

    /**
     * Add a new slot to availability
     * 
     * @param string $newSlot - The new slot datetime
     * @return void
     */
    public function addNewSlot($newSlot)
    {
        if (!in_array($newSlot, $this->availability)) {
            $this->availability[] = $newSlot;
            $this->save();
        }
    }
}
