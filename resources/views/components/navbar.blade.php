<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">SDM | Pengajuan Cuti</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <span class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user-alt"></i>
          <small>{{ Auth::user()->name }} ({{ Auth::user()->role }})</small>
        </span>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a href="{{ route('auth.logout') }}" class="nav-link">
          <i class="fas fa-sign-out-alt"></i>
          <small>Logout</small>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->