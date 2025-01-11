@extends('layouts.hotel')

<link rel="stylesheet" href="{{ asset('css/hotel_reservation_edit.css') }}">

@section('content')
<div class="container-fluid">
    <div class="row">

                        <h2 class="mb-4"><strong>Edit Reservation</strong></h2>

                                <!-- タブナビゲーション -->
        <ul class="nav nav-tabs mb-4" id="reservationTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="offline-tab" data-bs-toggle="tab" data-bs-target="#offline" type="button" role="tab" aria-controls="offline" aria-selected="true">Offline Reservation</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="block-tab" data-bs-toggle="tab" data-bs-target="#block" type="button" role="tab" aria-controls="block" aria-selected="false">Block Room</button>
            </li>
        </ul>

        <div class="tab-content" id="reservationTabContent">
            <!-- Offline Reservation -->
            <div class="tab-pane fade show active" id="offline" role="tabpanel" aria-labelledby="offline-tab">


                    <div class="card p-5 shadow-sm rounded">
                    <form action="{{ $reservation ? route('hotel.reservation.update', $reservation->id) : route('hotel.reservation.store') }}" method="POST">
                            @csrf
                            @if ($reservation)
                                @method('PUT')
                            @endif
                        <!-- Room and Date Information -->
                        <div class="mb-4">
                            @if ($reservation)
                                <p><strong>Room No. {{ $rooms->pluck('room_number')->join(', ') }}</strong></p>
                                <p><strong>Check-in date:</strong> {{ $reservation->check_in_date }}</p>
                                <p><strong>Check-out date:</strong> {{ $reservation->check_out_date }}</p>
                            @else
                                <p><strong>Room No. {{ $room_number }}</strong></p>
                                <input type="hidden" name="room_id" value="{{ $room_id }}">
                                <div class="form-group mb-3 col-2">
                                    <label for="check-in-date"><strong>Check-in date:</strong></label>
                                    <input type="date" class="form-control" id="check-in-date" name="check_in_date" 
                                        value="{{ $date }}">
                                </div>

                                <div class="form-group mb-3 col-2">
                                    <label for="check-out-date"><strong>Check-out date:</strong></label>
                                    <input type="date" class="form-control" id="check-out-date" name="check_out_date">
                                </div>
                            @endif
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
                                <a href="{{ route('hotel.reservation.show_daily', ['date' => request('date', $reservation->check_in_date ?? $date)]) }}" class="subbtn2 me-3">Cancel</a>
                                <button type="submit" class="mainbtn">Confirm</button>
                            </div>

                        </form>
                    </div>


            </div>
                    


<!-- ２つ目がここから -->
             <!-- Block room -->
             <div class="tab-pane fade show active" id="block" role="tabpanel" aria-labelledby="block-tab">
                    <div class="card p-5 shadow-sm rounded">
                    <form action="{{ $reservation ? route('hotel.reservation.update', $reservation->id) : route('hotel.reservation.store') }}" method="POST">
                            @csrf
                            @if ($reservation)
                                @method('PUT')
                            @endif
                        <!-- Room and Date Information -->
                         <p>aaaaaaa
                         </p>
                        <div class="mb-4">
                            @if ($reservation)
                                <p><strong>Room No. {{ $rooms->pluck('room_number')->join(', ') }}</strong></p>
                                <p><strong>Check-in date:</strong> {{ $reservation->check_in_date }}</p>
                                <p><strong>Check-out date:</strong> {{ $reservation->check_out_date }}</p>
                            @else
                                <p><strong>Room No. {{ $room_number }}</strong></p>
                                <input type="hidden" name="room_id" value="{{ $room_id }}">
                                <div class="form-group mb-3 col-2">
                                    <label for="check-in-date"><strong>Check-in date:</strong></label>
                                    <input type="date" class="form-control" id="check-in-date" name="check_in_date" 
                                        value="{{ $date }}">
                                </div>

                                <div class="form-group mb-3 col-2">
                                    <label for="check-out-date"><strong>Check-out date:</strong></label>
                                    <input type="date" class="form-control" id="check-out-date" name="check_out_date">
                                </div>
                            @endif
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
                                <a href="{{ route('hotel.reservation.show_daily', ['date' => request('date', $reservation->check_in_date ?? $date)]) }}" class="subbtn2 me-3">Cancel</a>
                                <button type="submit" class="mainbtn">Confirm</button>
                            </div>

                        </form>
                    </div>


                    </div>
                    </div>



        
    </div>
</div>
@endsection