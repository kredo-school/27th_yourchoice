<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class TopController extends Controller
{
    public function list()
    {
        return view('customers.toppage');
    }
    public function search()
    {
        return view('customers.hotel_search');
    }
    
    public function show()
    {
        return view('customers.hotel_detail');
    }
    
}
