@extends('layouts.customer_mypage')

<link rel="stylesheet" href="{{ asset('css/reviewlist.css') }}">

@section('content')
<div class="container-fluid">
    <div class="row">
            <h2>Review List</h2>
            <div class="review-list">
                @foreach($list_reviews as $review)
                 <div class="card p-3 mb-3">
                    <div class="review-card">
                            <div class="hotel-image">
                                <img src="{{ asset('images/hotel.jpg') }}" alt="hotel-img" class="hotel-img">
                            </div>
                            <div class="hotel-info">
                                <h5 class="card-title">{{ $review->hotel->hotel_name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $review->hotel->prefecture }}</h6>
                                @foreach($review->hotel->hotelcategory as $hotelcategory)
                                <span class="badge bg-pink">{{ $hotelcategory->category->name }}</span>
                                @endforeach
                            </div>
                            <div class="hotel-review">
                                <p class="mt-2">Overall Rating: 
                                    <strong>★</strong>
                                    {{ $review->rating }}
                                </p>
                                <p class="card-text">{{ $review->comment }}<a href="#">read more</a></p>
                            </div>
                            <a href="{{ route('customer.review.show') }}" class="stretched-link"></a>
                    </div>
                </div>
                @endforeach

                <!-- <div class="card p-3 mb-3">
                    <div class="review-card">
                            <div class="hotel-image">
                                <img src="{{ asset('images/hotel.jpg') }}" alt="hotel-img" class="hotel-img">
                            </div>
                            <div class="hotel-info">
                                <h5 class="card-title">{{ 'hotel_name' }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ 'location' }}</h6>
                                <span class="badge bg-pink">{{ 'accessibility' }}</span>
                            </div>
                            <div class="hotel-review">
                                <p class="mt-2">Overall Rating: 
                                    <strong>★</strong>
                                </p>
                                <p class="card-text">In an increasingly connected world where everyone’s opinions are shared with a click, reviews are more powerful than ever....<a href="#">read more</a></p>
                            </div>
                            <a href="{{ route('customer.review.show') }}" class="stretched-link"></a>
                    </div>
                </div>
                <div class="card p-3 mb-3">
                    <div class="review-card">
                            <div class="hotel-image">
                                <img src="{{ asset('images/hotel.jpg') }}" alt="hotel-img" class="hotel-img">
                            </div>
                            <div class="hotel-info">
                                <h5 class="card-title">{{ 'hotel_name' }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ 'location' }}</h6>
                                <span class="badge bg-pink">{{ 'accessibility' }}</span>
                            </div>
                            <div class="hotel-review">
                                <p class="mt-2">Overall Rating: 
                                    <strong>★</strong>
                                </p>
                                <p class="card-text">In an increasingly connected world where everyone’s opinions are shared with a click, reviews are more powerful than ever....<a href="#">read more</a></p>
                            </div>
                            <a href="{{ route('customer.review.show') }}" class="stretched-link"></a>
                    </div>
                </div> -->
            </div>

            <!-- ページネーション -->
            <!-- <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav> -->
        </div>
</div>
@endsection