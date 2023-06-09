<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    {{-- Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="wrapper d-flex align-items-stretch justify-content-between">

        {{-- @include('layouts.sidebar') --}}
        @yield('sidebar')

        <div class="main-content w-100 h-100 d-flex flex-column justify-content-between">

            @include('layouts.header')

            <main class="container p-0 m-0">
                @yield('content')

            </main>

            @include('layouts.footer')

        </div>

    </div>

    @if ($errors->any())
        @include('components.alert_error', ['message' => $errors->first()])
    @endif

    @if (session('error'))
        @include('components.alert_error', ['message' => session('error')])
    @endif

    @if (session('success'))
        @include('components.alert_success', ['message' => session('success')])
    @endif

    @stack('scripts')

</body>

</html>
