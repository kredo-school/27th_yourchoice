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
        //Shinjiさんとコメントアウト合意済み
        // return $this->belongsToMany(Hotel::class,'reservation_room','reservation_id','room_id','hotel_id');
        
        //Room モデルと Hotel モデルの関係性は「1つの部屋は1つのホテルに属する」という 1対1または1対多 の関係@miu
        return $this->belongsTo(Hotel::class,'hotel_id');

    }

    public function reservationRoom()
    {
        return $this->hasMany(ReservationRoom::class, 'room_id');
    }
}