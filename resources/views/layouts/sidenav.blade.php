<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <img class="img-80 img-radius" src="{{ Auth::user()->avatar ?? asset('assets/images/no-image.jpg') }}"
                    alt="User-Profile-Image">
                <div class="user-details">
                    <span id="more-details">{{ Auth::user()->first_name ?? 'John Doe' }}<i
                            class="fa fa-caret-down"></i></span>
                </div>
            </div>

            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        <a href="{{ route('profile.edit') }}"><i class="ti-user"></i>View Profile</a>
                        <a href="#"><i class="ti-settings"></i>Settings</a>
                        <form action="{{ route('logout') }}" method="POST" class="">@csrf
                            <button type="submit" class="form-control"><i class="ti-layout-sidebar-left"></i>Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        {{-- <div class="p-15 p-b-0">
            <form class="form-material">
                <div class="form-group form-primary">
                    <input type="text" name="footer-email" class="form-control" required="">
                    <span class="form-bar"></span>
                    <label class="float-label"><i class="fa fa-search m-r-10"></i>Search
                        Friend</label>
                </div>
            </form>
        </div> --}}
        <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Layout</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="active">
                <a href="{{ route('dashboard') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i><b>c</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Components</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="{{ route('users.index') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-user"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Manage Users</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ route('permissions.index') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-id-badge"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Permission</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ route('roles.index') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-pencil-alt2"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Roles</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('setting.edit', 1) }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-settings"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="">setting</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
    </div>
</nav>
