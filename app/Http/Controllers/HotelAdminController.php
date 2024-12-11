<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HotelAdminController extends Controller
{
    //
    public function profileshow()
    {
        return view('hotels.profile.show');
    }

    public function profileedit()
    {
        return view('hotels.profile.edit');
    }


   
}
