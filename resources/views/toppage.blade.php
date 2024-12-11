@extends('layouts.customer')

@section('content')
{{-- Customer Toppage --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/topstyle.css') }}">
</head>
<body>
    <main>
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
    </main>
</body>
</html>
@endsection
