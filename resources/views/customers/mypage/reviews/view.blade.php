@extends('layouts.customer_mypage')

<link rel="stylesheet" href="{{ asset('css/review.css') }}">

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="card p-5">
                    <div class="review-card">
                    <div class="review-header">
                        <div class="hotel-image">
                            <img src="{{ asset('images/hotel.jpg') }}" alt="hotel-img" class="hotel-img">
                        </div>
                        <div class="hotel-info">
                            <h4>{{ $review->hotel->hotel_name }}</h4>
                            <p>{{ $review->hotel->prefecture }}</p>
                                @foreach($review->hotel->categories as $hotelcategory)
                                    <span class="badge bg-pink">{{ $hotelcategory->name }}</span>
                                @endforeach
                        </div>
                        <div class="stay-info text-right">
                            <p><strong>Date of stay:</strong>{{ $review->reservation->check_in_date }} ~ {{ $review->reservation->check_out_date }}</p>
                            <p><strong>people:</strong> {{ $review->reservation->number_of_people }} </p>
                            <p><strong>Type of room:</strong> twin</p> //修正必要
                        </div>
                    </div>
                    <hr>
                    <div class="review-body">
                        <h5>Overall rating</h5>
                        <p class="rating">
                                    @for ($i = 0; $i < $review->rating; $i++)
                                        <strong>★</strong>
                                    @endfor
                                    @for ($i = $review->rating; $i < 5; $i++)
                                        <strong>☆</strong>
                                    @endfor
                                    {{ $review->rating }}
                        </p>
                        <h5>Comments</h5>
                        <p>
                        {{ $review->comment }}
                        </p>
                    </div>
                    <div class="review-images d-flex mt-4">
                        <div class="hotel-image me-2">
                            <img src="{{ asset('images/hotel.jpg') }}" alt="hotel-img" class="hotel-img">
                        </div>
                        <div class="hotel-image me-2">
                            <img src="{{ asset('images/hotel.jpg') }}" alt="hotel-img" class="hotel-img">
                        </div>
                        <div class="hotel-image me-2">
                            <img src="{{ asset('images/hotel.jpg') }}" alt="hotel-img" class="hotel-img">
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection