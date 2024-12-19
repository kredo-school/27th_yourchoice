<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReserveController extends Controller
{
    public function edit()
    {
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
