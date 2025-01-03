<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_date',
        'amount',
        'payment_method',
        'status',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'payment_id');
    }
}
