<!-- ホテルアドミン用 -->

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- CSSのリンク -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- JSのリング -->
    <script src="{{ asset('js/notification.js') }}"></script>






</head>

<body>
    <div id="app">
        <div class="container-fluid">
            <nav class="navbar nabvar-hotel navbar-expand-md navbar-light shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('hotel.profile.show') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo-main">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <div class="d-flex">
                                    <a href="#"><img src="{{ asset('images/globe-solid.svg') }}" class="logo-sub"></a><span class="language mx-1 me-3">English</span>

                                    <a href="#" id="reservationModalLabel" class="notification-icon">
                                        <img src="{{ asset('images/calendar-days-solid.svg') }}" class="logo-sub me-3">
                                    </a>
                                    {{-- Include modal here --}}
                                    @include('layouts.modals.notification_hotel')

                                    <a href="{{ route('hotel.inquary.show') }}"><img src="{{ asset('images/envelope-solid.svg') }}" class="logo-sub me-3"></a> 
                                    
                                    <a href="{{ route('hotel.profile.show') }}" class="btn btn-outline-secondary btn-mypage me-2">My Page</a>
                                    <a href="#" class="btn btn-outline-secondary btn-logout" 
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Log Out
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </div>   
                        </ul>
                    </div>
                </div>
            </nav>


            <aside>
                <div class="col-md-2 sidebar-menu p-2">
                <!-- サイドメニュー -->
                    <div class="list-group">
                    <div class="mt-4"><h2>{{ Auth::user()->hotel->hotel_name }}</h2></div>

                        <a href="{{ route('hotel.profile.show') }}" class="list-group-item list-group-item-action mt-3 p-3 {{ request()->is('hotel/profile/*') ? 'active' : '' }}">Profile</a>
                        <a href="{{ route('hotel.room.show') }}" class="list-group-item list-group-item-action mt-3 p-3 {{ request()->is('hotel/room/*') ? 'active' : '' }}">Room List</a>
                        <a href="{{ route('hotel.price.show') }}" class="list-group-item list-group-item-action mt-3 p-3 {{ request()->is('hotel/price/*') ? 'active' : '' }}">Price Management</a>
                        <a href="{{ route('hotel.reservation.show_monthly') }}" class="list-group-item list-group-item-action mt-3 p-3 {{ request()->is('hotel/reservation/*') ? 'active' : '' }}">Reservation Management</a>
                        <a href="{{ route('hotel.review.list') }}" class="list-group-item list-group-item-action mt-3 p-3 {{ request()->is('hotel/review/*') ? 'active' : '' }}">Review Management</a>
                        <a href="{{ route('hotel.inquary.show') }}" class="list-group-item list-group-item-action mt-3 p-3 {{ request()->is('hotel/inquary/*') ? 'active' : '' }}">Inquary Management</a>
                    </div>
                </div>
            </aside>

           <main class="sidebar-content col-md-10 py-4">
                @yield('content')
            </main>
        </div>    
    </div>
</body>



</html>

