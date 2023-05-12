{{-- <div id="side-bar" class="col-2 mh-100" style="background-color:#E3E3E3">

    <div class="container d-flex justify-content-center py-5" style="background-color:#D9D9D9">
        <i class="bi bi-person-circle">Username</i>
    </div>

    <div class="container px-0">
        <ul class="list-group" >
            <button class="w-100 list-group-item border-0 p-3" id="butn">Home</button>
            <button class="w-100 list-group-item border-0 p-3" id="butn">Pay</button>
            <button class="w-100 list-group-item border-0 p-3" id="butn">View Account Bill</button>
            <button class="w-100 list-group-item border-0 p-3" id="butn">My Profile</button>
            <button class="w-100 list-group-item border-0 p-3" id="butn">Email History</button>
        </ul>
    </div>
</div> --}}

<nav id="sidebar" class="">
    <div class="sidebar-header">
        <h3>Username</h3>
        <i class="bi bi-person-circle"></i>
    </div>

    <ul class="list-unstyled components">
        <p>Dummy Heading</p>
        <li class="active">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="#">Home 1</a>
                </li>
                <li>
                    <a href="#">Home 2</a>
                </li>
                <li>
                    <a href="#">Home 3</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">About</a>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">Portfolio</a>
        </li>
        <li>
            <a href="#">Contact</a>
        </li>
    </ul>

    <ul class="list-unstyled CTAs">
        <li>
            <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
        </li>
        <li>
            <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
        </li>
    </ul>
</nav>
