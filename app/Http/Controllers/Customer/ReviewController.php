<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Hotel;
use App\Models\Review;
use App\Models\User;
use App\Http\Controllers\Controller;

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
        $all_reviews = $this->review->with(['hotel.categories'])->latest()->get();
        $list_reviews =[];

        foreach($all_reviews as $review){
            if($review->user->id === 1) ;  //Auth::user()->id
            {
                $list_reviews[] = $review;
            }
        }

        return $list_reviews;

    }

    public function show($id)
    {
        $review = $this->review->findOrFail($id);

        return view('customers.mypage.reviews.view') ->with('review', $review);
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
