@extends('layouts.customer')
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/topstyle.css') }}">
@section('content')
{{-- Customer Toppage --}}

    <section class="hero">
        <h1>Your Choice</h1>
        <p>Travel for everyone</p>
        <p class="description">This website is a hotel platform designed to cater to diverse needs.</p>
    </section>
    <section class="categories">
        <h2>What category are you looking for?</h2>
        <div class="categories-grid">
            <!-- Wheelchair and Senior -->
            {{-- <a href="{{ route('categories.wheelchair') }}" class="category"> --}}
            <a href="#" class="category">
                <img src="{{ asset('images/wheelchair.png') }}" alt="Wheelchair and Senior">
            </a>
            <!-- Pregnancy -->
            <a href="#" class="category">
                {{-- <a href="{{ route('categories.pregnancy') }}" class="category"> --}}
                <img src="{{ asset('images/pregnancy.png') }}" alt="Pregnancy">
            </a>
            <!-- Family -->
            <a href="#" class="category">
                {{-- <a href="{{ route('categories.family') }}" class="category"> --}}
                <img src="{{ asset('images/family.png') }}" alt="Family">
            </a>
            <!-- Visual and Hearing Impaired -->
            <a href="#" class="category">
                {{-- <a href="{{ route('categories.visualHearing') }}" class="category"> --}}
                <img src="{{ asset('images/visual-hearing.png') }}" alt="Visual and Hearing Impaired">
            </a>
            <!-- Religious -->
            <a href="#" class="category">
            {{-- <a href="{{ route('categories.religious') }}" class="category"> --}}
                <img src="{{ asset('images/religious.png') }}" alt="Religious">
            </a>
            <!-- English Friendly -->
            <a href="#" class="category">
            {{-- <a href="{{ route('categories.englishFriendly') }}" class="category"> --}}
                <img src="{{ asset('images/english-friendly.png') }}" alt="English Friendly">
            </a>
        </div>
    </section>
@endsection
