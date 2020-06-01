<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Ion Icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <!-- Main -->
    <link rel="stylesheet" href="{{asset('client/css/style.css')}}">
    <!-- styles -->
    <link href="/css/app.css" rel="stylesheet"></link>

</head>
<body>
    <div id='app'>
        <!-- menu part start -->
        <section class="menu_part">
            <div class="container">
                <nav class="navbar navbar-expand navbar-white navbar-light">
                    <ul class="navbar-nav nav_list">
                        <li class="nav-item">
                            <a href="#">Home</a>
                        </li>
                        
                    </ul>
                    <ul class="navbar-nav ml-auto nav_list">
                        <li class="nav-item">
                            <a  href="{{ route('login') }}">
                                <i class="icon ion-md-person">
                                    <span style='margin-left:5px'>{{ __('Login') }}</span>
                                </i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#"><i class="icon ion-md-heart"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="#"><i class="icon ion-md-cart"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </section>
        <!-- menu part end -->
        <main class="py-4">
            @yield('content')
        </main>

    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="{{asset('client/js/script.js')}}"></script>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>

