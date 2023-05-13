<div class="col-2 h-100 overflow-auto" style="background-color:#E3E3E3">
    <div class="container-fluid d-flex justify-content-center py-5">
        <i class="bi bi-person-circle">Username</i>
    </div>

    <div class="container-fluid px-0">
        <ul class="list-group">
            <button class="w-100 list-group-item border-0 p-3 sidebar-button"
                style="background-color:#E3E3E3" type="button"
                onclick="window.location.href='{{ route('home') }}'">Home</button>
            <button class="w-100 list-group-item border-0 p-3" id="sidebar-button" style="background-color:#E3E3E3"
                type="button" onclick="window.location.href='{{ route('payment-home') }}'">Pay</button>
            <button class="w-100 list-group-item border-0 p-3 sidebar-button" style="background-color:#E3E3E3"
                type="button" onclick="window.location.href='{{ route('payment-history') }}'">Payment History</button>
            <button class="w-100 list-group-item border-0 p-3 sidebar-button" style="background-color:#E3E3E3"
                type="button" onclick="window.location.href='{{ route('email-history') }}'">Email History</button>
            <button class="w-100 list-group-item border-0 p-3 sidebar-button" style="background-color:#E3E3E3"
                type="button" onclick="window.location.href='{{ route('profile') }}'">My Profile</button>
        </ul>
    </div>
</div>
