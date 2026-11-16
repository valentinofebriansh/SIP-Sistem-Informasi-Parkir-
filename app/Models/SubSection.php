<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubSection extends Model
{
    protected $fillable = [
        'parking_area_id',
        'name',
        'slug',
        'total_slots',
        'available_slots',
    ];

    public function parkingArea(): BelongsTo
    {
        return $this->belongsTo(ParkingArea::class);
    }

    public function slots(): HasMany
    {
        return $this->hasMany(ParkingSlot::class, 'sub_section_id');
    }

    public function getStatusAttribute(): string
    {
        return $this->available_slots > 0 ? 'Tersedia' : 'Penuh';
    }
}
