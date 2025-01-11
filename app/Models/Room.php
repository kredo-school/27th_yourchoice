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
        return $this->belongsToMany(Hotel::class,'reservation_room','reservation_id','room_id');
    }

    public function reservationRoom()
    {
        return $this->hasMany(ReservationRoom::class, 'room_id');
    }

    public function reservations()
    {
        return $this->belongsToMany(Reservation::class, 'reservation_room','room_id','reservation_id');
    }
}