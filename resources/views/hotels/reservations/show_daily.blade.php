@extends('layouts.hotel')

<link rel="stylesheet" href="{{ asset('css/flatpickr.css') }}">
<link rel="stylesheet" href="{{ asset('css/hotel_reservation.css') }}">
<script src="{{ asset('js/flatpickr.js') }}"></script>

@section('content')
<div class="container">
        <h1>Reservation Management</h1>
        <div class="navigation">
            <button class="btn btn-nav btn-outline-secondary">&lt;</button>
            <input type="date" id="date-picker" value="{{ $date }}" class="date-picker">
            <button class="btn btn-nav btn-outline-secondary">&gt;</button>
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
                    <th class="col11">Customer request</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roomStatus as $status)
                    <tr>
                        <td><a href="{{ route('hotel.reservation.edit') }}"><img src="{{ asset('images/pen-to-square-solid.svg') }}" class="edit-logo"></a></td>
                        <td>{{ $status['room']->room_number }}</td>
                        @if ($status['reservation'])
                            <td>{{ $status['reservation']->user->first_name }} {{ $status['reservation']->user->last_name }}</td>
                            <td>{{ $status['details']->number_of_people }}</td>
                            <td>{{ $status['reservation']->check_in_date }}</td>
                            <td>{{ $status['reservation']->check_out_date }}</td>
                            <td>{{ $status['reservation']->breakfast ? 'Yes' : 'No' }}</td>
                            <td>{{ $status['reservation']->payment->status }}</td>
                            <td>{{ $status['reservation']->checkin_status }}</td> 
                            <td>{{ $status['reservation']->user->phone_number }}</td>
                            <td>{{ $status['reservation']->customer_request }}</td>
                        @else
                            <td colspan="9" class="text-center">No Reservation</td>
                        @endif
                    </tr>
                @endforeach







                <!-- <tr>
                    <td><a href="{{ route('hotel.reservation.edit') }}"><img src="{{ asset('images/pen-to-square-solid.svg') }}" class="edit-logo"></a></td>
                    <td>101</td>
                    <td>Shinji Watanabe</td>
                    <td>1</td>
                    <td>2024/11/8</td>
                    <td>2024/11/10</td>
                    <td>breakfast</td>
                    <td>
                        <select>
                            <option>done</option>
                            <option>pending</option>
                        </select>
                    </td>
                    <td>
                        <select>
                            <option>done</option>
                            <option>not done</option>
                        </select>
                    </td>
                    <td>080-3452-5212</td>
                    <td>Please provide a room on a higher floor with a quiet environment.</td>
                </tr>
                <tr>
                    <td><a href="{{ route('hotel.reservation.edit') }}"><img src="{{ asset('images/pen-to-square-solid.svg') }}" class="edit-logo"></a></td>
                    <td>102</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <select>
                            <option>done</option>
                            <option>pending</option>
                        </select>
                    </td>
                    <td>
                        <select>
                            <option>done</option>
                            <option>not done</option>
                        </select>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><a href="{{ route('hotel.reservation.edit') }}"><img src="{{ asset('images/pen-to-square-solid.svg') }}" class="edit-logo"></a></td>
                    <td>103</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <select>
                            <option>done</option>
                            <option>pending</option>
                        </select>
                    </td>
                    <td>
                        <select>
                            <option>done</option>
                            <option>not done</option>
                        </select>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><a href="{{ route('hotel.reservation.edit') }}"><img src="{{ asset('images/pen-to-square-solid.svg') }}" class="edit-logo"></a></td>
                    <td>201</td>
                    <td>AAAA BBB</td>
                    <td>1</td>
                    <td>2024/11/8</td>
                    <td>2024/11/10</td>
                    <td>breakfast</td>
                    <td>
                        <select>
                            <option>pending</option>
                            <option>done</option>
                        </select>
                    </td>
                    <td>
                        <select>
                            <option>not done</option>
                            <option>done</option>
                        </select>
                    </td>
                    <td>080-3452-5212</td>
                    <td>Please ensure the room is wheelchair accessible.</td>
                </tr>
                <tr>
                    <td><a href="{{ route('hotel.reservation.edit') }}"><img src="{{ asset('images/pen-to-square-solid.svg') }}" class="edit-logo"></a></td>
                    <td>202</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <select>
                            <option>done</option>
                            <option>pending</option>
                        </select>
                    </td>
                    <td>
                        <select>
                            <option>done</option>
                            <option>not done</option>
                        </select>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><a href="{{ route('hotel.reservation.edit') }}"><img src="{{ asset('images/pen-to-square-solid.svg') }}" class="edit-logo"></a></td>
                    <td>203</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <select>
                            <option>done</option>
                            <option>pending</option>
                        </select>
                    </td>
                    <td>
                        <select>
                            <option>done</option>
                            <option>not done</option>
                        </select>
                    </td>
                    <td></td>
                    <td></td>
                </tr> -->

            </tbody>
        </table>
    </div>
@endsection