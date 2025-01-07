<?php

namespace App\Http\Controllers\Customer;
use App\Models\User;
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
        // カテゴリー情報の取得
        $topCategory = $request->input('topCategory');
    
        // 検索キーワードの取得
        $location = $request->input('location');
        $date = $request->input('date');
        $travellers = $request->input('travellers');


        
        // クエリの準備
        $query = Hotel::query();
                
        // キーワード検索条件の適用(topページからの検索)
        if (!empty($topCategory)) {
            $query->whereHas('categories', function ($query) use ($topCategory) {
                $query->where('name', 'LIKE', "%{$topCategory}%");
            });
        }

        $filteredHotels = $query->get();

        // キーワード検索条件の適用(searchページの中での検索)
        if (!empty($location)) {
            $query->where('prefecture', 'LIKE', "%{$location}%");
        }

        if (!empty($location)) {
            $query->where('prefecture', 'LIKE', "%{$location}%");
        }

        // 検索結果の取得
        $hotels = $query->with('categories')->get();

        
        // ビューのレンダリング
        return view('customers.hotel_search', ['hotels' => $hotels, 'topCategory' => $topCategory]);

    }
    
    public function show($id)
    {

        $hotel = Hotel::with('categories')->find($id); // IDに基づいてホテルを取得

        return view('customers.hotel_detail', ['hotel' => $hotel]);

    }
    
}
