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

  public function categories()
  {
      return $this->belongsToMany(Category::class,'hotel_category','hotel_id','category_id');
  }

}