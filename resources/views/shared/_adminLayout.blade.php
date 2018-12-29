<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">

    <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>

    @yield('css')
    @yield('js')

    <title>@yield('title')</title>
</head>
<body>
    <header id="header">
        <span id="logo"></span>
        <nav id="nav">
            <a href="{{route('admin.home')}}" class="nav-link">Home</a>
            <a href="" class="nav-link">News</a>
            <a href="" class="nav-link">Discover</a>
            <a href="" class="nav-link">Search</a>
            <div class="nav-inner" nav-name="admin-panel">
                Admin Panel
                <div class="nav-container">
                    <a href="" class="nav-link">Request New Item</a>
                    <a href="" class="nav-link">Pending Items</a>
                    <a href="" class="nav-link">Completed Items</a>
                </div>
            </div>
        </nav>
        <div id="user-panel">
            <a href="" class="setting-link">Profile</a>
            <a href="" class="setting-link">Log Out</a>
        </div>
    </header>

    <div id="content">
      @yield('content')
    </div>
</body>
</html>