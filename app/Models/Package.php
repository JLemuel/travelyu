<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'travel_agency_id', 'name', 'type', 'description', 'price',
        'duration', 'image', 'start_date', 'end_date', 'booking_limit',
        'max_persons', 'additional_adult_price', 'additional_youth_price',
        'additional_children_price', 'tour_plan_details',
    ];

    protected $casts = [
        'image' => 'array',
    ];

    public function destinations(): BelongsToMany
    {
        return $this->belongsToMany(Destination::class, 'package_destination');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function activities(): BelongsToMany
    {
        return $this->belongsToMany(Activity::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
