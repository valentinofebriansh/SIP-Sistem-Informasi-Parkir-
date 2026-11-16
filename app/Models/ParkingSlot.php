<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ParkingSlot extends Model
{
    protected $fillable = [
        'sub_section_id',
        'code',
        'row_label',
        'row_number',
        'is_occupied',
    ];

    protected function casts(): array
    {
        return [
            'is_occupied' => 'boolean',
        ];
    }

    public function subSection(): BelongsTo
    {
        return $this->belongsTo(SubSection::class);
    }
}
