@extends('admin.layout.main')
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
        <div class="d-flex align-items-center justify-content-center gap-2">
          <div class="dropdown d-flex">
            <a class="btn btn-primary d-flex align-items-center gap-1 " href="javascript:void(0)" id="drop4"
              data-bs-toggle="dropdown" aria-expanded="false">
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="body-wrapper">
      <div class="body-wrapper-inner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card p-5">
                        <div class="container"   class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
                                data-sidebar-position="fixed" data-header-position="fixed">
                            <h2>Plans List</h2>
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div> 
                            @endif
                            @if(session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            <div class="d-flex justify-content-end mb-4">

                                <a href="{{ route('admin.plan.create') }}" class="btn btn-primary">Create New Plan</a>
                            </div>
                            
                                 <div class="table-responsive mt-4">
                                    <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="px-0 text-muted">Id</th>
                                            <th scope="col" class="px-0 text-muted">Plans Name</th>
                                            <th scope="col" class="px-0 text-muted">Price</th>
                                            <th scope="col" class="px-0 text-muted">Service Limit</th>
                                            <th scope="col" class="px-0 text-muted">Duration</th>
                                            <th scope="col" class="px-0 text-muted">Create At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($plans as $plan)
                                        <tr>
                                            <td class="px-0">{{ $plan->id }}</td>
                                            <td class="px-0">{{ $plan->name }}</td>
                                            <td class="px-0">{{ $plan->price }}</td>
                                            <td class="px-0">{{ $plan->service_limit }}</td>
                                            <td class="px-0">{{ $plan->duration_days }} </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-4">
                                    
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