{{-- BE: Created by miu --}}
@extends('layouts.customer_mypage')
@section('content')
<link rel="stylesheet" href="{{ asset('css/reservationlist.css') }}">

<div class="container-fluid">
    <div class="row">
            <h2>Reservation List</h2>
                <div class="reservation-list">
                    @if ($reservations->isEmpty())
                    <p>There are currently no reservations.</p>
                    @else
                    @foreach($reservations as $reservation)
                    {{-- DEBUG:ループで読み込まれている中身を見ることができる --}}
                    {{-- @foreach($reservation->reservationRoom as $reservationRoom)
                    <pre>{{ $reservationRoom->toJson(JSON_PRETTY_PRINT) }}</pre>
                    @endforeach --}}
                    <div class="card mb-3">
                        <div class="card-body ">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col">
                                        {{-- 残タスク：画像はdatabaseに正しいものがSETされてから対応 --}}
                                        <img src="{{ asset('images/hotel.jpg') }}" alt="hotel-img" class="hotel-img">
                                        {{-- <img src="{{ asset( $reservationRoom->room->hotel->image_main ) }}" alt="hotel-img" class="hotel-img"> --}}
                                    </div>
                                    <div class="col">
                                        @foreach ($reservation->reservationRoom->unique('reservation_id')  as $reservationRoom)
                                        {{-- DEBUG: 配列の中を見ることができる --}}
                                        {{-- {{dd($reservationRoom->room->hotel->categories->toArray());}} --}}
                                        <h5 class="card-title">{{ $reservationRoom->room->hotel->hotel_name }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ $reservationRoom->room->hotel->prefecture }}</h6>
                                        @endforeach
                                        @foreach ($reservationRoom->room->hotel->categories ?? [] as $hotelcategory)
                                        <span class="badge bg-pink">{{ $hotelcategory->name }}</span>
                                    @endforeach
                                    
                                    </div>
                                    <div class="col ">
                                        <p class="mb-1"> {{ $reservation->check_in_date }}~ {{ $reservation->check_out_date }}</p>
                                        <p class="mb-0 font-weight-bold">{{ $reservation->checkin_status}}</p>
                                    </div>
                                    <div class="col">
                                        {{-- payment 通貨複数対応になったらyen部分要変更--}}
                                        <p class="fs-5 fw-bolder align-bottom" >¥{{ $reservation->payment->amount }}</p>
                                    </div>
                                    <div class="col-12 mt-2 d-flex justify-content-end">
                                        <a href="{{ route('customer.reservation.show', $reservation->id )}}" class="align-self-end">read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                 @endif  
            </div>

            <!-- 残タスク：ページネーション 未実装-->
            <div class="pagination-wrapper">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        {{ $reservations->links() }}
                    </ul>
                </nav>
            </div>
            
            {{-- <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav> --}}
        </div>
</div>
@endsection
