{{-- BE: Created by miu --}}
@extends('layouts.customer_mypage')

<!-- Text to Speech：Page Overview ページ概要を説明 -->
@section('attributes')
    <body data-page-description="This is your reservation list page.">
@endsection

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
                    {{-- 1/18 In progress --}}
                    {{-- {{dd($reservation->reservationRoom->toArray());}} --}}
                    {{-- {{dd($reservation->reservationRoom->room->hotel->hotel_name->toArray());}} --}}
                    {{-- <pre>{{ $reservation->toJson(JSON_PRETTY_PRINT) }}</pre> --}}
                    
                    <a href="{{ route('customer.reservation.show', $reservation->id )}}" class="text-decoration-none text-dark align-self-end"">
                        {{-- cancellされていたらグレーアウト --}}
                        <div class="card mb-3 {{ $reservation->reservation_status == 'cancelled' ? 'opacity-50' : '' }}">
                        {{-- <div class="card mb-3"> --}}
                            <div class="card-body ">
                                <div class="container">
                                    <div class="row align-items-center">                                    
                                        @foreach ($reservation->reservationRoom->unique('reservation_id')  as $reservationRoom)
                                            <div class="col">
                                                <div class="hotel-image">                           
                                                    <img src="{{ ( $reservationRoom->room->hotel->image_main ) }}" alt="hotel-img" class="hotel-img">
                                                </div>
                                            </div>
                                            <div class="col">
                                            {{-- DEBUG: 配列の中を見ることができる --}}
                                            {{-- {{dd($reservationRoom->room->hotel->categories->toArray());}} --}}
                                            <h5 class="card-title">{{ $reservationRoom->room->hotel->hotel_name }}</h5>
                                            
                                            <h6 class="card-subtitle mb-2 text-muted">{{ $reservationRoom->room->hotel->prefecture }}</h6>
                                            @endforeach
                                            {{-- type=categoryのnameだけ取得 --}}
                                            @foreach($reservationRoom->room->hotel->categories->where('type','category') as $category)
                                            <span class="badge bg-pink">{{ $category->name }}</span>
                                            @endforeach                               
                                        </div>
                                        <div class="col">
                                            <p class="mb-1"> {{ $reservation->check_in_date }} ~ {{ $reservation->check_out_date }}</p>
                                            @if ($reservation->reservation_status == 'cancelled')
                                                <p class="mb-0 font-weight-bold text-danger">Cancelled</p>
                                            @else
                                                <p class="mb-0 font-weight-bold">{{ $reservation->checkin_status }}</p>
                                            @endif
                                        </div>
                                        <div class="col">
                                            {{-- payment 通貨複数対応になったらyen部分要変更--}}
                                            <p class="fs-5 fw-bolder align-bottom" >${{ $reservation->payment->amount }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                 @endif  
            </div>

            <div class="pagination">
                {{ $reservations->links('pagination::bootstrap-4') }}
            </div>           
        </div>
</div>
@endsection

<!-- Text to Speech：call js -->
@push('scripts')
<script src="{{ asset('js/api_text_to_speech.js') }}"></script>
@endpush