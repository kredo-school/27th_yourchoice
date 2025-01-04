<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    // 予約ルームとのリレーション(一対多)
    public function reservationRoom()
    {
        return $this->hasMany(ReservationRoom::class);
    }
}
