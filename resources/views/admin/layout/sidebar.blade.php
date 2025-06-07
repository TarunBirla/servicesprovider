 <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="{{ url('/admin') }}" class="text-nowrap logo-img">
                Service Management
            <!-- <img src="{{ asset('assets/admin/assets/images/logo.png') }}" alt="logo" class="img-fluid" width="150"> -->
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-6"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('/admin/dashboard') }}" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('/admin/users') }}" aria-expanded="false">
                <i class="ti ti-users"></i>
                <span class="hide-menu">Users</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('/admin/associates') }}" aria-expanded="false">
                <i class="ti ti-user-plus"></i>
                <span class="hide-menu">Associates</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('/admin/plans') }}" aria-expanded="false">
                <i class="ti ti-package"></i>
                <span class="hide-menu">Plans</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('/admin/locations') }}" aria-expanded="false">
                <i class="ti ti-map"></i>
                <span class="hide-menu">Locations</span>
              </a>
            </li>
            
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('/admin/transactions') }}" aria-expanded="false">
                <i class="ti ti-exchange"></i>
                <span class="hide-menu">Transactions</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('/admin/settings') }}" aria-expanded="false">
                <i class="ti ti-settings"></i>
                <span class="hide-menu">Settings</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('/admin/logout') }}" aria-expanded="false">
                <i class="ti ti-logout"></i>
                <span class="hide-menu">Logout</span>
              </a>
            </li>
            <!-- ---------------------------------- -->
            <!-- Dashboard -->
        


          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>