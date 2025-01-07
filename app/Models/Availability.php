<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    //protected $table = 'availability'; // Specify the actual table name
    protected $fillable = ['date', 'start_time', 'end_time', 'consultant_id', 'is_booked'];

    public function isAvailable()
    {
        return !$this->is_booked; // Assuming `is_booked` tracks whether the slot is booked
    }


    public function consultant()
    {
        return $this->belongsTo(Consultant::class, 'consultant_id');
    }
}