<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    public function list()
    {
        return view('customers.mypage.reviews.list');
    }

    public function show()
    {
        return view('customers.mypage.reviews.view');
    }

    public function create()
    {
        return view('customers.mypage.reviews.submittion');
    }

    public function store()
    {
        return redirect()->route('customer.review.list');
    }
    
}
