@extends('layouts.hotel')
@section('title', 'Hotel Admin Show Profile')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/hoteladmin.css') }}">

    <div class="container mt-2">
        <form method="GET" action="{{ route('hotel.profile.edit') }}" enctype="multipart/form-data">

            <div class="row">
                <div class="col-md">
                    <h1 class="mb-4 ms-3 fw-bold">Hotel Admin Profile</h1>
                </div>
            </div>
            <div class="row">
                <!-- Left Side (Basic Information) -->
                <div class="col-md-6">
                    <div class="card mt-2 mb-2">
                        <div class="card-header">Basic</div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Hotel Name :</label>
                                <p class="form-control-plaintext border-bottom">{{ $user->hotel->hotel_name }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email :</label>
                                <p class="form-control-plaintext border-bottom">{{ $user->email }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Website URL :</label>
                                <p class="form-control-plaintext border-bottom">{{ $user->hotel->url }}</p>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Postal Code :</label>
                                <p class="form-control-plaintext border-bottom">〒{{ $user->hotel->postal_code }}</p>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Address :</label>
                                <div>
                                    <p class="form-control-plaintext border-bottom">
                                        {{ $user->hotel->address }}
                                    </p>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Phone Number :</label>
                                <p class="form-control-plaintext border-bottom">{{ $user->phone_number }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Access :</label>
                                <p class="form-control-plaintext border-bottom">{{ $user->hotel->access }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description :</label>
                                <p class="form-control-plaintext border-bottom">{{ $user->hotel->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side (Images Sections) -->
                <div class="col-md-6">
                    <div class="card mt-2 mb-2">
                        <h5 class="card-header">Uploaded Images</h5>
                        <div class="card-body image-upload-container">
                            @foreach (['image_main', 'image_sub1', 'image_sub2', 'image_sub3', 'image_sub4'] as $imageField)
                                <div class="image-preview mb-3">
                                    @if ($hotel->$imageField)
                                        <img src="{{ $hotel->$imageField }}" alt="Hotel Image"
                                            class="img-thumbnail preview-thumbnail"><br>
                                        <p>{{ str_replace('image_', '', $imageField) }}</p>
                                    @else
                                        <p class="text-muted">No image uploaded</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Right Side (Service and Amenities) -->
                    <div class="card mt-2 mb-2">
                        <div class="card-header">Service</div>
                        <div class="card-body">
                            <!-- Hotel Service Section -->
                            <div class="mb-3">
                                <h6>Hotel Service :</h6>
                                <div class="service-line">
                                    @foreach ($services as $service)
                                        <span class="service-item">{{ $service->name }}</span>
                                    @endforeach
                                    <span class="service-item">{{ $user->hotel->breakfast_price }}</span>
                                </div>
                            </div>

                            <!-- Amenity Section -->
                            <div class="mb-3">
                                <h6>Amenity :</h6>
                                <div class="service-line">
                                    @foreach ($amenities as $amenity)
                                        <span class="service-item">{{ $amenity->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                            <!-- Free Toiletries Section -->
                            <div class="mb-3">
                                <h6>Free Toiletries :</h6>
                                <div class="service-line">
                                    @foreach ($free_toiletries as $item)
                                        <span class="service-item">{{ $item->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Category Section -->
                    <div class="card mt-2 mb-2">
                        <h5 class="card-header">Category</h5>
                        <div class="card-body">
                            <div class="category-container">
                                @foreach ($categories as $category)
                                    <span class="category-item">
                                        {{ $category->name }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Cancellation Policy Section -->
                    <div class="card mt-2 mb-2">
                        <h5 class="card-header">Cancellation Policy</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Free Cancellation Period :<br> {{ $user->hotel->cancellation_period }} days
                                        before the
                                        reservation date.</p>
                                </div>
                                <div class="col-md-6">
                                    <p>Cancellation Fee Percentage :</p>
                                    <p>General : {{ $user->hotel->general_fee }}%</p>
                                    <p>Same-Day : {{ $user->hotel->sameday_fee }}%</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="row mt-4 mb-2 text-end">
                        <div class="col">
                            <a href="{{ route('hotel.profile.editpass') }}" class="text-decoration-none text-dark">
                                <button type="button" class="btn btn-sub">Password Setting</button></a>
                            <a href="{{ route('hotel.profile.edit') }}" class="text-decoration-none text-dark ms-2">
                                <button type="submit" class="btn btn-sub">Edit</button>
                        </div>
                    </div>
                </div>
        </form>
    </div>
@endsection
