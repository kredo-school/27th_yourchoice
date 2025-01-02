<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
  use HasFactory;
  public function user()
  {
    return $this->belongsTo(User::class);
  }

   public function hotelCategory()
  {
    return $this->hasMany(HotelCategory::class);
  }

  public function room()
  {
    return $this->hasMany(Room::class);
  }

  public function roomPriceRate()
  {
    return $this->hasMany(RoomPriceRate::class);
  }

 
}
