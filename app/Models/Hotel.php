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

  //Hotel_Categoryの関係
  public function hotelCategories()
  {
      return $this->hasMany(HotelCategory::class);
  }

  public function reviews()
  {
      return $this->hasMany(Review::class);
  }
  
}
