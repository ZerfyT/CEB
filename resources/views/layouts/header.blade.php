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
                <li class="nav-item dropdown me-1">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-person-circle fs-4 mx-1"></i>
                    </a>
                    <ul class="dropdown-menu">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }} <i class="bi bi-x-circle-fill"></i>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </li>
                        @endguest
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
