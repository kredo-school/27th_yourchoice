<?php

namespace App\Http\Controllers\Hotel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InquaryController extends Controller
{
    public function show()
    {
        return view('hotels.inquary.show');
    }
    
}
