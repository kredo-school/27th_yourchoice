@extends('layouts.customer_mypage')

{{-- DEBUG用 最終確認まで済んだら削除------------------ここから--}}
{{-- @section('content')
<div class="container">
    <h1>Reservation Confirmation</h1>

    <p><strong>Hotel Picture:</strong> {{ $hotel->image_main }}</p>
    <p><strong>Hotel Name:</strong> {{ $hotelname->username}}</p>
    <p><strong>Hotel ID(TMP):</strong> {{$hotelIds}}</p>
    <p><strong>Room type:</strong> {{$roomTypes}}</p>
    <p><strong>Location:</strong> {{ $hotel->prefecture }}</p>
    <p><strong>Check-in Date:</strong> {{ $reservation->check_in_date }}</p>
    <p><strong>Check-out Date:</strong> {{ $reservation->check_out_date }}</p>
    <p><strong>Number of People:</strong> {{ $reservation->number_of_people }}</p>
    <p><strong>Breakfast:</strong> {{ $reservation->breakfast ? 'Yes' : 'No' }}</p>
    <p><strong>Status:</strong> {{ $reservation->reservation_status }}</p>
    <p><strong>Checkin_Status:</strong> {{ $reservation->checkin_status }}</p>
    <p><strong>Price:</strong> ${{ $payment->amount }}</p>  
</div>
@endsection --}}
{{-- DEBUG用 最終確認まで済んだら削除------------------ここまで --}}

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <img src="{{ asset('images/hotel.jpg') }}" alt="hotel-img" class="hotel-img img-fluid">
                </div>
                <div class="col-2">
                    {{-- Hotel Name --}}
                    <h3 class="card-title">{{ $hotel->user->username}}</h3>
                    {{-- <h3 class="card-title">{{ $hotelname->username}}</h3> --}}
                    {{-- Location --}}
                    <p class="text-muted">{{ $hotel->prefecture }}</p>
                    {{-- Category --}}
                    <span class="badge bg-danger">{{$hotel->categories->pluck('name')->implode(', ')}}</span>
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

                {{-- 優先度下げ コメントアウト --}}
                {{-- <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <h4>Price</h4>
                        </div>
                        <div class="col-6 text-right">
                            <h4>¥{{ $payment->amount }}</h4>
                            <a href="#" class="btn btn-outline-primary p-1 m-2">View fee details</a>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="card">
                    <div class="card-body">
                        <h6 class="fw-bolder">The final price shown is the amount you'll pay to the property.</h6>
                        <p>Booking.com doesn't charge guests any reservation, administration, or other fees. Your card issuer may charge you a foreign transaction fee.</p>
                        <h6>Payment Info</h6>
                        <p>The State Sunnyu handles all payments. This property accepts the following forms of payment:</p>
                        <h6>Currency & Exchange Rate Info</h6>
                        <p>You'll pay The State Sunnyu in KRW according to the exchange rate on the day of payment. The amount displayed in JPY is just an estimate based on today's exchange rate for KRW.</p>
                        <h6>Additional Info</h6>
                        <p>Note that additional supplements (e.g., an extra bed) aren't added in this total. If you don't show up or cancel, applicable taxes may still be charged by the property. Remember to read the <strong>Important info</strong> below – it could contain important details not mentioned here.</p>
                    </div>
                </div> --}}
            </div>
            <div class="mt-3 d-flex justify-content-center">
                <a href="{{ route('customer.review.create') }}"><button class="btn btn-outline-secondary me-5">Write review</button></a>
            </div>
        </div>
    </div>
</div>
@endsection