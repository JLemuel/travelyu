<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'destination_id', 'description', 'price', 'image'];

    protected $casts = [
        'image' => 'array',
    ];

    public function packages(): BelongsToMany
    {
        return $this->belongsToMany(Package::class);
    }
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
