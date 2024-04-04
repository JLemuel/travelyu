<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination_id',
        'name',
        'type',
        'description',
        'price',
        'duration',
        'image',
        'start_date',
        'end_date',
        'booking_limit',
        'max_persons',
        'addtional_adult_price',
        'addtional_youth_price',
        'addtional_children_price',
        'tour_plan_details',
    ];

    protected $casts = [
        'image' => 'array'
    ];


    // Define relationships
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class);
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
