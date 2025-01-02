<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_number',
        'hotel_id',
        'room_type',
        'price',
        'capacity',
        'image',
        'remarks',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}