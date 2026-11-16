<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ParkingArea extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'location',
        'image',
        'total_slots',
        'available_slots',
        'walking_minutes_from_filkom',
    ];

    public function subSections(): HasMany
    {
        return $this->hasMany(SubSection::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function getStatusAttribute(): string
    {
        return $this->available_slots > 0 ? 'Tersedia' : 'Penuh';
    }
}
