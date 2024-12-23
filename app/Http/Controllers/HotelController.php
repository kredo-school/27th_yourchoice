<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function hotelSearch()
    {
        return view('customers.hotel_search');
    }
    public function hotelRegister()
    {
        return view('auth.hotel_register');
    }

    public function hotel_detail()
    {
        return view('customers.hotel_detail');
    }
    public function inquary()
    {
        return view('hotels.inquary.show');
    }
    
}
