<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Hotel;
use App\Models\Review;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 

class ReviewController extends Controller
{
    private $hotel;
    private $reservation;

    public function __construct(Hotel $hotel, Reservation $reservation, Review $review, User $user)
    {
        $this->hotel = $hotel;
        $this->reservation = $reservation;
        $this->review = $review;
        $this->user = $user;
    }

    public function list()
    {
        
        $list_reviews = $this-> getReviewList();

        return view('customers.mypage.reviews.list')->with('list_reviews', $list_reviews);
    }

    private function getReviewList()
    {
        $currentUserId = Auth::id();

        // レビューを取得し、ログイン中のユーザーにフィルタリング
        $list_reviews = $this->review->with(['hotel.categories', 'reservation.rooms'])
            ->where('user_id', $currentUserId) // user_id でフィルタリング
            ->latest()
            ->get();
    
        return $list_reviews;

    }

    public function show($id)
    {
        $review = $this->review->findOrFail($id);

        return view('customers.mypage.reviews.view') ->with('review', $review);
    }

    public function create($id)
    {
        $reservation = $this->reservation->findOrFail($id);

        $hotel_id = $reservation->reservationRoom->map(function ($reservationRoom) {
            return $reservationRoom->room->hotel_id;
        })->unique()->implode(', '); // カンマ区切りで表示

        $hotel = $this->hotel->findOrFail($hotel_id);

        return view('customers.mypage.reviews.submittion')->with('reservation', $reservation)->with('hotel', $hotel);
    }

    public function store(Request $request)
    {
            $validated = $request->validate([
                'hotel_id' => 'required|exists:hotels,id',
                'reservation_id' => 'required|exists:reservations,id|unique:reviews,reservation_id',
                'rating' => 'required|integer|min:1|max:5',
                'comment' => 'nullable|string|max:1000',
                'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $review = new Review();
            $review->user_id = Auth::id();
            $review->hotel_id = $request->hotel_id; // 必要に応じてホテルIDを追加
            $review->reservation_id = $request->reservation_id; // 必要に応じてホテルIDを追加
            $review->rating = $validated['rating'];
            $review->comment = $validated['comment'];

            if ($request->hasFile('images')) {
                $images = $request->file('images');
                
                if (isset($images[0])) {
                    $review->image1 = 'data:image/' . $images[0]->getClientOriginalExtension() . ';base64,' . base64_encode(file_get_contents($images[0]));
                }
                if (isset($images[1])) {
                    $review->image2 = 'data:image/' . $images[1]->getClientOriginalExtension() . ';base64,' . base64_encode(file_get_contents($images[1]));
                }
                if (isset($images[2])) {
                    $review->image3 = 'data:image/' . $images[2]->getClientOriginalExtension() . ';base64,' . base64_encode(file_get_contents($images[2]));
                }
            }

            $review->save();


        return redirect()->route('customer.review.list')->with('success', 'Review submitted successfully!');
    }
    
}
