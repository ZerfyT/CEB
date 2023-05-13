<nav class="navbar navbar-expand navbar-light bg-light shadow-sm px-2 py-1">
    <div class="container-fluid">

        {{-- Brand Name --}}
        <a class="navbar-brand fs-3 fw-bolder" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>

        {{-- Sidebar Toggle Button --}}
        <button id="sidebarToggler" class="navbar-toggler collapsed d-inline-block" type="button" data-toggle="collapse"
            data-target="#sidebar">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Navigation Links --}}
        <div class="collapse navbar-collapse" id="navLinks">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-bell-fill fs-4 mx-1"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-person-circle fs-4 mx-1"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
