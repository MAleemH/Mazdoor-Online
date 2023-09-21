<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Mazdoor Online</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- fontawesome -->
    <link rel="stylesheet" href="{{asset('fontawesome-free-6.4.2-web/css/all.min.css')}}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                @guest
                <a class="navbar-brand" href="{{ route('welcome') }}">
                    Mazdoor Online
                </a>
                @else
                <a class="navbar-brand" href="{{ route('home') }}">
                    Mazdoor Online
                </a>
                @endguest
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto nav-menu">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('welcome') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('jobs') }}">Jobs Available</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('labours') }}">Labours Available</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about') }}">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                            </li>
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
        <div class="container">
            @guest
                <footer class="row row-cols-5 py-5 my-5 border-top">
                    <div class="col-6">
                        <a href="" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
                            Mazdoor Online
                        </a>
                        <p class="text-muted">&copy; 2023</p>
                    </div>

                    <div class="col-3">
                        <h5>Useful Links</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Jobs</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Labours</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                        </ul>
                    </div>

                    <div class="col-3">
                        <h5>Follow Us</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2">
                                <a href="#" class="nav-link p-0 text-muted">
                                    <i class="fa-brands fa-square-twitter"></i> Twitter
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="#" class="nav-link p-0 text-muted">
                                    <i class="fa-brands fa-square-instagram"></i> Instagram
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="#" class="nav-link p-0 text-muted">
                                    <i class="fa-brands fa-square-facebook"></i> Facebook
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="#" class="nav-link p-0 text-muted">
                                    <i class="fa-brands fa-linkedin"></i> LinkedIn
                                </a>
                            </li>
                        </ul>
                    </div>
                </footer>
            @else
                <div class="d-flex justify-content-between py-4 my-4 border-top">
                    <p>&copy; 2023 Company, Inc. All rights reserved.</p>
                    <ul class="list-unstyled d-flex">
                        <li class="ms-3">
                            <a class="link-dark" href="#">
                                <i class="fa-brands fa-square-twitter"></i>
                            </a>
                        </li>
                        <li class="ms-3">
                            <a class="link-dark" href="#">
                                <i class="fa-brands fa-square-instagram"></i>
                            </a>
                        </li>
                        <li class="ms-3">
                            <a class="link-dark" href="#">
                                <i class="fa-brands fa-square-facebook"></i>
                            </a>
                        </li>
                        <li class="ms-3">
                            <a class="link-dark" href="#">
                                <i class="fa-brands fa-linkedin"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            @endguest
        </div>
    </div>
</body>
</html>
