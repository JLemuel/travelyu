<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // Fields that are mass assignable
    protected $fillable = [
        'package_id',
        'user_id',
        'content',
        'rating',
    ];

    /**
     * Get the package that the review belongs to.
     */
    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    /**
     * Get the user that authored the review.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
