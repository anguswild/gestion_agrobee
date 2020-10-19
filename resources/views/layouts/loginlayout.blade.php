<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AgroBee Chile') }}</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/styles.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap_limitless.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/colors.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('js/blockui.min.js') }}" defer></script>
    <script src="{{ asset('js/app_limitless.js') }}" defer></script>


</head>
<body>

        <div class="page-content">
            @yield('content')
        </div>

</body>
</html>
