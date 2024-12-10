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




</head>

<body>
    <div id="app">
        <div class="container-fluid">
            <nav class="navbar nabvar-customer navbar-expand-md navbar-light shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
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
                                        <a href="#"><i class="logo-sm fa-solid fa-globe"></i></a> <span class="language mx-1 me-3">English</span>
                                        <a href="#"><i class="logo-sm fa-solid fa-calendar-days me-3"></i></i></a> 
                                        <a href="#"><i class="logo-sm fa-solid fa-envelope me-3"></i></a> 
                                        <a href="#" class="btn btn-outline-secondary btn-mypage me-2">Log In</a>
                                        <a href="#" class="btn btn-outline-secondary btn-logout">Register</a>
                                </div>   
                            @else
                                <li class="nav-item dropdown">
                                <div class="d-flex">
                                    <a href="#"><i class="logo-sm fa-solid fa-globe"></i></a> <span class="language mx-1 me-3">English</span>
                                    <a href="#"><i class="logo-sm fa-solid fa-calendar-days me-3"></i></i></a> 
                                    <a href="#"><i class="logo-sm fa-solid fa-envelope me-3"></i></a> 
                                    <a href="#" class="btn btn-outline-secondary btn-mypage me-2">My Page</a>
                                    <a href="#" class="btn btn-outline-secondary btn-logout">Log Out</a>
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
        </div>    
    </div>
</body>



</html>

