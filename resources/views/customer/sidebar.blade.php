<nav id="sidebar" class="">
    <div class="sidebar-header p-3 d-flex flex-column justify-content-center align-items-center">
        <img class="img-fluid" src="https://img.icons8.com/color/96/circled-user-male-skin-type-3--v1.png"
            alt="user-icon" />
        <div class="fs-3">Username</div>
        <div class="fs-5">Customer</div>
    </div>

    <ul class="list-unstyled components py-3 px-0">
        <li>
            <a href="{{route('customer.home')}}">Home</a>
        </li>
        <li>
            <a href="{{route('customer.payment')}}">Payments</a>
        </li>
        <li>
            <a href="{{route('customer.account')}}">Account</a>
        </li>
        <li>
            <a href="{{route('customer.details')}}">Bill Deatails</a>
        </li>
        <li>
            <a href="{{route('customer.profile')}}">My Profile</a>
        </li>
    </ul>
</nav>
