<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 
        'discount_percentage', 
        'discount_amount', 
        'discount_type', 
        'valid_from', 
        'valid_until', 
        'usage_limit', 
        'used_count'
    ];

    protected $casts = [
        'valid_from' => 'datetime',
        'valid_until' => 'datetime',
    ];
}
