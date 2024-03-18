<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'duration',
        'location',
        'image',
    ];

    // Define relationships
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
