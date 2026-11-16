<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = [
        'parking_area_id',
        'user_id',
        'author_name',
        'body',
    ];

    public function parkingArea(): BelongsTo
    {
        return $this->belongsTo(ParkingArea::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
