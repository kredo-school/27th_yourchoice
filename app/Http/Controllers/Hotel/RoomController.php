<?php

namespace App\Http\Controllers\Hotel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function show()
    {
        return view('hotels.rooms.show');
    }

    public function create()
    {
        return view('hotels.rooms.create');
    }

    public function edit()
    {
        return view('hotels.rooms.edit');
    }
}
