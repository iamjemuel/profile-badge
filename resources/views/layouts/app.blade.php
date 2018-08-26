<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Advance & Conquer Conference | Light Church</title>

    {{-- Bootstrap Core Stylesheet --}}
    <link rel="stylesheet" href="{{ asset('lib/bootstrap4/css/bootstrap-reboot.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/bootstrap4/css/bootstrap.min.css') }}">

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="{{ asset('lib/font-awesome-4.7.0/css/font-awesome.css') }}">

    {{-- Bootswatch Theme: Minty --}}
    <link rel="stylesheet" href="{{ asset('lib/bootstrap4/css/minty.theme.css') }}">

    {{-- Styles --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @stack('styles')
</head>
<body>
    @yield('content')

    @include('layouts.footer')
    
    {{-- Jquery --}}
    <script src="{{ asset('lib/jquery/jquery-3.3.1.min.js') }}"></script>

    {{-- Bootstrap JS Core --}}
    <script src="{{ asset('lib/bootstrap4/js/bootstrap.bundle.min.js') }}"></script>

    {{-- Bootstrap Notify --}}
    <script src="{{ asset('lib/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    {{-- Global Function of JS --}}
    <script src="{{ asset('js/global-function.js') }}"></script>

    {{-- Load dynamically internal js depending on page load  --}}
    @stack('scripts')
</body>
</html>
