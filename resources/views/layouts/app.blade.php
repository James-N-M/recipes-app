<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{{ asset('storage/file/favicon-cutlery.ico') }}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ ('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <nav class="bg-blue-light flex h-16 items-center justify-between navbar-laravel">
            <div class="flex items-center">
                <i class="fas fa-utensils text-3xl ml-10 mr-5"></i>
                <a class="no-underline text-black" href="/">
                    <h1 class="font-thin">Recipes App</h1>
                </a>
            </div>
            <div>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                    <i class="text-white mr-6 fas fa-sign-out-alt text-3xl"></i>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </nav>

        <main class="bg-grey-lightest">
            @yield('content')
        </main>
    </div>
</body>
</html>
