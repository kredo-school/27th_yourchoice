@extends('layouts.hotel')


<link rel="stylesheet" href="{{ asset('css/hotel_reservation_monthly.css') }}">
<link rel="stylesheet" href="{{ asset('css/fullcalendar.css') }}">
<script src="{{ asset('js/fullcalendar.js') }}"></script>


@section('content')
<div class="container">
    <h1 class="text-start">Reservation Management</h1>
    <div id="calendar"></div> <!-- カレンダーを表示する要素 -->

    <script src="{{ asset('js/show_monthly.js') }}"></script>

</div>
@endsection