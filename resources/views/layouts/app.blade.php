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
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>


    <div class="fixed-top">
        @include('layouts.header')
    </div>

    <div class="container-fluid py-5">
        <div id="id" class="container-fluid d-flex" style="height:100vh">
            <div class="row w-100">

                @include('layouts.left-sidebar')

                <main class="col-10">
                    <div class="container py-3">
                        @yield('content')
                    </div>
                </main>

                @include('layouts.footer')
            </div>
        </div>
    </div>
</body>

</html>
