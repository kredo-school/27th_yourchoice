<?php

namespace App\Http\Controllers\Hotel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PriceController extends Controller
{
    public function show()
    {
        return view('hotels.price.show');
    }

    public function edit()
    {
        return view('hotels.price.edit');
    }

    public function update()
    {
        return redirect()->route('hotel.price.show');
    }
    
}
