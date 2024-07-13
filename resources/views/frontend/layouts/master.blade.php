<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/bootstrap.css') }}" />
    <link href="{{ asset('assets/frontend/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/frontend/css/responsive.css') }}" rel="stylesheet" />

    @livewireStyles
</head>


<body>
    <div class="hero_area">
        @include('frontend.layouts.header')
    </div>

        @yield('content')

        @include('frontend.layouts.footer')

    <script src="{{ asset('assets/frontend/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/custom.js') }}"></script>
    @yield('scripts')
    @stack('scripts')
    @livewireScripts
</body>

</html>
