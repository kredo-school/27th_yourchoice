<?php

namespace App\Http\Controllers\Customer;
use App\Models\User;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\Review;
use App\Models\Reservation;
use App\Models\Category;
use App\Models\HotelCategory;
use App\Models\HasFactory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class TopController extends Controller
{
    private $hotel;

    public function __construct(Hotel $hotel , Category $category , Room $room, Reservation $reservation,Review $review)
    {
        $this->room = $room;
        $this->hotel = $hotel;
        $this->review = $review;
        $this->category = $category;
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
        // クエリの準備
        $query = Hotel::query();
        // カテゴリー情報の取得
        $topCategory = $request->input('topCategory');
        // 検索キーワードの取得
        $location = $request->input('location');
        // $date = $request->input('date');
        $travellers = $request->input('travellers');
        //検索されたpriceの最小値
        // $minPrice = $this->hotel->rooms()
        // ->when(!is_null($travellers), function ($query) use ($travellers) {
        //     $query->where('capacity', $travellers);
        // })
        // ->min('price');




        // セッションで `topCategory` を保持
        if (!empty($topCategory)) {
            session(['topCategory' => $topCategory]);
        } else {
            $topCategory = session('topCategory'); // セッションから取得
        }

        // キーワード検索条件の適用(topページからの検索)
        if (!empty($topCategory)) {
            $query->whereHas('categories', function ($query) use ($topCategory) {
                $query->where('name', 'LIKE', "%{$topCategory}%");
            });
        }

        // キーワード検索条件の適用(searchページの中での検索)
        if (!empty($location)) {
            $query->where('prefecture', 'LIKE', "%{$location}%")->whereHas('categories', function ($query) use ($topCategory) {
                $query->where('name', 'LIKE', "%{$topCategory}%");
            });
        }
        //部屋のキャパシティ
        if (!empty($travellers)) {
            $query->whereHas('rooms', function ($query) use ($travellers) {
                $query->where('capacity', '>=', $travellers);
            });
        }

        $hotels = $query->with('categories','rooms')->get();

        // \Log::info('////////////////////////////////////////');
        // \Log::info('Executed Query: ', [DB::getQueryLog()]);
        // \Log::info('Location: ' . $location); \Log::info('Top Category: ' . $topCategory);

        // Show Review information
        $hotels = $hotels->map(function ($hotel) {
            $hotel->averageRating = ceil(
                $this->review
                    ->where('hotel_id', $hotel->id)
                    ->avg('rating') ?? 0
            );
            return $hotel;
        });

        $hotels = $hotels->map(function ($hotel) {
            $hotel->reviews = $this->review
                ->where('hotel_id', $hotel->id)
                ->get();
            return $hotel;
        });


        
        return view('customers.hotel_search', [
            'hotels' => $hotels, 
            // 'reviews' => $reviews,
            // 'averageRating' => $averageRating,
            // 'minPrice' => $minPrice, 
            'travellers' => $travellers,
            'topCategory' => $topCategory,
        ]);
    }
    
    public function show($id, Request $request)
    {
        // $reservation = $this->reservation;
        // ホテルを取得
        $hotels = Hotel::with(['categories', 'rooms.reservations'])->find($id);

        $address = $hotels->address;
        // ホテルに紐づく部屋を取得
        $rooms = $hotels->rooms;
    
        if (!$hotels) {
            abort(404, 'Hotel not found');
        }
    
        // 入力された日程を取得
        $date = $request->input('date');
    

    
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

        // Show Reviews
        $hotel_reviews = $this->review->where('hotel_id', $id)
        ->latest()
        ->get();

    
        // ビューにデータを渡す
        return view('customers.hotel_detail', [
            'hotels' => $hotels,
            'availableRooms' => $availableRooms,
            'address' => $address,
            'hotel_reviews' => $hotel_reviews
        ]);
    }
    
}
