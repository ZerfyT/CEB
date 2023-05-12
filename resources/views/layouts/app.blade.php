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

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">

        {{-- @include('layouts.sidebar') --}}
        @yield('sidebar')

        <div class="main-content w-100">

            @include('layouts.header')

            <main class="py-4">
                @yield('content')
            </main>

            @include('layouts.footer')

        </div>

    </div>

</body>

</html>
