<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container d-flex justify-content-start">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <a href=""><i class="bi bi-list-ul p-3 text-secondary"></i></a>
    </div>

    <div>
        <i class="bi bi-bell-fill"></i>
        <i class="bi bi-person-circle mx-3" onclick="window.location.href='{{ route('profile') }}'"></i>
    </div>
</nav>
