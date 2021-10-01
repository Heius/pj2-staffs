<div class="sidebar" data-background-color="white" data-active-color="success">
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
        </a>

        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Hi, {{ Session::get('sName')}}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{Request::routeIs('welcome') ? 'active' : ''}}">
                <a href="{{ route('welcome') }}">
                    <i class="ti-panel"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{Request::routeIs('major.*') ? 'active' : ''}}">
                <a href="{{ route('major.index') }}">
                    <i class="ti-clipboard"></i>
                    <p>Major Management</p>
                </a>
            </li>
            <li class="{{Request::routeIs('class.*') ? 'active' : ''}}">
                <a href="{{ route ('class.index') }}">
                    <i class="ti-layout"></i>
                    <p>Class Management</p>
                </a>
            </li>
            <li class="{{Request::routeIs('student.*') ? 'active' : ''}}">
                <a href="{{ route ('student.index') }}">
                    <i class="ti-id-badge"></i>
                    <p>Students</p>
                </a>
            </li>
            <li class="{{Request::routeIs('subject.*') ? 'active' : ''}}">
                <a href="{{ route ('subject.index') }}">
                    <i class="ti-ruler-alt"></i>
                    <p>Subjects</p>
                </a>
            </li>
            <li class="{{Request::routeIs('mark.*') ? 'active' : ''}}">
                <a href="{{ route ('mark.index') }}">
                    <i class="ti-pin-alt"></i>
                    <p>Marks</p>
                </a>
            </li>
        </ul>
    </div>
</div>