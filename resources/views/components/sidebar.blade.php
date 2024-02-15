<div class="page-loader-wrapper">
    <div class="loader">
        <div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
        <p>Please wait...</p>
        <div class="m-t-30">
            <img src="{{ asset('image/logopenabur.png') }}" alt="" style="width: 8%"><br>
            <span class="text-dark">SDM -PENGAJUAN CUTI</span>
        </div>
    </div>
</div>

<!-- Overlay For Sidebars -->
<!-- Top Bar -->
<nav class="navbar">
    <div class="col-12">
        <div class="navbar-header" style="background-color: #ffffff;">
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="" >
                <span class="text-dark">BPK PENABUR Jakarta</span>
            </a>
            </a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="javascript:void(0);" class="ls-toggle-btn" data-close="true"><i class="zmdi zmdi-swap"></i></a></li>
            <li><a href="" class="inbox-btn hidden-sm-down" data-close="true"><i class="zmdi zmdi-home"></i></a></li>
            <li class="dropdown menu-app hidden-sm-down"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"> <i class="zmdi zmdi-apps"></i></a>
                <ul class="dropdown-menu slideDown">
                    <li class="body">
                        <ul class="menu">
                            <li><a href=""><i class="zmdi zmdi-home"></i><span>Dashboard</span> </a></li>
                            <li><a href=""><i class="zmdi zmdi-blogger"></i><span>Form Ruangan</span></a></li>
                        </ul>
                    </li>
                </ul>
            </li>

        </ul>
        <ul class="nav navbar-nav navbar-right">
                <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                </a>
                <ul class="dropdown-menu slideDown">
                    <li class="header">NOTIFICATIONS</li>
                    <li class="footer"><a href="javascript:void(0);">View All Notifications</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image"> <img src="{{ asset('image/logopenabur.png') }}" width="48" height="48" alt="User">
        </div>
        <div class="info-container">
            <div class="name text-dark" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">Admin</div>
            <div class="email text-dark">PENGAJUAN CUTI</div>
            <div class="btn-group user-helper-dropdown text-dark"><i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="button"> keyboard_arrow_down </i>
                <ul class="dropdown-menu pull-right">
                    {{-- <li><a href="{{ route('admin.index') }}"><i class="material-icons">person</i>{{ Auth::user()->name }}</a></li> --}}
                    <li class="divider"></li>
                    {{-- <li><a href="{{ route('auth.logout') }}"><i class="material-icons">input</i>Sign Out</a></li> --}}
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="{{ route('admin.index-admin') }}"><i class="zmdi zmdi-view-dashboard"></i><span>Dashboard</span></a></li>
            <li><a href="{{ route('admin.index-admin') }}"><i class="zmdi zmdi-assignment-check"></i><span>Table Approved</span></a></li>
            <li><a href="{{ route('admin.index-admin') }}"><i class="zmdi zmdi-assignment-alert"></i><span>Table Not Approved</span></a></li>
            <li><a href="{{ route('admin.index-admin') }}"><i class="zmdi zmdi-wrap-text"></i><span>Form Pengajuan Cuti</span></a></li>
            <li class="header">ADMIN DASHBOARD</li>
            <li><a href="{{ route('admin.index-admin') }}"><i class="zmdi zmdi-view-web"></i></i><span>Admin Table</span></a></li>
            <li><a href="{{ route('admin.index-admin') }}"><i class="zmdi zmdi-label-alt"></i><span>Update Data</span></a></li>
            <li class="header">USERS DASHBOARD</li>
            <li><a href="{{ route('admin.index-admin') }}"><i class="zmdi zmdi-view-web"></i></i><span>Users Table</span></a></li>
        </ul>
    </div>
    <!-- #Menu -->
</aside>
</div>