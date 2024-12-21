@extends('layouts.hotel')

<link rel="stylesheet" href="{{ asset('css/hotel_reservation_edit.css') }}">

@section('content')
<div class="container-fluid">
    <div class="row">

                        <h2 class="mb-4"><strong>Edit Reservation</strong></h2>
                    <div class="card p-5 shadow-sm rounded">
                        <!-- Room and Date Information -->
                        <div class="mb-4">
                            <p><strong>Room No. 102</strong></p>
                            <p><strong>Check-in date:</strong> 11/8</p>
                            <p><strong>Check-out date:</strong> 11/9</p>
                        </div>

                        <!-- Comment Section -->
                        <form action="{{ route('hotel.reservation.store') }}" method="GET">

                        <div class="form-group mb-3">
                            <label for="comment"><strong>Comment</strong></label>
                            <textarea class="form-control" id="comment" rows="3" placeholder="Value"></textarea>
                        </div>

                        <!-- Phone Number -->
                        <div class="form-group mb-3">
                            <label for="phone-number"><strong>Phone number</strong></label>
                            <input type="text" class="form-control" id="phone-number" placeholder="Value">
                        </div>

                        <!-- Checkbox for Breakfast -->
                        <div class="form-check mb-4">
                            <input type="checkbox" class="form-check-input" id="breakfast" checked>
                            <label class="form-check-label" for="breakfast">Breakfast</label>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-start">
                            <a href="{{ route('hotel.reservation.show_daily') }}" class="subbtn2 me-3">Cancel</a>
                            <button type="submit" class="mainbtn">Confirm</button>
                        </div>

                        </form>
                    </div>

        
    </div>
</div>
@endsection