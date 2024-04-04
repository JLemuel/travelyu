<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        // Include all other fillable attributes here
        'user_id', 'customer_name', 'email', 'phone', 'check_in', 'check_out', 'package_id', 'notes', 'total_price', 'receipt',
        'adults_count', 'youth_count', 'children_count', 'additional_adults_count',
        'additional_youth_count', 'additional_children_count',
    ];

    protected $casts = [
        'check_in' => 'datetime',
        'check_out' => 'datetime',
        // Add other attributes as needed
    ];
    

    // Define the relationship with Package model
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
