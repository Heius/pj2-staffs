<nav class="navbar navbar-ct-success">
    <div class="container-fluid">
        <div class="navbar-minimize">
            <button id="minimizeSidebar" class="btn btn-fill btn-icon btn-success"><i class="ti-more-alt"></i></button>
        </div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">


            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#notifications" class="dropdown-toggle btn-rotate" data-toggle="dropdown">
                        <i class="ti-angle-down"></i>
                        <p class="hidden-md hidden-lg">
                            Notifications
                            <b class="caret"></b>
                        </p>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('info.index')}}" class="btn-magnify">
                            <i class="ti-user "></i>
                            Profile
                        </a></li>
                        @if(session('Permission') == 1)
                        <li>
                            <a href="{{route('staff.index')}}" class="btn-magnify">
                                <i class="ti-user "></i>
                            Employee
                            </a>  
                        </li>
                        @endif
                        <li><a href="{{ route('logout') }}" class="btn-danger btn-fill btn-wd btn-rotate">
                            <i class="ti-power-off"></i>
                            Log Out
                        </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>