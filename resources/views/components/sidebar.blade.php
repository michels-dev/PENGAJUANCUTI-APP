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
        <ul class="nav navbar-nav navbar-left">
            <li><a href="javascript:void(0);" class="ls-toggle-btn" data-close="true"><i class="zmdi zmdi-swap text-dark"></i></a></li>
            <li><a href="{{ route('auth.logout') }}" class="mega-menu xs-hide" data-close="true"><i class="zmdi zmdi-power text-dark"></i></a></li>
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
                <li class="mega-menu xs-hide">Halo! {{ Auth::user()->name }} ({{ Auth::user()->role }})</li>
                <li><a class="mega-menu xs-hide" data-close="true"></a></li>
            </li>
        </ul>
    </div>
</nav>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image"> <img src="{{ asset('image/logopenabur.png') }}" width="50" height="50" alt="User">
        </div>
        <div class="info-container">
            <div class="name text-dark">SDM</div>
            <div class="text-dark">Pengajuan Cuti</div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="{{ route('dashboard.index') }}"><i class="zmdi zmdi-view-dashboard"></i><span>Dashboard</span></a></li>
            <li><a href="{{ route('dashboard.form-cuti') }}"><i class="zmdi zmdi-wrap-text"></i><span>Form Pengajuan Cuti</span></a></li>
            <li><a href=""><i class="zmdi zmdi-bookmark"></i><span>Cuti Approved</span></a></li>
            <li><a href=""><i class="zmdi zmdi-bookmark"></i><span>Cuti Rejected</span></a></li>
            @if (Auth::user()->role == "admin")
            <li class="header">ADMIN DASHBOARD</li>
            <li><a href="{{ route('admin.admin-table') }}"><i class="zmdi zmdi-view-web"></i></i><span>Admin Table</span></a></li>
            <li><a href=""><i class="zmdi zmdi-label-alt"></i><span>Update Data</span></a></li>
            @endif
            <li class="header">USERS DASHBOARD</li>
            <li><a href=""><i class="zmdi zmdi-view-web"></i></i><span>Users Table</span></a></li>
        </ul>
    </div>
    <!-- #Menu -->
</aside>
</div>