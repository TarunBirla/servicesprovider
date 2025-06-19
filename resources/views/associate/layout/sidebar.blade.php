  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari&display=swap" rel="stylesheet">



<div class="app-topstrip text-center py-6 px-3 w-100 d-lg-flex align-items-center justify-content-between">  
 <h1 style="font-family: 'Noto Sans Devanagari', sans-serif; letter-spacing: 0.5px; align-items: center">
                धर्म एव हतो हन्ति धर्मो रक्षति रक्षितः ⁠।
               तस्माद् धर्मं न त्यजामि मा नो धर्मो हतोऽवधीत् ⁠॥ 
              </h1>

    </div>
<aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <!-- <img src="https://sewamitra.up.gov.in/images/SewaMitra.png" alt="" /> -->
             Service Management
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
              <a class="sidebar-link" href="{{route('associate.dashboard')}}" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
              <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('services.index')}}" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Services</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('services.orders')}}" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Orders</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>