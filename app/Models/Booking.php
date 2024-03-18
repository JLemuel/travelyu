<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'email',
        'phone',
        'check_in',
        'check_out',
        'package_id',
        'notes',
    ];

    // Define the relationship with Package model
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
