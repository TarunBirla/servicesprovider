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
                            <h2>Orders List</h2>
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
                                        <th scope="col" class="px-0 text-muted"> user_id</th>
                                        <th scope="col" class="px-0 text-muted"> date</th>
                                        <th scope="col" class="px-0 text-muted"> amount</th>
                                        <th scope="col" class="px-0 text-muted"> associate_id</th>
                                        <th scope="col" class="px-0 text-muted"> service_id</th>
                                        <th scope="col" class="px-0 text-muted"> note</th>
                                        <th scope="col" class="px-0 text-muted"> status</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                        <tr>

                                            <td class="px-0">{{ $order->id }}</td>
                                            <td class="px-0">{{ $order->user_id }}</td>
                                            <td class="px-0">{{ $order->date }}</td>
                                            <td class="px-0">{{ $order->amount }}</td>
                                            <td class="px-0">{{ $order->associate_id }}</td>
                                            <td class="px-0">{{ $order->service_id }}</td>
                                            <td class="px-0">{{ $order->note }}</td>
                                            <td class="px-0">
               <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
    @csrf
    @method('PUT')
    <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
        <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
        <option value="Confirmed" {{ $order->status == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
        <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
        <option value="Completed" {{ $order->status == 'Completed' ? 'selected' : '' }}>Completed</option>
    </select>
</form>


                                            </td>

                                            
                                
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

@endsection