<!-- カスタマーマイページ用 -->

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
{{-- 音声読み上げ機能：Page読み込み時に説明する --}}
@yield('attributes', '<body>')

<body>
    <div id="app">
        <div class="container-fluid">
            <nav class="navbar nabvar-customer navbar-expand-md navbar-light shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('customer.top.list') }}">
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
                            <!-- 音声読み上げ機能：サウンドアイコン -->
                            <button id="soundToggle" class="btn btn-outline-secondary">
                                <i id="soundIcon" class="fas fa-volume-up logo-sub me-3"  ></i>
                            </button>
                            <div class="d-flex">
                                    <a href="#"><img src="{{ asset('images/globe-solid.svg') }}" class="logo-sub"></a><span class="language mx-1 me-3">English</span>

                                    <a href="#" id="reservationModalLabel" class="notification-icon">
                                        <img src="{{ asset('images/calendar-days-solid.svg') }}" class="logo-sub me-3">
                                    </a>
                                    {{-- Include modal here --}}
                                    @include('layouts.modals.notification_customer')
                
                                    <a href="{{ route('customer.inquary.show') }}"><img src="{{ asset('images/envelope-solid.svg') }}" class="logo-sub me-3"></a> 
                                    <a href="{{ route('customer.profile.show') }}" class="btn btn-outline-secondary btn-mypage me-2">My Page</a>
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
                    <div class="mt-4"><h2>{{ Auth::user()->username }}</h2></div>

                        <a href="{{ route('customer.profile.show') }}" class="list-group-item list-group-item-action mt-3 p-3 {{ request()->is('customer/profile/*') ? 'active' : '' }}">Profile</a>
                        <a href="{{ route('customer.reservation.reservationlist') }}" class="list-group-item list-group-item-action mt-3 p-3 {{ request()->is('customer/reservation/*') ? 'active' : '' }}">Reservation List</a>
                        <a href="{{ route('customer.review.list') }}" class="list-group-item list-group-item-action mt-3 p-3 {{ request()->is('customer/review/*') ? 'active' : '' }}">Review List</a>
                    </div>
                </div>
            </aside>

            <main class="sidebar-content col-md-10 py-4">
                @yield('content')
            </main>
        </div>    
    </div>
    
    {{-- 音声読み上げ機能 HTMLを読み込んでから実行 --}}
    {{-- api_text_to_speech.js --}}
    @stack('scripts') 
</body>
</html>