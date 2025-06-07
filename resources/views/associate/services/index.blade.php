@extends('associate.layout.main')
@section('content')




  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!--  App Topstrip -->
    <div class="app-topstrip bg-dark py-6 px-3 w-100 d-lg-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center justify-content-center gap-5 mb-2 mb-lg-0">
        <a class="d-flex justify-content-center" href="#">
          <img src="assets/associate/assets/images/logos/logo-wrappixel.svg" alt="" width="150">
        </a>

        
      </div>

      <div class="d-lg-flex align-items-center gap-2">
        <h3 class="text-white mb-2 mb-lg-0 fs-5 text-center">Check Flexy Premium Version</h3>
        <div class="d-flex align-items-center justify-content-center gap-2">
          
          <div class="dropdown d-flex">
            <a class="btn btn-primary d-flex align-items-center gap-1 " href="javascript:void(0)" id="drop4"
              data-bs-toggle="dropdown" aria-expanded="false">
              <i class="ti ti-shopping-cart fs-5"></i>
              Buy Now
              <i class="ti ti-chevron-down fs-5"></i>
            </a>
          </div>
        </div>
      </div>

    </div>
    <!-- Sidebar Start -->
    
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      
      <!--  Header End -->
      <div class="body-wrapper-inner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card p-5">
                        <div class="container"   class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
                                data-sidebar-position="fixed" data-header-position="fixed">
                            <h2>Services List</h2>
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div> 
                            @endif
                            @if(session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            <div class="d-flex justify-content-end mb-4">
                                
                                <a href="{{ route('services.create') }}" class="btn btn-primary">Create New Service</a>
                            </div>
                            
                                 <div class="table-responsive mt-4">
                                    <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                                    <thead>
                                        <tr>
                                        <th scope="col" class="px-0 text-muted"> id</th>
                                        <th scope="col" class="px-0 text-muted">Title</th>
                                        <th scope="col" class="px-0 text-muted">Category</th>
                                        <th scope="col" class="px-0 text-muted"> Description</th>
                                        <th scope="col" class="px-0 text-muted text-end">status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($services as $service)
                                        <tr>
                                            <td class="px-0">{{ $service->id }}</td>
                                            <td class="px-0">{{ $service->title }}</td>
                                            <td class="px-0">{{ $service->category->name }}</td>
                                            <td class="px-0">{{ $service->description }}</td>
                                            <td class="px-0 text-end">
                                                @if($service->status)
                                                <span class="badge bg-success">Active</span>
                                                @else
                                                <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-4">
                                    <div>
                                        <span class="text-muted">Showing {{ $services->firstItem() }} to {{ $services->lastItem() }} of {{ $services->total() }} entries</span>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <div class="py-6 px-6 text-center">
            <p class="mb-0 fs-4">Design and Developed by <a href="#" class="pe-1 text-primary text-decoration-underline">infoharry.in</a> 
              <span class="text-secondary">|</span> All rights reserved 2025</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
<script>
    // Load districts based on state
    document.getElementById('state').addEventListener('change', function () {
        fetch(`/get-districts/${this.value}`)
            .then(res => res.json())
            .then(data => {
                let options = `<option value="">Select District</option>`;
                data.forEach(d => options += `<option value="${d.id}">${d.name}</option>`);
                document.getElementById('district').innerHTML = options;
                document.getElementById('assembly').innerHTML = `<option value="">Select Assembly</option>`;
                document.getElementById('city').innerHTML = `<option value="">Select City</option>`;
            });
    });

    // Load assemblies based on district
    document.getElementById('district').addEventListener('change', function () {
        fetch(`/get-assemblies/${this.value}`)
            .then(res => res.json())
            .then(data => {
                let options = `<option value="">Select Assembly</option>`;
                data.forEach(a => options += `<option value="${a.id}">${a.name}</option>`);
                document.getElementById('assembly').innerHTML = options;
                document.getElementById('city').innerHTML = `<option value="">Select City</option>`;
            });
    });

    // Load cities based on assembly
    document.getElementById('assembly').addEventListener('change', function () {
        fetch(`/get-cities/${this.value}`)
            .then(res => res.json())
            .then(data => {
                let options = `<option value="">Select City</option>`;
                data.forEach(c => options += `<option value="${c.id}">${c.name}</option>`);
                document.getElementById('city').innerHTML = options;
            });
    });
</script>
@endsection