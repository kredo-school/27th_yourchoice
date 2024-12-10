<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MypageController extends Controller
{
    public function reviewlist()
    {
        return view('customers.mypage.reviews.list');
    }
    public function reviewlist2()
    {
        return view('customers.mypage.reviews.list2');
    }
    public function show()
    {
        return view('customers.mypage.reviews.view');
    }
    public function create()
    {
        return view('customers.mypage.reviews.submittion');
    }
}
