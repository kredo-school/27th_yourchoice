@extends('layouts.customer_mypage')

<link rel="stylesheet" href="{{ asset('css/reviewsubmittion.css') }}">

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="card p-5">
                    <div class="review-header">
                        <div class="hotel-image">
                            <img src="{{ $hotel->image ?? asset('images/no-image.png') }}" 
                                alt="" 
                                class="hotel-img">
                        </div>
                        <div class="hotel-info">
                            <h4>{{ $hotel->hotel_name }}</h4>
                            <p>{{ $hotel->prefecture }}</p>
                                @foreach($hotel->categories as $hotelcategory)
                                    <span class="badge bg-pink">{{ $hotelcategory->name }}</span>
                                @endforeach
                        </div>
                        <div class="stay-info text-right">
                            <p><strong>date of stay:</strong>{{ $reservation->check_in_date }} ~ {{ $reservation->check_out_date }}</p>
                            <p><strong>people:</strong> {{ $reservation->number_of_people }} </p>
                            <p><strong>Room type:</strong>
                                @php
                                    $uniqueRoomTypes = $reservation->rooms
                                        ->pluck('room_type') // room_type のみを抽出
                                        ->unique()           // 重複を排除
                                        ->toArray();         // 配列に変換
                                @endphp

                                <span>{{ implode(', ', $uniqueRoomTypes) }}</span>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="review-form">
                        <form action="{{ route('customer.review.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
                            <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
                            <!-- Overall rating -->
                            <label for="rating">Overall Rating</label>
                                <div class="rating" id="rating">
                                    <span data-value="5" class="star">☆</span>
                                    <span data-value="4" class="star">☆</span>
                                    <span data-value="3" class="star">☆</span>
                                    <span data-value="2" class="star">☆</span>
                                    <span data-value="1" class="star">☆</span>
                                </div>
                            <!-- Hidden input for rating value -->
                            <input type="hidden" name="rating" id="rating-value">
                            <script src="{{ asset('js/rating.js') }}"></script>

                            <!-- Comments -->
                            <label for="comment">Comment</label>
                            <textarea id="comment" name="comment" rows="4"></textarea>

                            <!-- Image upload -->
                            <label for="comment">Images</label>
                            <div class="image-preview mb-3">
                                <!-- Image 1 -->
                                <label class="position-relative">
                                    <input type="file" name="images[]" class="image-input d-none"
                                        onchange="previewImage(event, 'preview-1', 'icon-1')">
                                    <i class="fa-solid fa-image fa-3x text-muted preview-icon" id="icon-1"></i>
                                    <img src="" alt="Preview 1" class="img-thumbnail preview-thumbnail d-none" id="preview-1">
                                </label>

                                <!-- Image 2 -->
                                <label class="position-relative">
                                    <input type="file" name="images[]" class="image-input d-none"
                                        onchange="previewImage(event, 'preview-2', 'icon-2')">
                                    <i class="fa-solid fa-image fa-3x text-muted preview-icon" id="icon-2"></i>
                                    <img src="" alt="Preview 2" class="img-thumbnail preview-thumbnail d-none" id="preview-2">
                                </label>

                                <!-- Image 3 -->
                                <label class="position-relative">
                                    <input type="file" name="images[]" class="image-input d-none"
                                        onchange="previewImage(event, 'preview-3', 'icon-3')">
                                    <i class="fa-solid fa-image fa-3x text-muted preview-icon" id="icon-3"></i>
                                    <img src="" alt="Preview 3" class="img-thumbnail preview-thumbnail d-none" id="preview-3">
                                </label>
                            </div>

                            <script src="{{ asset('js/reviewimage.js') }}"></script>

                            <!-- Submit button -->
                            <button type="submit" class="mainbtn">Submit review</button>
                        </form>
                    </div>
                   
        
    </div>
</div>
@endsection