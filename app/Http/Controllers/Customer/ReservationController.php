<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    public function reservationlist()
    {
        return view('customers.mypage.reservation_list');
    }

    public function show()
    {
        return view('customers.mypage.reservation-detail.inprogress');
    }

    public function show2()
    {
        return view('customers.mypage.reservation-detail.completed');
    }

}
