@extends('layouts.customer')

@section('title', 'Hotel Detail')

@section('content')
<link rel="stylesheet" href="{{ asset('css/hotel_search.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery-ui.css')}}">


<div class="container mt-5">
    <div class="row">
        <!-- Large Image -->
        <div class="col-md-6">
            <img src="{{ asset('images/hotel.jpg') }}" alt="hotel-img" class="img-fluid large-img">
        </div>
        <!-- Small Images -->
        <div class="col-md-6">
            <div class="row">
                <div class="col-6 col-md-6 pb-2">
                    <img src="{{ asset($hotels->image_sub1) }}" alt="hotel-img" class="img-fluid small-img">
                </div>
                <div class="col-6 col-md-6 pb-2">
                    <img src="{{ asset($hotels->image_sub2) }}" alt="hotel-img" class="img-fluid small-img">
                </div>
                <div class="col-6 col-md-6 pb-2">
                    <img src="{{ asset($hotels->image_sub3) }}" alt="hotel-img" class="img-fluid small-img">
                </div>
                <div class="col-6 col-md-6 pb-2">
                    <img src="{{ asset($hotels->image_sub4) }}" alt="hotel-img" class="img-fluid small-img">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <h1 class="mt-3">{{ $hotels->hotel_name }}</h1>
            <span class="badge badge-primary">{{ $hotels->categories->pluck('name')}}</span>
            <p class="mt-3">About</p>
            <p>{{ $hotels->description }}</p>
            <p>Access</p>
            <p>{{ $hotels->access }}</p>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Exceptional 43 reviews</h5>
                    <div class="d-flex align-items-center">
                        <span class="badge badge-success mr-2">10</span>
                        <div>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                        </div>
                    </div>
                    <p class="mt-3">"素晴らしい滞在でした。Booking.comでの宿泊のレビューが信頼できます。"</p>
                    <p>— User Name</p>
                    <div class="mt-4">
                        <h6>Explore the area</h6>
                        <p>Blackheath, NSW</p>
                    </div>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="input-group my-4 w-50">
        <form action="#" method="POST" class="form-inline">
            @csrf
            <div class="d-flex align-items-center">
                <!-- チェックイン日入力 -->
                <input type="date" name="checkInDate" class="form-control" id="checkInDate" placeholder="Check-in Date">
                
                <!-- チェックアウト日入力 -->
                <input type="date" name="checkOutDate" class="form-control me-2" id="checkOutDate" placeholder="Check-out Date">
                
                <!-- 人数入力 -->
                <input type="number" name="travellers" class="form-control me-2" placeholder="Travellers" id="travellers">
                
                <!-- 検索ボタン -->
                <button class="btn btn-outline-secondary" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </form>
        </div>
    </div>
    @foreach ($availableRooms as $room)
        <div class="list-group">
            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-md-2">
                        <img src="{{ asset('images/hotel-room.jpg') }}" alt="hotel-room" class="hotel-room img-fluid">
                    </div>
                    <div class="col-md-7">
                        <h5>{{ $room->room_type }}</h5>
                        <ul class="list-inline">
                            <li class="list-inline-item"><i class="fa fa-check"></i> Shampoo</li>
                            <li class="list-inline-item"><i class="fa fa-check"></i> Conditioner</li>
                            <li class="list-inline-item"><i class="fa fa-check"></i> Body wash</li>
                            <li class="list-inline-item"><i class="fa fa-check"></i> Toothbrush</li>
                            <li class="list-inline-item"><i class="fa fa-check"></i> Toothpaste</li>
                        </ul>
                    </div>
                    <div class="col-md-3 text-end">
                        <h6>{{$room->price }} / {{$room->capacity }} travellers</h6>
                        <small>include taxes & fees for 1 night</small>
                        <a href="#" class="btn btn-danger mt-2">Book now</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>

<script> 
    window.hotelAddress = @json($address);
</script>

<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.js') }}"></script>
<script src="{{ asset('js/jquery_top.js') }}"></script>

@endsection
