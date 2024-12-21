@extends('layouts.customer_mypage')

@section('title', 'completed')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <img src="{{ asset('images/hotel.jpg') }}" alt="hotel-img" class="hotel-img img-fluid">
                </div>
                <div class="col-2">
                    <h3 class="card-title">Hotel A</h3>
                    <p class="text-muted">Tokyo</p>
                    <span class="badge bg-danger">Wheelchair</span>
                </div>
                <div class="col-4">
                    <p>date of stay: 2023/11/2 ~ 2024/11/3</p>
                    <p>people: 2</p>
                    <p>type of room: twin</p>
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
                            <h4>¥10,000</h4>
                            <a href="#" class="btn btn-outline-primary p-1 m-2">View fee details</a>
                        </div>
                    </div>
                </div>

                <div class="card">
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
                </div>
            </div>
            <div class="mt-3 d-flex justify-content-center">
                <a href="{{ route('customer.review.create') }}"><button class="btn btn-outline-secondary me-5">Write review</button></a>
            </div>
        </div>
    </div>
</div>
@endsection