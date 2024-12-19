<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function top()
    {
        return view('auth.register_top');
    }

    public function create_customer()
    {
        return view('auth.customer_register');
    }

    public function create_hotel()
    {
        return view('auth.hotel_register');
    }
    
}
