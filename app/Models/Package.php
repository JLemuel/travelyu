<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Package extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'travel_agency_id', 'name', 'type', 'description', 'price',
        'duration', 'image', 'start_date', 'end_date', 'booking_limit',
        'max_persons', 'addtional_adult_price', 'addtional_youth_price',
        'addtional_children_price', 'tour_plan_details', 'gcash_number', 'bank_account_number'
    ];

    protected $casts = [
        'image' => 'array',
    ];


    public function destinations(): BelongsToMany
    {
        return $this->belongsToMany(Destination::class, 'package_destination', 'package_id', 'destination_id');
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

    public function travelAgency()
    {
        return $this->belongsTo(User::class, 'travel_agency_id');
    }


    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            // Add more searchable attributes as needed
        ];
    }
}
