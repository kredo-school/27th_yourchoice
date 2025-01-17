<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReserveController extends Controller
{
    public function edit(Request $request)
    {
        $travellers = $request->input('travellers');
        $checkInDate = $request->input('checkInDate');
        $checkInDate = $request->input('checkOutDate');
        $hotel_id = $request->input('hotel_id');
        $room_id = $request->input('room_id');
        // dd($travellers,$checkInDate,$checkInDate,$hotel_id,$room_id);


        return view('customers.reservations.reservation');
    }

    public function show()
    {
        return view('customers.reservations.reservation_detail');
    }

    public function confirmation()
    {
        return view('customers.reservations.reserved_confirmation');
    }
    
}
