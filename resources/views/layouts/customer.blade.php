<!-- カスタマー用 -->

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
                            <!-- Authentication Links -->
                            @guest
                                <div class="d-flex">
                                    <a href="#"><img src="{{ asset('images/globe-solid.svg') }}" class="logo-sub"></a><span class="language mx-1 me-3">English</span>
                                    
                                    <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-mypage me-2">Log In</a>
                                    <a href="{{ route('register.top') }}" class="btn btn-outline-secondary btn-logout">Register</a>
                                </div>   
                            @else
                                <li class="nav-item dropdown">
                                <div class="d-flex">
                                    <a href="#"><img src="{{ asset('images/globe-solid.svg') }}" class="logo-sub"></a><span class="language mx-1 me-3">English</span>

                                    <a href="#" id="reservationModalLabel" class="notification-icon">
                                        <img src="{{ asset('images/calendar-days-solid.svg') }}" class="logo-sub me-3">
                                    </a>
                                    {{-- Include modal here --}}
                                    @include('layouts.modals.notification_customer')

                                    <a href="{{ route('customer.inquary.show') }}"><img src="{{ asset('images/envelope-solid.svg') }}" class="logo-sub me-3"></a>
                                    <!-- chatifyへのリンク↓ -->
                                    {{-- <a href="{{ route(config('chatify.routes.prefix')) }}"><img src="{{ asset('images/envelope-solid.svg') }}" class="logo-sub me-3"></a>  --}}

                                    <a href="{{ route('customer.profile.show') }}" class="btn btn-outline-secondary btn-mypage me-2">My Page</a>
                                    <a href="#" class="btn btn-outline-secondary btn-logout" 
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Log Out
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>   
                                </li>
                            @endguest
                            
                        </ul>
                    </div>
                </div>
            </nav>

           <main class="content py-4">
                @yield('content')
            </main>
            <footer class="footer">
                <div class="container">
                    <p>&copy; {{ date('Y') }} Your Choice</p>

                </div>
            </footer>
        </div>    
    </div>
</body>



</html>

