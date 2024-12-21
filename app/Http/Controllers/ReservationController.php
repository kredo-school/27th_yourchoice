<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function reservations()
    {
        return view('customers.reservations.reservation');
    }

    public function reserved_confirmation()
    {
        return view('customers.reservations.confirmation'); // ビューを返す例
    } 
    
    public function reserved_detail()
    {
        return view('customers.reservations.detail'); // ビューを返す例
    } 

    
    public function edit()
{
    return view('customers.reservations.detail');
}

public function show()
{
    return view('customers.reservations.confirmation');
}

public function reservationlist()
{
    return view('customers.mypage.reservation_list');
}



    
}


