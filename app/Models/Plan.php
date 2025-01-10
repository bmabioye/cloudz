<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = 'active';
    const STATUS_DISABLED = 'disabled';

    protected $fillable = ['name', 'description', 'price', 'duration_months', 'features', 'coupon_id', 'status'];

    public function scopeActive($query)
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }
    
    // Accessor to decode the JSON stored in the `features` field
    public function getFeaturesAttribute($value)
    {
        return $value ? json_decode($value, true) : [];
    }

    // Mutator to encode the array into JSON before saving to the database
    public function setFeaturesAttribute($value)
    {
        $this->attributes['features'] = json_encode($value);
    }
}
