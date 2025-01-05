<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MentorshipType extends Model
{
    protected $fillable = ['type', 'description'];

    public function mentorshipServices()
    {
        return $this->hasMany(MentorshipService::class);
    }
}
