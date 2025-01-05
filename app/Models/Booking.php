<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['user_id', 'mentorship_service_id', 'booking_date', 'booking_time', 'status', 'payment_status'];

    public function mentorshipService()
    {
        return $this->belongsTo(MentorshipService::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
