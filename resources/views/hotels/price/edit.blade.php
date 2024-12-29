@extends('layouts.hotel')

<link rel="stylesheet" href="{{ asset('css/hotel_price.css') }}">

@section('content')

<h1 class="mb-4">Edit Prices</h1>
<div class="d-flex justify-content-between align-items-center mb-3">
    <button class="btn btn-outline-secondary">&lt;</button>
    <button class="btn btn-outline-secondary">&gt;</button>
</div>


<form action="{{ route('hotel.price.update') }}" method="POST">
    @csrf


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
                        $rate = $rates[$roomType]->firstWhere('date', $date);
                    @endphp
                    <td>
                        <div class="input-with-unit">
                        <input 
                            type="hidden" 
                            name="rates[{{ $rate->id ?? 'new_' . $loop->parent->index . '_' . $loop->index }}][id]" 
                            value="{{ $rate->id ?? '' }}"
                        >
                        <input 
                            type="hidden" 
                            name="rates[{{ $rate->id ?? 'new_' . $loop->parent->index . '_' . $loop->index }}][room_type]" 
                            value="{{ $roomType }}"
                        >
                        <input 
                            type="hidden" 
                            name="rates[{{ $rate->id ?? 'new_' . $loop->parent->index . '_' . $loop->index }}][date]" 
                            value="{{ $date }}"
                        >
                        <input 
                            type="number" 
                            name="rates[{{ $rate->id ?? 'new_' . $loop->parent->index . '_' . $loop->index }}][rate]" 
                            value="{{ isset($rate->rate) ? round(abs($rate->rate)) : 100 }}" 
                            class="form-control text-center input-box" step="5"
                        >
                        <span class="unit">%</span>
                        </div>
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>

    </table>
    <div class="text-end">
        <a href="{{ route('hotel.price.show') }}" class="subbtn2">Cancel</a>
        <button type="submit" class="mainbtn">Save Changes</button>
    </div>
</form>

@endsection