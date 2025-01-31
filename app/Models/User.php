<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    // use HasFactory, Notifiable;
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin', // for admin users
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getIsAdminAttribute()
    {
        return $this->attributes['is_admin'] ?? false;
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function hasAccessToResource(Resource $resource)
    {
        if (!$resource->is_premium) {
            return true; // Free resources are accessible to all
        }

        // Check if the user has purchased the resource
        return $this->purchases()->where('resource_id', $resource->id)->exists();
    }

    public function hasAccessTo(Resource $resource)
    {
        // Check if the user has purchased this resource
        $hasPurchased = $this->purchases()->where('resource_id', $resource->id)->exists();

        // Check if the user has an active subscription
        $hasSubscription = $this->subscriptions()->where('status', 'active')->exists();

        return $hasPurchased || $hasSubscription;
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }


}
