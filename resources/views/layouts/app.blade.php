<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Site Name -->
    <title>@yield('title')</title>

    <!-- Styles -->
    @include('layouts._css')

    <!-- Top JS -->
    @include('layouts._js')
</head>
<body>

    <div id="app">
        <!-- Site Navigation -->
        @include('layouts._site_nav')

        <!-- Site Content -->
        @yield('content')
    </div>

    @include('layouts._modals')

</body>
</html>
