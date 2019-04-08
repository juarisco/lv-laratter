<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div id="app" class="container">
        <!-- As a link -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laratter') }}</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <form action="/messages">
                            {{-- {{ csrf_field() }} --}}
                            <div class="input-group">
                                <input class="form-control" type="text" name="query" placeholder="@lang('app.search')..." required>
                                <span class="input-group-btn">
                                    <button class="btn btn-outline-success">@lang('app.search')</button>
                                </span>
                            </div>
                        </form>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        @if (app()->getLocale()=='es')
                            <a href="/locale?lang=en" class="nav-link">English</a>
                        @else
                            <a href="/locale?lang=es" class="nav-link">Español</a>
                        @endif
                    </li>
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            Noficaciones <span class="caret"></span>
                        </a>
                        <notifications-component :user="{{ Auth::user()->id }}"></notifications-component>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                    
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>        

        @yield('content')
        
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
