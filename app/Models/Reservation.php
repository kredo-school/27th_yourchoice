<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Support\Facades\Auth;

class Reservation extends Model
{
    use HasFactory;

    //更新可能な項目を設定する
    protected $fillable = [
        'user_id',
        'payment_id',
        'check_in_date' ,
        'check_out_date' ,
        'number_of_people',
        'breakfast', 
        'reservation_status',
        'checkin_status',
        'customer_request',
    ];


    // ユーザーとのリレーション(このモデルが他のモデルに属している Many-to-On)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //Reservation_roomとのリレーション(１対多)
    public function reservationRoom()
    {
        return $this->hasMany(ReservationRoom::class);
    }
   

}
