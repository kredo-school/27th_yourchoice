<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
  use HasFactory;
  /**
   * ホテルモデルのfillableプロパティ
   * ホテルの属性で一括代入可能なフィールドを指定
   */
  protected $fillable = [
    'user_id',
    'hotel_name',
    'url',
    'postal_code',
    'prefecture',
    'city',
    'address',
    'access',
    'description',
    'image_main',
    'image_sub1',
    'image_sub2',
    'image_sub3',
    'image_sub4',
    'cancellation_period',
    'general_fee',
    'sameday_fee',
    'breakfast_price',
  
  ];


  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function categories()
  {
    return $this->belongsToMany(Category::class, 'hotel_category', 'hotel_id', 'category_id');
  }


  public function reviews()
  {
    return $this->hasMany(Review::class);
  }

  public function rooms()
  {
    return $this->hasMany(Room::class);
  }
}
