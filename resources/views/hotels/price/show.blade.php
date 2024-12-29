@extends('layouts.hotel')

<link rel="stylesheet" href="{{ asset('css/hotel_price.css') }}">

@section('content')

<h1 class="mb-4">Price Management</h1>


<div class="d-flex justify-content-between align-items-center mb-3">
    <!-- PREVIOUS WEEK BUTTON -->
    <form method="GET" action="{{ route('hotel.price.show') }}">
        <input type="hidden" name="current_week" value="{{ $currentWeek - 1 }}">
        <button class="btn btn-outline-secondary">&lt;</button>
    </form>

    <!-- NEXT WEEK BUTTON -->
    <form method="GET" action="{{ route('hotel.price.show') }}">
        <input type="hidden" name="current_week" value="{{ $currentWeek + 1 }}">
        <button class="btn btn-outline-secondary">&gt;</button>
    </form>
</div>



<!-- 料金レートテーブル -->

    <table class="table table-bordered text-center">


    <!-- レートテーブル最上段 -->
        <thead > 
            <tr>
                <th class="header col-2">Room Type</th>
                @foreach ($dates as $date)
                    @php
                        $dayOfWeek = \Carbon\Carbon::parse($date)->format('D'); // 曜日を取得
                        $additionalClass = $dayOfWeek === 'Sat' ? 'saturday' : ($dayOfWeek === 'Sun' ? 'sunday' : '');
                    @endphp
                    <th class="header {{ $additionalClass }} col-1">
                        {{ \Carbon\Carbon::parse($date)->format('n/j (D)') }}
                    </th>
                @endforeach
            </tr>
        </thead>


    <!-- レートテーブルのデータ一覧 -->
        <tbody>
            @foreach ($roomTypes as $roomType)
                <tr>
                    <td>{{ $roomType }}</td>
                    @foreach ($dates as $date)
                        @php
                            $rate = isset($rates[$roomType]) ? $rates[$roomType]->firstWhere('date', $date) : null;
                            $rateValue = $rate ? round($rate->rate) : null;
                            $class = $rateValue === null || $rateValue === 100.00
                                ? 'black-rate' 
                                : ($rateValue > 100 ? 'red-rate' : 'blue-rate');
                        @endphp
                        <td class="{{ $class }}">
                            {{ $rateValue !== null ? $rateValue . '%' : '-' }}
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>


</table>


    <form method="GET" action="{{ route('hotel.price.edit') }}">
        <input type="hidden" name="current_week" value="{{ $currentWeek }}">
        <button class="subbtn1">Edit Prices</button>
    </form>

@endsection