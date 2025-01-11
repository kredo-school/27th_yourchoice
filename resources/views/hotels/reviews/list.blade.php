@extends('layouts.hotel')
@section('title', 'Hotel Review Management show')

<link rel="stylesheet" href="{{ asset('css/reviewlist.css') }}">

@section('content')
<div class="container-fluid">
    <div class="row">
            <h2>Review List</h2>
            <div class="review-list">
                @foreach($list_reviews as $review)
                 <div class="card p-3 mb-3">
                    <div class="review-card">
                            <div class="hotel-info">
                                <h6 class="card-title">Username: </h5>
                                <h5 class="card-subtitle mb-2 ms-2 text-muted">  {{ $review->user->username }}</h6>
                            </div>
                            <div class="hotel-review">
                                <p class="mt-2">Overall Rating: 
                                    @for ($i = 0; $i < $review->rating; $i++)
                                        <span class="selected">★</span>
                                    @endfor
                                    @for ($i = $review->rating; $i < 5; $i++)
                                        <span class="not_selected">★</span>
                                    @endfor
                                    <span id="rate-display" class="rate-text">{{ $review->rating }}</span>
                                </p>
                                <label for="comment">Comment:</label>
                                <p class="card-text">
                                        @if (strlen($review->comment) > $commentLimit=150)
                                            {{ Str::limit($review->comment, $commentLimit, '...') }}
                                            </a>
                                        @else
                                            {{ $review->comment }}
                                        @endif
                                </p>
                                
                            </div>
                            <a href="{{ route('hotel.review.show', $review->id) }}" class="stretched-link"></a>
                    </div>
                </div>
                @endforeach

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