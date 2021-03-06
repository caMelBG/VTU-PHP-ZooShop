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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">

                <!-- Left Side Of Navbar -->
                <ul class="nav">
                    @if ( Auth::user() != null && Auth::user()->hasRole('admin') == true)
                        <li><a class="btn btn-default"href="{{ url('home') }}"><i class="fa fa-list"></i> <span>Dashboard</span></a></li>
                        <li><a class="btn btn-default"href="{{ url('animal') }}"><i class="fa fa-list"></i> <span>Animals</span></a></li>
                        <li><a class="btn btn-default"href="{{ url('animalType') }}"><i class="fa fa-list"></i> <span>Types</span></a></li>
                        <li><a class="btn btn-default"href="{{ url('animalBreed') }}"><i class="fa fa-list"></i> <span>Breeds</span></a></li>
                        <li><a class="btn btn-default"href="{{ url('users') }}"><i class="fa fa-list"></i> <span>Users</span></a></li>
                        <li><a class="btn btn-default"href="{{ url('admin/images') }}"><i class="fa fa-list"></i> <span>Images</span></a></li>
                    @endif
                    &nbsp;
                </ul>
                <div class="row">
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li>
                                <a href="{{ route('login') }}">Login</a>
                                |
                                <a href="{{ route('register') }}">Register</a>
                            </li>
                        @else
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }}
                                </a>
                                |
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
