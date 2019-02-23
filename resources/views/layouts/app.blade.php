<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="flex h-16 items-center justify-between navbar-laravel">
            <div>
                <h1>Recipes App</h1>
            </div>
            <div>
                <ul>
                    <li><a href="/">user name go here</a></li>
                    <li><a>Logout</a></li>
                </ul>
            </div>
        </nav>

        <main class="bg-grey-lightest">
            @yield('content')
        </main>
    </div>
</body>
</html>
