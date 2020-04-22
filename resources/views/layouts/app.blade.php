<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Plutón</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-active shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   <strong>Plutón</strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('create_user') }}">{{ __('Cambiar contraseña') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('create_user') }}">{{ __('Registrar Usuario') }}</a>
                            </li>
                        @endif
                            <li>
                                <a href=""></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
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
        @guest
        @else
        <nav class="navegacion w-100  p-3 d-flex flex-row position-relative">
            <div class="dropdown pr-3 pr-lg-5">
                <a class="btn dropdown-toggle text-white font-weight-bold" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Movimientos
                </a>
                <div class="dropdown-menu submenu-movimientos" style="" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item text-primary py-2 text-left" href="">Facturación</a>
                    <a class="dropdown-item text-primary py-2 text-left" href="#">Inventarios</a>
                </div>
            </div>
            <div class="dropdown">
                <a class="btn dropdown-toggle text-white font-weight-bold" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Consultas
                </a>
                <div class="dropdown-menu submenu-movimientos" style="" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item text-primary py-2 text-left" href="{{route('list_entries')}}">Entradas</a>
                <a class="dropdown-item text-primary py-2 text-left" href="{{route('list_products')}}">Productos</a>
                <a class="dropdown-item text-primary py-2 text-left" href="{{route('list_categories')}}">categorías productos</a>
                <a class="dropdown-item text-primary py-2 text-left" href="{{route('list_user')}}">Usuarios</a>
                </div>
            </div>
        </nav>  
        @endguest

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @section('footer') 
    <script src="{{ asset('js/scripts.js') }}"></script>
    @show
</body>
</html>
