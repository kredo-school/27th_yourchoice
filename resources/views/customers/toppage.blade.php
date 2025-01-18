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
                <form action="{{ route('customer.top.display') }}" method="GET" class="category-form">
                    @csrf
                    <input type="hidden" name="topCategory" value="Wheelchair and Senior">
                    <button type="submit" class="category-btn">
                        <img src="{{ asset('images/wheelchair.png') }}" alt="Wheelchair and Senior">
                    </button>
                </form>
            <!-- Pregnancy -->
            <form action="{{ route('customer.top.display') }}" method="GET" class="category-form">
                @csrf
                <input type="hidden" name="topCategory" value="Pregnancy">
                <button type="submit" class="category-btn">
                    <img src="{{ asset('images/pregnancy.png') }}" alt="Pregnancy">
                </button>
            </form>
            <!-- Family -->
            <form action="{{ route('customer.top.display') }}" method="GET" class="category-form">
                @csrf
                <input type="hidden" name="topCategory" value="Family">
                <button type="submit" class="category-btn">
                    <img src="{{ asset('images/family.png') }}" alt="Family">
                </button>
            </form>
            <!-- Visual and Hearing Impaired -->
            <form action="{{ route('customer.top.display') }}" method="GET" class="category-form">
                @csrf
                <input type="hidden" name="topCategory" value="Visual and Hearing Impaired">
                <button type="submit" class="category-btn">
                    <img src="{{ asset('images/visual-hearing.png') }}" alt="Visual and Hearing Impaired">
                </button>
            </form>
            <!-- Religious -->
            <form action="{{ route('customer.top.display') }}" method="GET" class="category-form">
                @csrf
                <input type="hidden" name="topCategory" value="Religious">
                <button type="submit" class="category-btn">
                    <img src="{{ asset('images/religious.png') }}" alt="Religious">
                </button>
            </form>
            <!-- English Friendly -->
            <form action="{{ route('customer.top.display') }}" method="GET" class="category-form">
                @csrf
                <input type="hidden" name="topCategory" value="English Friendly">
                <button type="submit" class="category-btn">
                    <img src="{{ asset('images/english-friendly.png') }}" alt="English Friendly">
                </button>
            </form>
        </div>
    </section>
@endsection
