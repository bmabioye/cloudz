<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MentorshipType extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'description'];

    public function topics()
    {
        return $this->belongsToMany(Topic::class, 'mentorship_type_topic');
    }
}
