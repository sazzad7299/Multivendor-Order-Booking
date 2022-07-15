<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js', 'themes/admin') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css', 'themes/admin') }}" rel="stylesheet">
</head>
<body class="h-screen font-sans antialiased leading-none bg-gray-100">
    <div id="app">
       

        @yield('content')
    </div>
</body>
</html>