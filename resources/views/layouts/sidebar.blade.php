{{--

    <button class="w-100 list-group-item border-0 p-3" id="butn">Home</button>
    <button class="w-100 list-group-item border-0 p-3" id="butn">Pay</button>
    <button class="w-100 list-group-item border-0 p-3" id="butn">View Account Bill</button>
    <button class="w-100 list-group-item border-0 p-3" id="butn">My Profile</button>
    <button class="w-100 list-group-item border-0 p-3" id="butn">Email History</button>

--}}

<nav id="sidebar" class="">
    <div class="sidebar-header p-3 d-flex flex-column justify-content-center align-items-center">
        <img class="img-fluid" src="https://img.icons8.com/color/96/circled-user-male-skin-type-3--v1.png"
            alt="user-icon" />
        <div class="fs-3">{{ Auth::user()->name }}</div>
    </div>

    <ul class="list-unstyled components py-3 px-0">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">My Accounts</a>
        </li>
        <li>
            <a href="#">Payments</a>
        </li>
        <li>
            <a href="#">Contacts</a>
        </li>
        <li>
            <a href="#">My Profile</a>
        </li>
    </ul>
</nav>
