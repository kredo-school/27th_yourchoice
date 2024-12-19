<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function register_top()
    {
        return view('auth.register_top');
    }
    public function customerRegister()
    {
        return view('auth.customer_register');
    }

    public function inquiry()
    {
        return view('customers.inquary.show');
    }

    public function register()
    {
        return view('auth.register');
    }

}
