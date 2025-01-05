<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MentorshipService extends Model
{
    protected $fillable = ['service_name', 'consultant_id', 'mentorship_type_id', 'topic_id', 'price', 'duration'];

    public function consultant()
    {
        return $this->belongsTo(Consultant::class);
    }

    public function mentorshipType()
    {
        return $this->belongsTo(MentorshipType::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
