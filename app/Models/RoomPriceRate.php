<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomPriceRate extends Model
{
    use HasFactory;


    // ホテルとのリレーションを定義（必要に応じて）
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
