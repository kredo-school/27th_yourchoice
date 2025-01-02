@extends('layouts.hotel')

<link rel="stylesheet" href="{{ asset('css/flatpickr.css') }}">
<link rel="stylesheet" href="{{ asset('css/hotel_reservation.css') }}">
<script src="{{ asset('js/flatpickr.js') }}"></script>

@section('content')
<div class="container">
        <h1>Reservation Management</h1>
        <div class="navigation">
            <form id="date-form" action="{{ route('hotel.reservation.show_daily') }}" method="GET">
                <button type="button" id="prev-date" class="btn btn-nav btn-outline-secondary">&lt;</button>
                <input type="date" id="date-picker" name="date" value="{{ $date }}" class="date-picker">
                <button type="button" id="next-date" class="btn btn-nav btn-outline-secondary">&gt;</button>
            </form>
        </div>

        <script src="{{ asset('js/show_daily.js') }}"></script>

        <table class="reservation-table">
            <thead>
                <tr>
                    <th class="col1"></th>
                    <th class="col2">Room No.</th>
                    <th class="col3">Name</th>
                    <th class="col4">People</th>
                    <th class="col5">Check-in date</th>
                    <th class="col6">Check-out date</th>
                    <th class="col7">Option</th>
                    <th class="col8">Payment</th>
                    <th class="col9">Check-in</th>
                    <th class="col10">Phone number</th>
                    <th class="col11">Customer request & Hotel memo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roomStatus as $status)
                    <tr>
                        <td><a href="{{ route('hotel.reservation.edit', $status['reservation']->id ?? '') }}"><img src="{{ asset('images/pen-to-square-solid.svg') }}" class="edit-logo"></a></td>
                        <td>{{ $status['room']->room_number }}</td>
                        @if ($status['reservation'])
                            <td>{{ $status['reservation']->user->first_name }} {{ $status['reservation']->user->last_name }}</td>
                            <td>{{ $status['details']->number_of_people }}</td>
                            <td>{{ $status['reservation']->check_in_date }}</td>
                            <td>{{ $status['reservation']->check_out_date }}</td>
                            <td>{{ $status['reservation']->breakfast ? 'Yes' : 'No' }}</td>
                            <td>{{ $status['payment_status'] }}</td>
                            <td>
                                <form action="{{ route('hotel.reservation.updateCheckinStatus', $status['reservation']->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="checkin_status" onchange="this.form.submit()">
                                        <option value="not done" {{ $status['reservation']->checkin_status === 'not done' ? 'selected' : '' }}>not done</option>
                                        <option value="done" {{ $status['reservation']->checkin_status === 'done' ? 'selected' : '' }}>done</option>
                                    </select>
                                </form>
                            </td> 
                            <td>{{ $status['reservation']->user->phone_number }}</td>
                            <td>{{ $status['reservation']->customer_request }}</td>
                        @else
                            <td colspan="9" class="text-center">No Reservation</td>
                        @endif
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection