@extends('associate.layout.main')
@section('content')




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
                            @if(session('info'))
                                <div class="alert alert-info">{{ session('info') }}</div>
                            @endif
                            <div class="table-responsive mt-4">
                                <table class="table  text-nowrap varient-table align-middle fs-3">
                                    <thead>
                                        <tr>
                                        <th scope="col" class="px-0 text-muted"> id</th>
                                        <th scope="col" class="px-0 text-muted">Title</th>
                                        <th scope="col" class="px-0 text-muted">Type</th>
                                        <th scope="col" class="px-0 text-muted"> Revenue Type</th>
                                        <th scope="col" class="px-0 text-muted">Sector</th>
                                        <th scope="col" class="px-0 text-muted">Industry</th>
                                        <th scope="col" class="px-0 text-muted">Sub Industry</th>
                                        <th scope="col" class="px-0 text-muted">Experience Year</th>
                                        <th scope="col" class="px-0 text-muted">Address</th>
                                        <th scope="col" class="px-0 text-muted">Pincode</th>
                                        <th scope="col" class="px-0 text-muted">State</th>
                                        <th scope="col" class="px-0 text-muted">District</th>
                                        <th scope="col" class="px-0 text-muted">Assembly</th>
                                        <th scope="col" class="px-0 text-muted">Part</th>
                                        <th scope="col" class="px-0 text-muted text-end">status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($services as $service)
                                        <tr>
                                            <td class="px-0">{{ $service->id }}</td>
                                            <td class="px-0">{{ $service->title }}</td>
                                            <td class="px-0">{{ $service->type }}</td>
                                            <td class="px-0">{{ $service->revenue_type }}</td>
                                            <td class="px-0">{{ $service->sector_name }}</td>
                                            <td class="px-0">{{ $service->industry_name }}</td>
                                            <td class="px-0">{{ $service->sub_industry_name }}</td>
                                            <td class="px-0">{{ $service->experience_year }}</td>
                                            <td class="px-0">{{ $service->address }}</td>
                                            <td class="px-0">{{ $service->pincode }}</td>
                                            <td class="px-0">{{ $service->state }}</td>
                                            <td class="px-0">{{ $service->district_name }}</td>
                                            <td class="px-0">{{ $service->assembly_name }}</td>
                                            <td class="px-0">{{ $service->part_name }}</td>
                                            <td class="text-end">
                                                @if($service->status == 'active')
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