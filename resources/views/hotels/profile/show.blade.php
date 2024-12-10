@extends('layouts.hotel')
@section('title', 'Hotel Admin Show Profile')
@section('content')

<div class="container mt-5">
    <h1 class="mb-4">Hotel Admin Profile</h1>
    
    <!-- Basic Information -->
    <div class="row">
        <div class="col-md-6">
            <h3>Basic</h3>
            <p><strong>Hotel Name:</strong> {{ $hotel->name }}</p>
            <p><strong>Email:</strong> {{ $hotel->email }}</p>
            <p><strong>Website URL:</strong> <a href="{{ $hotel->website_url }}" target="_blank">{{ $hotel->website_url }}</a></p>
            <p><strong>Postal Code:</strong> {{ $hotel->postal_code }}</p>
            <p><strong>Address:</strong> {{ $hotel->address }}</p>
            <p><strong>Phone Number:</strong> {{ $hotel->phone_number }}</p>
            <p><strong>Definition of Access:</strong> {{ $hotel->access_definition }}</p>
            <p><strong>Attractions of the Hotel:</strong> {{ $hotel->attractions }}</p>
        </div>

        <!-- Uploaded Photos -->
        <div class="col-md-6">
            <h3>Uploaded Photos</h3>
            <div class="row">
                @foreach($hotel->photos as $photo)
                    <div class="col-md-4 mb-3">
                        <img src="{{ asset('storage/' . $photo->path) }}" class="img-fluid" alt="Hotel Photo">
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Facility & Service -->
    <div class="mt-4">
        <h3>Facility & Service</h3>
        <p><strong>Hotel Service:</strong> 
            @if($hotel->services->parking) Parking Availability @endif
            @if($hotel->services->luggage_storage) Luggage Storage @endif
            @if($hotel->services->breakfast) Breakfast: ${{ $hotel->services->breakfast_price }} @endif
        </p>
        <p><strong>Amenities:</strong>
            @if($hotel->services->wifi) Wi-Fi @endif
            @if($hotel->services->air_conditioning) Air Conditioning @endif
            @if($hotel->services->tv) TV @endif
            @if($hotel->services->dryer) Dryer @endif
        </p>
        <p><strong>Free Toiletries:</strong>
            @if($hotel->services->shampoo) Shampoo @endif
            @if($hotel->services->conditioner) Conditioner @endif
            @if($hotel->services->body_wash) Body Wash @endif
            @if($hotel->services->toothbrush) Toothbrush @endif
            @if($hotel->services->toothpaste) Toothpaste @endif
        </p>
    </div>

    <!-- Category -->
    <div class="mt-4">
        <h3>Category</h3>
        <p>
            @if($hotel->categories->wheelchair_friendly) Wheelchair and Senior-Friendly @endif
            @if($hotel->categories->pregnancy_friendly) Pregnancy-Friendly @endif
            @if($hotel->categories->family_friendly) Family-Friendly @endif
            @if($hotel->categories->religious_friendly) Religious-Friendly @endif
            @if($hotel->categories->english_friendly) English-Friendly @endif
        </p>
    </div>

    <!-- Cancellation Policy -->
    <div class="mt-4">
        <h3>Cancellation Policy</h3>
        <p><strong>Free Cancellation Period:</strong> {{ $hotel->cancellation_policy->free_cancellation_days }} days before the reservation date</p>
        <p><strong>Cancellation Fee Percentage:</strong></p>
        <ul>
            <li>General: {{ $hotel->cancellation_policy->general_fee }}%</li>
            <li>Same-Day: {{ $hotel->cancellation_policy->same_day_fee }}%</li>
            <li>No-Shows: {{ $hotel->cancellation_policy->no_show_fee }}%</li>
        </ul>
    </div>

    <!-- Remarks -->
    <div class="mt-4">
        <h3>Remarks</h3>
        <p>{{ $hotel->remarks }}</p>
    </div>

    <!-- Back Button -->
    <div class="mt-4">
        <a href="{{ route('hotel.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>

@endsection
