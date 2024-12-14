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

    public function reservation_list()
    {
        return view('customers.mypage.reservation_list');
    }

    public function reservation_detail_inprogress()
    {
        return view('customers.mypage.reservation-detail.inprogress');
    }

    public function reservation_detail_completed()
    {
        return view('customers.mypage.reservation-detail.completed');
    }
}
