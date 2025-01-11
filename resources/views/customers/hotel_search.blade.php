@extends('layouts.customer')

@section('title', 'Wheelchair and Senior')

@section('content')
<link rel="stylesheet" href="{{ asset('css/hotel_search.css') }}">

<div class="container mt-5">

    <h1 class="text-center">{{ ucfirst($topCategory) }}</h1>

    <div class="input-group my-4">
        {{-- 検索機能実装 --}}
        <form action="#" method="POST" class="form-inline">
            @csrf
            <div class="d-flex align-items-center">
                <!-- 場所入力 -->
                <input type="text" name="location" class="form-control me-2" placeholder="Where to?" id="location">
                
                <!-- チェックイン日入力 -->
                <input type="date" name="checkInDate" class="form-control" id="checkInDate" placeholder="Check-in Date">
                
                <!-- チェックアウト日入力 -->
                <input type="date" name="checkOutDate" class="form-control me-2" id="checkOutDate" placeholder="Check-out Date">
                
                <!-- 人数入力 -->
                <input type="number" name="travellers" class="form-control" placeholder="Travellers" id="travellers">
                
                <!-- 検索ボタン -->
                <button class="btn btn-outline-secondary" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </form>
    </div>

    <div class="d-flex justify-content-start mb-3">
        <div class="me-3">
            <button class="btn btn-outline-secondary" type="button" aria-haspopup="true" aria-expanded="false" data-bs-toggle="modal" data-bs-target="#advanced-search">
                Filter
            </button>
            @include('customers.modals.advanced_search')
        </div>
        <div class="me-3">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Price
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Low to High</a>
                <a class="dropdown-item" href="#">High to Low</a>
            </div>
        </div>
        <div class="me-3">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Room
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Single</a>
                <a class="dropdown-item" href="#">Double</a>
            </div>
        </div>
    </div>

    <div class="list-group">
        @foreach ($hotels as $hotel)
            <div class="list-group-item">
                <a href="{{ route('customer.top.show', ['id' => $hotel->id]) }}" class="stretched-link"></a>
                <div class="row align-items-center">
                    <div class="col-md-2">
                        <img src="{{ asset('images/hotel.jpg') }}" alt="hotel-img" class="hotel-img">
                    </div>
                    <div class="col-md-7">
                        <h5>{{$hotel->hotel_name}}</h5>
                        <p>{{$hotel->prefecture}}</p>
                            @foreach($hotel->categories as $hotelcategory)
                                <span class="badge bg-pink">{{ $hotelcategory->name }}</span>
                            @endforeach
                    </div>
                    <div class="col-md-3 text-end">
                        <div class="rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            (120)
                        </div>
                        <h6>$100 / 2 travellers</h6>
                        <small>include taxes & fees for 1 night</small>
                    </div>
                </div>
            </div>
        @endforeach

    <!-- ページネーション -->
    <nav aria-label="Page navigation">
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
    </nav>
</div>
@endsection
