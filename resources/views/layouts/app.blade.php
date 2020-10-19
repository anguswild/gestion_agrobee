<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gestión Agrobee') }}</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/styles.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap_limitless.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/colors.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/circle.css') }}" rel="stylesheet">




</head>
<body>
@include('inc.navbar')

<div class="page-content">
  @include('inc.sidebar')
  <div class="content-wrapper">
    @include('inc.pageheader')
    <div class="content">
      @include('inc.messages')
      @yield('content')
    </div>
  </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/moment.min.js') }}" ></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}" ></script>
<script src="{{ asset('js/blockui.min.js') }}" ></script>
<script src="{{ asset('js/app_limitless.js') }}" ></script>
<script src="{{ asset('js/bootstrap-datepicker.js') }}" ></script>
<script src="{{ asset('js/bootstrap-datepicker.es.min.js') }}" ></script>
<script src="{{ asset('js/select2.min.js') }}" ></script>
<script src="{{ asset('js/uniform.min.js') }}" ></script>
<script src="{{ asset('js/datatables.min.js') }}" ></script>
<script src="{{ asset('js/custom.js') }}" ></script>
@yield('scripts')

</body>
</html>
