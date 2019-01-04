<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <script src="{{URL::asset('js/jquery-3.3.1.min.js')}}"></script>
    
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    @yield('css')
    @yield('js')

    <title>@yield('title')</title>
</head>
<body>
    <header id="header">
        <span id="logo"></span>
        <nav id="nav">
            <a href="{{route('home')}}" class="nav-link">Home</a>
            <a href="{{route('news')}}" class="nav-link">News</a>
            <a href="{{route('search')}}" class="nav-link">Search</a>
            @auth
                @if(Auth::user()->role == "admin")
                    <div class="nav-inner" nav-name="admin-panel">
                        Admin Panel
                        <div class="nav-container">
                            <a href="{{route('admin.admin-panel.requestNewItem')}}" class="nav-link">Request New Item</a>
                            <a href="{{route('admin.admin-panel.shoeRequests')}}" class="nav-link">View Requests</a>
                        </div>
                    </div>
                @endif
            @endauth
        </nav>
        @guest
            <div id="user-panel">
                <a href="{{route('login')}}" class="setting-link">Login</a>
            </div>
        @endguest
        @auth
            <div id="user-panel">
                <a href="" class="setting-link">Profile</a>
                <a href="{{route('logout')}}" class="setting-link">Log Out</a>
            </div>
        @endauth
    </header>

    <div id="content">
      @yield('content')
    </div>
</body>
</html>