<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image'];

    protected $casts = [
        'image' => 'array',
    ];

    public function packages(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }
}
