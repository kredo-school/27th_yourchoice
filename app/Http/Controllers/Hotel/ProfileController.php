<?php

namespace App\Http\Controllers\Hotel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function show()
    {
        return view('hotels.profile.show');
    }

    public function edit()
    {
        return view('hotels.profile.edit');
    }

    public function editpass()
    {
        return view('hotels.profile.password');
    }
    
}
