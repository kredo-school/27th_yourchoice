<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'payment_id', 'check_in_date', 'check_out_date', 
        'number_of_people', 'breakfast', 'reservation_status', 
        'checkin_status', 'customer_request'
    ];

    // 中間テーブルへのリレーション
    public function reservationRoom()
    {
        return $this->hasMany(ReservationRoom::class, 'reservation_id');
    }

    // 中間テーブルを経由して部屋を取得
    public function room()
    {
        return $this->reservationRooms->map(function ($reservationRoom) {
            return $reservationRoom->room;
        });
    }

    //ユーザーとのリレーション
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function guest()
    {
        return $this->belongsTo(Guest::class, 'guest_id');
    }

    //paymentとのリレーション
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }
    
    public function review()
    {
        return $this->belongsTo(Review::class);
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class,'reservation_room','reservation_id','room_id');
    }
  
}
