@extends('layouts.customer_mypage')

@section('content')
<link rel="stylesheet" href="{{ asset('css/review.css') }}">
<div class="container mt-5">
    <div class="card {{ $reservation->reservation_status == 'cancelled' ? 'opacity-50' : '' }}">
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <div class="hotel-image">                             
                        <img src="{{ ( $hotel->image_main ) }}" alt="hotel-img" class="hotel-img">
                    </div>
                </div>
                <div class="col-2">
                    {{-- Hotel Name --}}
                    <h3 class="card-title">{{ $hotel->hotel_name}}</h3>
                    <p class="text-muted">{{ $hotel->prefecture }}</p>

                    @foreach($hotel->categories->where('type','category') as $category)
                    <span class="badge bg-pink">{{ $category->name }}</span>
                    @endforeach
                    
                    <span class="badge bg-danger">{{ $hotel->hotelname }}</span>
                </div>
                <div class="col-4">
                    {{-- Date --}}
                    <p>date of stay:  {{ $reservation->check_in_date }}~ {{ $reservation->check_out_date }}</p>
                    {{-- Num of People --}}
                    <p>people: {{ $reservation->number_of_people }}</p>
                    {{-- Type of Room --}}
                    <p>type of room: {{$roomTypes}}</p>
                </div>
            </div>
            <hr>
            <div class="mt-3">

                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <h4>Price</h4>
                        </div>
                        <div class="col-6 text-right">
                            <h4>${{ $payment->amount }}</h4>
                            {{-- <a href="#" class="btn btn-outline-primary p-1 m-2">View fee details</a> --}}
                        </div>
                    </div>
                </div>
            </div>

            {{-- 表示切替 --}}

            {{-- Cancelされていた場合 --}}
            @if($reservation->reservation_status == 'cancelled')
            <div class="mt-3 d-flex justify-content-center">
                <h3 class="font-weight-bold text-danger">Cancelled</h3>
            </div>
            {{-- Cancell以外 --}}
            @else
                {{-- check in 後 --}}
                @if($reservation->checkin_status == 'done')
                    {{-- レビューが存在するかを確認 --}}
                    {{-- {{dd($review->toArray());}}  --}}
                    @if(optional($review)->exists())
                        <div class="mt-3 d-flex justify-content-center">
                            <a href="{{ route('customer.review.show', $review->id) }}">
                                <button class="btn btn-outline-secondary me-5">Show review</button>
                            </a>
                        </div>
                    @else
                        <div class="mt-3 d-flex justify-content-center">
                            <a href="{{ route('customer.review.create', $reservation-> id) }}">
                                <button class="btn btn-outline-secondary me-5">Write review</button>
                            </a>
                        </div>
                    @endif
                {{-- check in前 --}}
                @else
                    <div class="mt-3 d-flex justify-content-center">
                        <button class="btn btn-outline-secondary me-5" data-bs-toggle="modal" data-bs-target="#delete">Cancel reservation</button>
                        @include('customers.mypage.reservation-detail.modals.delete')
                        <button class="btn btn-danger ms-5">Contact Hotel</button>
                    </div>
                @endif


            @endif            

        </div>
    </div>
</div>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@endsection