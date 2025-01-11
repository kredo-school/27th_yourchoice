@extends('layouts.hotel')

<link rel="stylesheet" href="{{ asset('css/hotel_reservation_edit.css') }}">

@section('content')
<div class="container-fluid">
    <div class="row">

                        <h2 class="mb-4"><strong>Edit Reservation</strong></h2>
                    <div class="card p-5 shadow-sm rounded">

                    @if (!empty($reservation) && ($reservation->guest || $reservation->user))
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('hotel.reservation.show_daily', ['date' => request('date', $reservation->check_in_date ?? $date)]) }}" class="subbtn2">Reservation Cancel</a>
                        </div>
                    <form action="{{ route('hotel.reservation.update', $reservation->id) }}" method="POST">
                            @csrf
                                @method('PUT')

                        <!-- Room and Date Information -->
                        <div class="mb-4">
                                <h3><strong>Name: {{ $reservation->user->first_name ?? $reservation->guest->first_name}} {{ $reservation->user->last_name ?? $reservation->guest->last_name}}</strong></h3>
                        </div>
                        <div class="mb-4">
                                <p><strong>Room No. {{ $rooms->pluck('room_number')->join(', ') }}</strong></p>
                                <p><strong>Check-in date:</strong> {{ $reservation->check_in_date }}</p>
                                <p><strong>Check-out date:</strong> {{ $reservation->check_out_date }}</p>
                        </div>

                        <!-- Comment Section -->
                             <!-- 隠しフィールドで date を保持 -->
                            <input type="hidden" name="date" value="{{ request('date', $reservation->check_in_date ?? $date) }}">

                            <div class="form-group mb-3">
                                <label for="customer_request"><strong>Customer request & Hotel memo</strong></label>
                                <textarea class="form-control" id="customer_request" name="customer_request" rows="3">{{ $reservation->customer_request ?? '' }}</textarea>
                            </div>

                            <!-- Buttons -->
                            <div class="d-flex justify-content-start">
                                <a href="{{ route('hotel.reservation.show_daily', ['date' => request('date', $reservation->check_in_date ?? $date)]) }}" class="subbtn2 me-3">Edit Cancel</a>
                                <button type="submit" class="mainbtn">Confirm</button>
                            </div>

                        </form>
                    </div>

                    @else
                    <div class="d-flex justify-content-end">
                            <a href="{{ route('hotel.reservation.show_daily', ['date' => request('date', $reservation->check_in_date ?? $date)]) }}" class="subbtn2">Cancel Blocked</a>
                        </div>
                    <form action="{{ route('hotel.reservation.update', $reservation->id) }}" method="POST">
                            @csrf
                                @method('PUT')

                        <!-- Room and Date Information -->
                        <div class="mb-4">
                                <h3><strong>This room is blocked.</strong></h3>
                        </div>
                        <div class="mb-4">
                                <p><strong>Room No. {{ $rooms->pluck('room_number')->join(', ') }}</strong></p>
                                <p><strong>From:</strong> {{ $reservation->check_in_date }}</p>
                                <p><strong>To:</strong> {{ $reservation->check_out_date }}</p>
                        </div>

                        <!-- Comment Section -->
                             <!-- 隠しフィールドで date を保持 -->
                            <input type="hidden" name="date" value="{{ request('date', $reservation->check_in_date ?? $date) }}">

                            <div class="form-group mb-3">
                                <label for="customer_request"><strong>Hotel memo</strong></label>
                                <textarea class="form-control" id="customer_request" name="customer_request" rows="3">{{ $reservation->customer_request ?? '' }}</textarea>
                            </div>

                            <!-- Buttons -->
                            <div class="d-flex justify-content-start">
                                <a href="{{ route('hotel.reservation.show_daily', ['date' => request('date', $reservation->check_in_date ?? $date)]) }}" class="subbtn2 me-3">Edit Cancel</a>
                                <button type="submit" class="mainbtn">Confirm</button>
                            </div>

                        </form>
                    </div>
                    @endif


        
    </div>
</div>
@endsection