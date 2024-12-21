<?php

namespace App\Http\Controllers\Hotel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    public function list()
    {
        return view('hotels.reviews.list');
    }

    public function show()
    {
        return view('hotels.reviews.show');
    }
    
}
