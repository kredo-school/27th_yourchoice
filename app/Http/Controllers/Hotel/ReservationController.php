<?php

namespace App\Http\Controllers\Hotel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    public function show_daily()
    {
        return view('hotels.reservations.show_daily');
    }

    public function edit()
    {
        return view('hotels.reservations.edit');
    }

    public function show_monthly()
    {
        return view('hotels.reservations.show_monthly');
    }
    
}
