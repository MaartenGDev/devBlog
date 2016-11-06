<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MaartenDev Blog</title>
    @section('assets')
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @show
</head>
<body>
<div class="overlay"></div>
<nav class="nav-bar">
    <div class="container">
        <ul>
            <li class="open-menu"><i class="fa fa-bars"></i></li>
            <li><a class="nav-brand" href="{{ url('/') }}">MaartenDev</a></li>
            @section('navigation')
                <li class="nav-item nav-left"><a href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
                </li>

                @role('admin')
                <li class="nav-item nav-left"><a href="{{ url('/dashboard') }}"><i class="fa fa-area-chart"
                                                                                   aria-hidden="true"></i>Dashboard</a>
                </li>
                @endrole
            @show

            @if (Auth::guest())
                <li class="nav-item nav-right"></i><a href="{{ url('/login') }}"><i class="fa fa-sign-in"
                                                                                    aria-hidden="true"></i>Login</a>
                </li>
                <li class="nav-item nav-right"><a href="{{ url('/register') }}"><i class="fa fa-paper-plane"
                                                                                   aria-hidden="true"></i>Register</a>
                </li>
            @else
                <li class="nav-item nav-right"><a href="#"><i class="fa fa-user"
                                                              aria-hidden="true"></i>{{ ucfirst(Auth::user()->name) }}
                    </a></li>
                <li class="nav-item nav-right"><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"
                                                                                 aria-hidden="true"></i>Logout</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
@section('page-header')
<header class="page-header"></header>
@show
<div class="md-container md-container-highlight">
    @include('common.notifications')
    @yield('content')
</div>
@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@show
</body>
</html>
