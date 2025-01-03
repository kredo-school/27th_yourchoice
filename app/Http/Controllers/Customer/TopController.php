<?php

namespace App\Http\Controllers\Customer;
use App\Models\Hotel;
use App\Models\Category;
use App\Models\HotelCategory;
use App\Models\HasFactory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class TopController extends Controller
{
    private $hotel;

    public function __construct(Hotel $hotel , Category $category)
    {
        $this->hotel = $hotel;
        $this->category = $category;
        // $this->hotelCategory = $hotelCategory;
    }

    public function list()
    {
        $hotels = $this->hotel->all(); 
        $categories = $this->category->all();
        return view('customers.toppage',['hotels' => $hotels ]);
    }
    public function search(Request $request)
    {
        $hotels = Hotel::with('categories')->get();
        //top/listからのカテゴリー情報
        $topCategory = $request->input('topCategory');

        return view('customers.hotel_search',['hotels' => $hotels, 'topCategory'=> $topCategory ]);
    }
    
    public function show()
    {
        return view('customers.hotel_detail');
    }
    
}
