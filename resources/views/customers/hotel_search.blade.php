@extends('layouts.customer')
<!-- CSS -->
<link rel="stylesheet" href="{{ asset('css/hotel_search.css') }}">

@section('title', 'Wheelchair and Senior')

@section('content')

<section class="hero" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset($backgroundImage) }}');">
    <h1 class="text-center text-light">{{ ucfirst($topCategory) }}</h1>
</section>


<div class="container mt-5">
    <div class="input-group my-4">
        {{-- 検索機能実装 --}}
        <form action="{{ route('customer.top.search', ['topCategory' => $topCategory ?? '']) }}" method="POST" class="form-inline">
            @csrf
            <div class="d-flex align-items-center">
                <!-- 場所入力 -->
                <input type="text" name="location" class="form-control me-2" placeholder="Where to?" id="location" value="{{ old('location', $location ?? '') }}" required>
                
                <!-- チェックイン日入力 -->
                <input type="date" name="checkInDate" class="form-control" id="checkInDate" placeholder="Check-in Date" value="{{ old('checkInDate', $checkInDate ?? '') }}" required>
                
                <!-- チェックアウト日入力 -->
                <input type="date" name="checkOutDate" class="form-control me-2" id="checkOutDate" placeholder="Check-out Date" value="{{ old('checkOutDate', $checkOutDate ?? '') }}" required>
                
                <!-- 人数入力 -->
                <input type="number" name="travellers" class="form-control" placeholder="Travellers" id="travellers" value="{{ old('travellers', $travellers ?? '') }}" required>
                
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
                {{-- <a href="{{ route('customer.top.show', ['id' => $hotel->id]) }}" class="stretched-link"></a> --}}
                <form action="{{ route('customer.top.show', ['id' => $hotel->id ?? '', 
                    'checkInDate' => $checkInDate ?? '', 
                    'checkOutDate' => $checkOutDate ?? '', 
                    'travellers' => $travellers ?? '']) }}" method="GET">

                @csrf
                    <input type="hidden" name="travellers" value="{{ old('travellers', $travellers ?? '') }}">
                    <input type="hidden" name="checkInDate" value="{{ old('checkInDate', $checkInDate ?? '') }}">
                    <input type="hidden" name="checkOutDate" value="{{ old('checkOutDate', $checkOutDate ?? '') }}">
                    <button type="submit" class="stretched-link" style="opacity:0;"></button>
                </form>
                <div class="row align-items-center">
                    <div class="col-md-2">
                        <img src="{{ $hotel->image_main }}" alt="hotel-img" class="hotel-img">
                    </div>
                    <div class="col-md-7">
                        <h5>{{$hotel->hotel_name}}</h5>
                        <p>{{$hotel->prefecture}}</p>
                            @foreach($hotel->categories->where('type','category') as $category)
                                <span class="badge bg-pink">{{ $category->name }}</span>
                            @endforeach
                    </div>
                    <div class="col-md-3 text-end">
                        <div class="rating">
                            @for ($i = 0; $i < $hotel->averageRating ; $i++)
                                <span class="selected">★</span>
                            @endfor
                            @for ($i = $hotel->averageRating; $i < 5; $i++)
                                <span class="not_selected">★</span>
                            @endfor
                            ({{ $hotel->averageRating}})
                        </div>
                            <h6>${{ $hotel->minPrice }}/ {{ $travellers ?? 2 }} {{ Str::plural('traveller', $travellers ?? 2) }}</h6>
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
