<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function show()
    {
        return view('customers.mypage.profile.show');
    }

    public function edit()
    {
        return view('customers.mypage.profile.edit');
    }

    public function editpass()
    {
        return view('customers.mypage.profile.editpass');
    }
    
}
