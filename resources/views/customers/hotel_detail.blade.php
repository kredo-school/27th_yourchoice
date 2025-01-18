@extends('layouts.customer')

@section('title', 'Hotel Detail')

@section('content')
<link rel="stylesheet" href="{{ asset('css/hotel_search.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery-ui.css')}}">


<div class="container mt-5">
    <div class="row">
        <!-- Large Image -->
        <div class="col-md-6">
            <img src="{{ asset($hotels->image_main) }}" alt="hotel-img" class="img-fluid large-img w-100">
        </div>
        <!-- Small Images -->
        <div class="col-md-6">
            <div class="row">
                @foreach ([$hotels->image_sub1, $hotels->image_sub2, $hotels->image_sub3, $hotels->image_sub4] as $image)
                    @if($image)
                        <div class="col-6 pb-2">
                            <img src="{{ asset($image) }}" alt="hotel-img" class="img-fluid small-img w-100">
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- ホテル情報 -->
        <div class="col-md-8">
            <h1 class="mt-3">{{ $hotels->hotel_name }}</h1>
                @foreach($hotels->categories->where('type','category') as $category)
                    <span class="badge bg-pink mt-3">{{ $category->name }}</span>
                @endforeach
            <h3 class="section-title mt-3">About</h3>
            <p>{{ $hotels->description }}</p>

            <h3 class="section-title mt-3">Access</h3>
            <p>{{ $hotels->access }}</p>

            <h3 class="section-title mt-3">Most popular facilities</h3>
                @foreach($hotels->categories->whereIn('type',['service','amenity']) as $category)
                    <span class="badge bg-pink mt-3">{{ $category->name }}</span>
                @endforeach
        </div>

        <!-- レビューカルーセル -->
        <div class="col-md-4">
            <div id="carouselExampleIndicators" class="carousel slide w-100">
                <div class="carousel-inner">
                    @foreach($hotel_reviews as $index => $review)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <div class="custom-outline p-3">
                                <h5>Exceptional {{ $hotel_reviews->count() }} reviews</h5>
                                <div class="d-flex align-items-center">
                                    <span class="rate-text me-1">{{ $review->rating }}</span>
                                    @for ($i = 0; $i < $review->rating; $i++)
                                        <span class="selected">★</span>
                                    @endfor
                                    @for ($i = $review->rating; $i < 5; $i++)
                                        <span class="not_selected">★</span>
                                    @endfor
                                </div>
                                <p class="mt-3">
                                    @if (strlen($review->comment) > 100)
                                        {{ Str::limit($review->comment, 100) }}
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#commentModal-{{ $index }}">Read more</a>
                                    @else
                                        {{ $review->comment }}
                                    @endif
                                </p>
                                <p class="text-muted small">{{ $review->user->username }}</p>
                            </div>
                        </div>
                                <!-- モーダル -->
                                <div class="modal fade" id="commentModal-{{ $index }}" tabindex="-1" aria-labelledby="commentModalLabel-{{ $index }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="commentModalLabel-{{ $index }}">Full Comment</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                {{ $review->comment }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <!-- 地図を表示 -->
            <div class="card mt-2">
                <div class="card-body">
                    <div id="map" style="height: 200px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- 部屋リスト -->
    <div class="row mt-5">
        @foreach ($availableRooms as $room)
        <form action="{{ route('customer.reserve.edit', [
                            'hotel_id' => $hotels->id, 
                            'room_id' => $room->id, 
                            'travellers' => $travellers, 
                            'checkInDate' => $checkInDate, 
                            'checkOutDate' => $checkOutDate
                        ]) }}" method="GET">
            @csrf
            <div class="col-md-12 mb-4">
                <div class="d-flex align-items-center border p-3 rounded">
                    <img src="{{ asset('images/hotel-room.jpg') }}" alt="hotel-room" class="img-fluid" style="max-width: 150px;">
                    <div class="ms-3 flex-grow-1">
                        <h5>{{ $room->room_type }}</h5>
                        <ul class="list-inline">
                            @foreach ($hotels->categories->where('type', 'free_toiletries') as $category)
                                <li class="list-inline-item"><i class="fa fa-check"></i>{{ $category->name }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <input type="hidden" id="hotel_id" name="hotel_id" value="{{ $hotels->id }}">
                    <input type="hidden" id="room_id" name="room_id" value="{{ $room->id }}">
                    <input type="hidden" id="travellers" name="travellers" value="{{ old('travellers', $travellers ?? '') }}">
                    <input type="hidden" id="checkInDate" name="checkInDate" value="{{ old('checkInDate', $checkInDate ?? '') }}">
                    <input type="hidden" id="checkOutDate" name="checkOutDate" value="{{ old('checkOutDate', $checkOutDate ?? '') }}">
                    <button type="submit" class="btn btn-danger mt-2">Book now</button>
                    <div class="text-end">
                        <h6 class="mb-1">{{ $room->price }} / {{ $room->capacity }} travellers</h6>
                        <small>Includes taxes & fees for 1 night</small>
                    </div>
                </div>
            </div>
        </form>
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
