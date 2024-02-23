<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="text-align:center">
        <div class="image">
          <a href="{{ route('dashboard.index') }}">
          <img src="{{ asset('image/logopenabur.png') }}" alt="User Image" style="width: 50%;">
          <h5 class="text-white mt-3">BPK PENABUR Jakarta</h5>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2" style="font-size: 14px">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if (Auth::user()->role == "admin")
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-fax"></i>
              <p style="font-size: 14px">
                Menu Approval
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.data-cuti') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Cuti</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.data-report') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Report</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-calendar-week"></i>
              <p>
                Menu Status Cuti
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('dashboard.table-onhold') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Awaiting Approval</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dashboard.table-approved') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Approved</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dashboard.table-rejected') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Rejected</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p style="font-size: 14px">
                Menu Archive
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('users.users-table') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Cuti Bagian</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>