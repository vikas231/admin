<div class="left-side-menu">

    <div class="h-100" data-simplebar>
        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Home</li>
                
                <li>
                    <a href="{{route('admin.dashboard')}}">
                        <i data-feather="airplay"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Users</li>

                <li>
                    <a href="{{url('admin/customers')}}">
                        <i class="fe-users"></i>
                        <span>Customer Management </span>
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fe-lock"></i>
                        <span> Logout</span>
                    </a>
                </li>

                
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End