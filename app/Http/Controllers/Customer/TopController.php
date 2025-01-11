<?php

namespace App\Http\Controllers\Customer;
use App\Models\User;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\Reservation;
use App\Models\Category;
use App\Models\HotelCategory;
use App\Models\HasFactory;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class TopController extends Controller
{
    private $hotel;

    public function __construct(Hotel $hotel , Category $category , Room $room, Reservation $reservation)
    {
        $this->hotel = $hotel;
        $this->category = $category;
        $this->room = $room;
        $this->reservation = $reservation;
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
        $topCategory2 = $topCategory;

        
        // クエリの準備
        $query = Hotel::query();
       
                
        // キーワード検索条件の適用(topページからの検索)
        if (!empty($topCategory)) {
            $query->whereHas('categories', function ($query) use ($topCategory) {
                $query->where('name', 'LIKE', "%{$topCategory}%");
            });
        }
        $hotels = $query->with('categories')->get();

        // $filteredHotels = $query->get();

        // キーワード検索条件の適用(searchページの中での検索)
        if (!empty($location)) {
            // $topCategory = $request->input('topCategory');
            $hotels=$query->where('prefecture', 'LIKE', "%{$location}%")->whereHas('categories', function ($query) use ($topCategory2) {
                $query->where('name', 'LIKE', "%{$topCategory2}%");
            });
        }
        \Log::info('////////////////////////////////////////');
        \Log::info('Executed Query: ', [DB::getQueryLog()]);
        \Log::info('Location: ' . $location); \Log::info('Top Category: ' . $topCategory2);

        // 検索結果の取得


        // $hotels = Hotel::where('name', 'LIKE', "%{$topCategory}%")
        //        ->whereHas('categories', function ($query) use ($topCategory) {
        //        })
        //        ->get();
        
        // ビューのレンダリング
        return view('customers.hotel_search', ['hotels' => $hotels, 'topCategory' => $topCategory , 'topCategory2' => $topCategory2]);

    }
    
    public function show($id, Request $request)
    {
        // $reservation = $this->reservation;
        // ホテルを取得
        $hotels = Hotel::with(['categories', 'rooms.reservations'])->find($id);
    
        if (!$hotels) {
            abort(404, 'Hotel not found');
        }
    
        // 入力された日程を取得
        $date = $request->input('date');
    
        // ホテルに紐づく部屋を取得
        $rooms = $hotels->rooms;
    
        // 利用可能な部屋をフィルタリング
        $availableRooms = $rooms->filter(function ($room) use ($date) {
            foreach ($room->reservations as $reservation) {
                // 既存予約の日程を取得
                $checkInDate = $reservation->check_in_date;
                $checkOutDate = $reservation->check_out_date;
    
                // 入力した日程が既存予約の日程に該当する場合
                if (
                    ($date >= $checkInDate && $date < $checkOutDate) || // チェックイン日が既存予約期間内
                    ($date <= $checkInDate && $date >= $checkOutDate)   // 予約期間を完全に含む
                ) {
                    return false; // 利用不可の部屋は除外
                }
            }
    
            return true; // 利用可能な部屋
        });
    
        // ビューにデータを渡す
        return view('customers.hotel_detail', [
            'hotels' => $hotels,
            'availableRooms' => $availableRooms,
            // 'reservationid' => $reservation->id,
        ]);
    }
    
}
