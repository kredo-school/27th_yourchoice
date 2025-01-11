@extends('layouts.hotel')
@section('title', 'Hotel Review Management Show')

<link rel="stylesheet" href="{{ asset('css/review.css') }}">

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="card p-5">
                    <div class="review-card">
                    <div class="review-header">

                        <div class="hotel-info">
                                <h6 class="card-title">Username: </h5>
                                <h5 class="card-subtitle mb-2 ms-2 text-muted">  {{ $review->user->username }}</h6>
                            </div>
                        <div class="stay-info text-right">
                            <p><strong>Date of stay:</strong>{{ $review->reservation->check_in_date }} ~ {{ $review->reservation->check_out_date }}</p>
                            <p><strong>people:</strong> {{ $review->reservation->number_of_people }} </p>
                            <p><strong>Room type:</strong>
                                @php
                                    $uniqueRoomTypes = $review->reservation->rooms
                                        ->pluck('room_type') // room_type のみを抽出
                                        ->unique()           // 重複を排除
                                        ->toArray();         // 配列に変換
                                @endphp

                                <span>{{ implode(', ', $uniqueRoomTypes) }}</span>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="review-body">
                        <h5>Overall rating</h5>
                        <p class="mt-2">
                                    @for ($i = 0; $i < $review->rating; $i++)
                                        <span class="selected">★</span>
                                    @endfor
                                    @for ($i = $review->rating; $i < 5; $i++)
                                        <span class="not_selected">★</span>
                                    @endfor
                                    <span id="rate-display" class="rate-text">{{ $review->rating }}</span>
                                </p>
                        <h5>Comments</h5>
                        <p>
                        {{ $review->comment }}
                        </p>
                    </div>
                    <div class="review-images d-flex mt-4">
                        @if ($review->image1)
                            <div class="hotel-image me-2">
                                <img src="{{ $review->image1 }}" 
                                    alt="Room Image" 
                                    class="hotel-img">
                            </div>
                        @endif
                        @if ($review->image2)
                            <div class="hotel-image me-2">
                                <img src="{{ $review->image2 }}" 
                                    alt="Room Image" 
                                    class="hotel-img">
                            </div>
                        @endif
                        @if ($review->image3)
                            <div class="hotel-image me-2">
                                <img src="{{ $review->image3 }}" 
                                    alt="Room Image" 
                                    class="hotel-img">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection