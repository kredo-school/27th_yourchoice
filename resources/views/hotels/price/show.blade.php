@extends('layouts.hotel')

<link rel="stylesheet" href="{{ asset('css/hotel_price.css') }}">

@section('content')

<h1 class="mb-4">Price Management</h1>


<div class="d-flex justify-content-between align-items-center mb-3">
    <button class="btn btn-outline-secondary">&lt;</button>
    <button class="btn btn-outline-secondary">&gt;</button>
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


    <!-- レートテーブル最上段 -->
        <tbody>
            @foreach ($rates as $roomType => $rateData)
                <tr>
                    <td>{{ $roomType }}</td>
                    @foreach ($dates as $date)
                        <td>
                            @php
                                $rate = $rateData->firstWhere('date', $date);
                            @endphp
                            {{ $rate ? round($rate->rate) . '%' : '-' }}
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>


</table>


<a href="{{ route('hotel.price.edit') }}" class="subbtn1">Edit Prices</a>

@endsection