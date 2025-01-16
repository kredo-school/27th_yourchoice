<?php

namespace App\Http\Controllers\Hotel;

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

        return view('hotels.reviews.list')->with('list_reviews', $list_reviews);
    }

    private function getReviewList()
    {
        $currentUserId = Auth::user()->hotel->id;

        // レビューを取得し、ログイン中のユーザーにフィルタリング
        $list_reviews = $this->review->with(['hotel.categories', 'reservation.rooms'])
            ->where('hotel_id', $currentUserId) // user_id でフィルタリング
            ->latest()
            ->get();
    
        return $list_reviews;

    }

    public function show($id)
    {
        $review = $this->review->findOrFail($id);

        return view('hotels.reviews.show') ->with('review', $review);
    }

    public function hide($id)
{
    // レビューを取得
    $review = Review::findOrFail($id);

    // ステータスを "hidden" に設定
    $review->status = 'hidden';
    $review->save();

    // リダイレクト
    return redirect()->back()->with('success', 'Review status updated to hidden.');
}

public function visible($id)
{
    // レビューを取得
    $review = Review::findOrFail($id);

    // ステータスを "hidden" に設定
    $review->status = 'hidden';
    $review->save();

    // リダイレクト
    return redirect()->back()->with('success', 'Review status updated to hidden.');
}

    
}
