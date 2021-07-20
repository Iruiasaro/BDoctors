<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-color-primary">
            <div class="container">
                <a class="navbar-brand my-navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('imgs/logo-white2.png')}}" class="logo img-fluid p-3" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <i class="fa fa-bars text-white" aria-hidden="true"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @guest
                    <div class="navbar-nav flex-grow-1 justify-content-end text-white">
                        <span class="mr-3">Sei un dottore? <i class="fa fa-long-arrow-right" aria-hidden="true"></i> </span>
                    </div>
                    @endguest
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('register') }}"> Registrati </a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown text-white">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
        <div>
            <aside>
                <ul>
                    <li> <a href=""> Profilo </a> </li>
                    <li> <a href=""> Messaggi </a> </li>
                    <li> <a href=""> Statistiche</a> </li>
                     <li> <a href=""> Recensioni </a> </li>
                </ul>
            </aside>

            @yield('content')
            <footer class="p-4 mt-5 bg-color-primary d-flex justify-content-center">
                <ul>
                    <li><a href=""></a>Chi siamo</li>
                    <li><a href=""></a>Dottori</li>
                    <li><a href=""></a>Sponsorizzati</li>
                    <li><a href=""></a>Registrati</li>
                    <li><a href=""></a>Login</li>
                </ul>
                <ul>

                    <li><a href=""></a>Contatti</li>
                    <li><a href=""></a>Ricerca Avanzata</li>
                    <li><a href=""></a>Segnala un problema</li>
                    <li><a href=""></a>Sicurezza</li>
                    <li><a href=""></a>Accessibilità</li>

                </ul>
        </div>
        </footer>
    </div>
</body>
</html>
