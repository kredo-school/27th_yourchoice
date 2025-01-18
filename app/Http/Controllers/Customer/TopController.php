<?php

namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Room;
use App\Models\Hotel;
use App\Models\Review;
use App\Models\Category;
use App\Models\HasFactory;
use App\Models\Reservation;
use App\Models\HotelCategory;
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

    public function displayHotels(Request $request){
        if (!empty($topCategory)) {
            session(['topCategory' => $topCategory]);
        } else {
            $topCategory = session('topCategory');
        }

        $query = Hotel::query();
        $topCategory = $request->input('topCategory');

        if (!empty($topCategory)) {
            $query->whereHas('categories', function ($query) use ($topCategory) {
                $query->where('name', 'LIKE', "%{$topCategory}%");
            });
        }

        $hotels = $query->with('categories','rooms')->get();

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

        return view('customers.hotel_search', compact('hotels','topCategory'));

    }


    public function search(Request $request)
    {
        $query = Hotel::query();

        $topCategory = $request->input('topCategory');
        $location = $request->input('location');
        $travellers = $request->input('travellers');
        $checkInDate = $request->input('checkInDate');
        $checkOutDate = $request->input('checkOutDate');

        //検索されたpriceの最小値
        // $minPrice = $this->hotel->rooms()
        // ->when(!is_null($travellers), function ($query) use ($travellers) {
        //     $query->where('capacity', $travellers);
        // })
        // ->min('price');

        if (!empty($location)) {
            $query->where('prefecture', 'LIKE', "%{$location}%");
        }

        $availableHotelIds = Room::whereDoesntHave('reservations', function ($query) use ($checkInDate, $checkOutDate) {
            $query->where(function ($query) use ($checkInDate, $checkOutDate) {
                $query->whereBetween('check_in_date', [$checkInDate, $checkOutDate])
                    ->orWhereBetween('check_out_date', [$checkInDate, $checkOutDate])
                    ->orWhere(function ($query) use ($checkInDate, $checkOutDate) {
                        $query->where('check_in_date', '<=', $checkInDate)
                            ->where('check_out_date', '>=', $checkOutDate);
                    });
            });
        })->pluck('hotel_id');

        $query->whereIn('id', $availableHotelIds);
   
        // キーワード検索条件の適用(topページからの検索)
        if (!empty($topCategory)) {
            $query->whereHas('categories', function ($query) use ($topCategory) {
                $query->where('name', 'LIKE', "%{$topCategory}%");
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

        $hotels = $hotels->map(function ($hotel) use ($travellers) {
            // Room テーブルの price の最小値を取得
            $hotel->minPrice = $hotel->rooms()
                ->when(!is_null($travellers), function ($query) use ($travellers) {
                    $query->where('capacity', '>=', $travellers);
                })
                ->min('price'); // price カラムの最小値を取得
    
            return $hotel;
        });


        
        return view('customers.hotel_search', [
            'topCategory' => $topCategory,
            'hotels' => $hotels, 
            'location' => $location,
            'checkInDate' => $checkInDate,
            'checkOutDate' => $checkOutDate,
            'travellers' => $travellers,
        ]);
    }
    
    public function show($id, Request $request)
    {
        $hotels = Hotel::with(['categories', 'rooms.reservations'])->find($id);
        $id = $hotels->id;
        $address = $hotels->address;
        $hotel_reviews = $this->review
            ->where('hotel_id', $id)
            ->whereNull('status') 
            ->latest()
            ->get();
        $checkInDate = $request->input('checkInDate');
        $checkOutDate = $request->input('checkOutDate');
        $travellers = $request->input('travellers');
        // dd($checkInDate,$checkOutDate,$travellers);
    
        if (!$hotels) {
            abort(404, 'Hotel not found');
        }

        $availableRooms = $hotels->rooms->filter(function ($room) use ($checkInDate, $checkOutDate) {
            foreach ($room->reservations as $reservation) {
                if (($checkInDate >= $reservation->check_in_date && $checkInDate < $reservation->check_out_date) ||
                    ($checkOutDate > $reservation->check_in_date && $checkOutDate <= $reservation->check_out_date) ||
                    ($checkInDate <= $reservation->check_in_date && $checkOutDate >= $reservation->check_out_date)) {
                    return false;
                }
            }
            return true;
        });
    
        // ビューにデータを渡す
        return view('customers.hotel_detail', [
            'id' => $id,
            'hotels' => $hotels,
            'address' => $address,
            'travellers' => $travellers,
            'checkInDate' => $checkInDate,
            'checkOutDate' => $checkOutDate,
            'hotel_reviews' => $hotel_reviews,
            'availableRooms' => $availableRooms,
        ]);
    }
    
}
