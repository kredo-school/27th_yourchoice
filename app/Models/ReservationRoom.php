<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationRoom extends Model
{
    use HasFactory;
    protected $table = 'reservation_room';  // 正しいテーブル名を指定

    // 部屋とのリレーション
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    // 予約とのリレーション
    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
    
}
