<nav class="navbar navbar-dark bg-dark navbar-expand-md">
    <div class="container-fluid">

        {{-- Brand Name --}}
        <a class="navbar-brand fs-3 fw-bolder" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>

        {{-- Sidebar Toggle Button --}}
        {{-- <button id="sidebarToggler" class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navLinks">
            <span class="navbar-toggler-icon"></span>
        </button> --}}

        {{-- Navigation Links --}}
        <div class="navigation collapse navbar-collapse justify-content-start" id="navLinks">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Procurement</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">CEB care</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link btn btn-warning rounded-pill me-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-warning rounded-pill" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li> -->

                <li class="nav-item dropdown me-1">
                    <!-- <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle fs-4 mx-1"></i>
                    </a> -->
                    <ul class="dropdown-menu">
                        @guest
                            <!-- <li class="nav-item">
                                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                                    </li> -->
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
        <div class="d-flex right-pane">
            <div class="login">
                <a class="btn btn-warning rounded-pill me-2" href="{{ route('login') }}">{{ __('Login') }}</a>
            </div>
            <div class="register">
                <a class="btn btn-warning rounded-pill" href="{{ route('register') }}">{{ __('Register') }}</a>
            </div>
        </div>
    </div>
</nav>
