<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelCategory extends Model
{
    use HasFactory;

    protected $table = 'hotel_category';
    protected $fillable = ['hotel_id','category_id'];
    public $timestamps = false;

    # HotelCategory - Category
    # to get the name of the category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
