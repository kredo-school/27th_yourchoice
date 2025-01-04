<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class,'hotel_category','hotel_id','category_id');
    }
}
