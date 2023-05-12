<nav class="navbar navbar-expand navbar-light bg-light shadow-sm">
    <div class="container-fluid">

        {{-- Brand Name --}}
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>

        {{-- <button id="sidebarCollapse" class="navbar-btn text-center" type="button">
            <i class="bi bi-list" style="font-size: 2rem; color: cornflowerblue;"></i>
        </button> --}}

        {{-- Sidebar Toggle Button --}}
        <button id="sidebarToggler" class="navbar-toggler collapsed d-inline-block" type="button" data-toggle="collapse"
            data-target="#sidebar">
            <span class="navbar-toggler-icon"></span>
            {{-- <span class="icon-bar"></span>
            <span class="icon-bar"></span> --}}
            {{-- <i class="bi bi-list" style="font-size: 2rem; color: cornflowerblue;"></i> --}}
        </button>

        {{-- Navigation Links --}}
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="#"><i class="bi bi-bell-fill"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="bi bi-person-circle mx-3"></i></a>
            </li>
        </ul>
        {{-- <button><i class="bi bi-list-ul p-3 text-secondary"></button> --}}
    </div>
</nav>
