<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @guest
                    @else
                    <ul class="navbar-nav mr-auto ml-2">
                        <li class="nav-item">
                            <form class="form-inline my-2 my-lg-0" method="POST" action="{{url('/search')}}">
                                @csrf
                                <input class="form-control mr-sm-2" type="search" value="{{ isset($searchTerm) ? $searchTerm : '' }}" name="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </li>
                    </ul>
                    @endguest

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="modal" data-target="#createPost">{{ __('Create Post') }}</a>
                                {{--                                <a class="nav-link" href="{{ url('/newpost') }}">{{ __('Create Post') }}</a>--}}
                            </li>
                            <li class="nav-item dropdown align-self-center ml-4">
                                <a id="navbarRequestsDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="{{ asset('assets/group.svg')}}" style="width: 25px; height: 25px;"><span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarRequestsDropdown">
                                    @foreach(auth()->user()->receivedRequests()->whereNull('Accepted')->orderBy('RequestedDate', 'DESC')->get() as $receivedRequest)
                                        <a class="dropdown-item" href="{{ url('profile/' . $receivedRequest->RequesterId) }}">
                                            {{ $receivedRequest->Requester->UserName }} wants to connect!
                                        </a>
                                    @endforeach
                                </div>
                            </li>
                            <li class="nav-item align-self-center ml-3 mr-2">
                                <a id="navbarAlerts" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="{{ asset('assets/notification.svg')}}" style="width: 25px; height: 25px;"><span class="caret"></span>
                                </a>
                            </li>
                            <li class="nav-item dropdown ml-2">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->UserName }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('profile') }}">
                                        {{ __('Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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

        <main class="mt-lg-5 pt-5">
            <div class="modal fade" id="createPost" tabindex="-1" role="dialog" aria-labelledby="createPost" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div id="donationForm">

                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
        </main>
    </div>
</body>
</html>
