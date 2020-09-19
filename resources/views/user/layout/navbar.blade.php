<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('my_profile')}}" class="nav-link">Home</a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto  " >
        <li class="nav-item ">
            <div class="dropdown">
                <i   class="fas fa-th-large dropdown-toggle" data-toggle="dropdown">

                </i>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('logout')}}" >
                        <i class="fas fa-sign-out-alt">&ensp;Log out</i>
                    </a>

                </div>
            </div>
        </li>
    </ul>


</nav>
<!-- /.navbar -->
