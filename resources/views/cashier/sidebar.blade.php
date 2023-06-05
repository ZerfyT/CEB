<nav id="sidebar" class="">
    <div class="sidebar-header p-3 d-flex flex-column justify-content-center align-items-center">
        <img class="img-fluid" src="https://img.icons8.com/color/96/circled-user-male-skin-type-3--v1.png"
            alt="user-icon" />
        <div class="fs-3">Username</div>
        <div class="fs-5">Cashier</div>
    </div>

    <ul class="list-unstyled components py-3 px-0">
        <li>
            <a href="{{ route('cashier.home') }}">Home</a>
        </li>
        <li>
            <a href="{{ route('payment-home') }}">Customers</a>
        </li>
        <li>
            <a href="{{ route('payment-history') }}">Payments History</a>
        </li>
        <li>
            <a href="{{ route('email-history') }}">Email History</a>
        </li>
        <li>
            <a href="{{ route('profile') }}">My Profile</a>
        </li>
    </ul>
</nav>
