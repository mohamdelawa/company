
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div hidden>{{$user = \Illuminate\Support\Facades\Auth::user()}}</div>
    <!-- Brand Logo -->
    <a  class="brand-link">
        <img src="../../index/assets/img/logo.png"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Pro.W.L</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{$user->profile->image_profile}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{$user->profile->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('my_profile')}}" class="nav-link">
                        <i class="nav-icon fas  fa-user-alt"></i>
                        <p>
                            Profile

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('my_projects')}}" class="nav-link">
                        <i class="nav-icon fa fa-table"></i>
                        <p>
                            My Projects

                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('view_add_my_project')}}" class="nav-link">
                        <i class="nav-icon fa fa-plus"></i>
                        <p>
                            Add Project

                        </p>
                    </a>
                </li>
                @can('role_admin')
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link active">

                            <p>
                                Admin
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('management_users')}}" class="nav-link">
                                    <i class="nav-icon fa fa-table"></i>
                                    <p>
                                        Management Users

                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('management_projects')}}" class="nav-link">
                                    <i class="nav-icon fa fa-table"></i>
                                    <p>
                                        Management Projects

                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('management_messages')}}" class="nav-link">
                                    <i class="nav-icon fa fa-table"></i>
                                    <p>
                                        Management Messages

                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('view_add_user')}}" class="nav-link">
                                    <i class="nav-icon fa fa-plus"></i>
                                    <p>
                                        Add User

                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('view_add_project')}}" class="nav-link">
                                    <i class="nav-icon fa fa-plus"></i>
                                    <p>
                                        Add Project

                                    </p>
                                </a>
                            </li>


                        </ul>
                    </li>

                    @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
