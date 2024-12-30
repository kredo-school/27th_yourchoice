<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationRoom extends Model
{
    use HasFactory;
    
    protected $table = 'reservation_room';

    protected $fillable = ['reservation_id', 'room_id', 'number_of_people', 'price'];

    // 予約へのリレーション
    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }

    // 部屋へのリレーション
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
    
}
