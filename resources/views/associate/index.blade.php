@extends('associate.layout.main')
@section('content')
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!-- Sidebar Start -->
    
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      
      <!--  Header End -->
      <div class="body-wrapper-inner">
        <div class="container-fluid">
          <!--  Row 1 -->
          <div class="row">
  <!-- Total Services Card -->
  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-4">
    <div class="card shadow-sm">
      <div class="card-body text-center">
        <h5 class="card-title">Total Services</h5>
        <h2 class="text-primary" id="totalServices">123</h2>
      </div>
    </div>
  </div>

  <!-- Total Orders Card -->
  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-4">
    <div class="card shadow-sm">
      <div class="card-body text-center">
        <h5 class="card-title">Total Orders</h5>
        <h2 class="text-success" id="totalOrders">456</h2>
      </div>
    </div>
  </div>
</div>

        </div>
      </div>
    </div>
  </div>
  @endsection