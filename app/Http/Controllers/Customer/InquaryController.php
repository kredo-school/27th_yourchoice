<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InquaryController extends Controller
{
    public function show()
    {
        return view('customers.inquary.show');
    }
    
}
