<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    protected $fillable = ['name', 'email', 'specialization', 'availability'];
    protected $casts = ['availability' => 'array'];

    public function mentorshipServices()
    {
        return $this->hasMany(MentorshipService::class);
    }
}
