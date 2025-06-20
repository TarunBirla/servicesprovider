@extends('user.layout.main')
  @section('content')

  <style>
    .service-table th,
.service-table td {
  vertical-align: middle;
}

.service-title {
  font-weight: 600;
  color: #343a40;
  font-size: 1rem;
}

.table-bordered th,
.table-bordered td {
  border: 1px solid #dee2e6 !important;
}

.table-hover tbody tr:hover {
  background-color: #f8f9fa;
}

  </style>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari&display=swap" rel="stylesheet">

    <main class="main">
      <section id="features" class="features section">
        <div class="container ">
          <div class="row">
            <div class="col-12 col-md-12 text-center mt-5 ">
               <h1 style="font-family: 'Noto Sans Devanagari', sans-serif; letter-spacing: 0.5px;">
                धर्म एव हतो हन्ति धर्मो रक्षति रक्षितः ⁠। <br/>
               तस्माद् धर्मं न त्यजामि मा नो धर्मो हतोऽवधीत् ⁠॥ 
              </h1>

          </div>
        </div>
      </section>
     
        <div class="">
          <section id="hero" class="hero section dark-background">
              <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
                <div class="tab-pane fade active show" id="features-tab-1">
                  <div id="hero-carousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">
                    <div class="d-flex align-items-center justify-content-center" style="min-height: 60vh;">
                          @php
                          use Illuminate\Support\Facades\DB;
                          $states = DB::table('states')->select('st_ut_code as id','name')->get();
                        @endphp

                        <div class="container text-center">
                          <h2 class="mb-4">Search Home & Office Services</h2>
                          <form action="/search" method="POST">
                            @csrf
                            <div class="row justify-content-center">

                             <!-- State -->
                                  <div class="col-md-3 mb-3">
                                    <select class="form-control" id="state" name="state_id" style="height: 50px;">
                                      <option value="">Select State</option>
                                      @foreach($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                      @endforeach
                                    </select>
                                  </div>

                                  <!-- District -->
                                  <div class="col-md-3 mb-3">
                                    <select class="form-control" id="district" name="district_id" style="height: 50px;">
                                      <option value="">Select District</option>
                                    </select>
                                  </div>

                                  <!-- Assembly -->
                                  <div class="col-md-3 mb-3">
                                    <select class="form-control" id="assembly" name="assembly_id" style="height: 50px;">
                                      <option value="">Select Assembly</option>
                                    </select>
                                  </div>

                              <!-- Category -->
                              <div class="col-12 col-md-3 mb-3">
                                <select class="form-control" name="category" style="height: 50px;">
                                  <option value="">Select Category</option>
                                  <option>Technologist</option>
                                  <option>Electrician</option>
                                  <option>Plumber</option>
                                  <option>Carpenter</option>
                                </select>
                              </div>

                              <!-- Search Button -->
                              <div class="col-12 col-md-2 mb-3">
                                <button class="btn btn-light w-100" style="height: 50px;">Search</button>
                              </div>

                            </div>
                          </form>
                        </div>
                          
                    </div>
                  </div>
                </div>
                <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
                  <defs>
                    <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
                  </defs>
                  <g class="wave1">
                    <use xlink:href="#wave-path" x="50" y="3"></use>
                  </g>
                  <g class="wave2">
                    <use xlink:href="#wave-path" x="50" y="0"></use>
                  </g>
                  <g class="wave3">
                    <use xlink:href="#wave-path" x="50" y="9"></use>
                  </g>
                </svg>

          </section>
        @if(isset($services) &&  !empty($services))
          <section class="my-5">
  <div class="container">
    <div class="table-responsive">
      <table id="example" class="table table-striped table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>GRID</th>
            <th>SERVICE DETAIL</th>
            <th>CONTACT</th>
            <th>EXPERIENCE</th>
            <th>REVENUE</th>
          </tr>
        </thead>
        <tbody>
          @foreach($services as $service)
            @php $associate = $service->associate; @endphp
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>
                <div class="service-title">{{ $service->title ?? 'N/A' }}</div>
                <small>{{ $service->address ?? 'N/A' }}</small><br>
                <small>{{ $service->pincode ?? 'N/A' }}</small>
              </td>
              <td>
                <strong>{{ $associate->name ?? 'N/A' }}</strong><br>
                <small>{{ $associate->mobile ?? 'N/A' }}</small><br>
                <small class="text-primary">{{ $associate->email ?? 'N/A' }}</small>
              </td>
              <td>
                <small>{{ $service->experience_year ?? 'N/A' }} Yrs</small><br>
                <small>⭐ {{ $associate->rating ?? 'N/A' }}</small><br>
                <small>{{ $associate->review ?? 'N/A' }} Reviews</small>
              </td>
              <td>
                <a href="{{ url('/servicelist?id=' . $service->id) }}" class="btn btn-sm btn-outline-danger">
                  Select
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>

        @endif
        </div>
        <!-- End Tab Content Item -->
    </main>

    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $('#state').on('change', function () {
    const stateId = $(this).val();
    $('#district').html('<option value="">Loading...</option>');
    $('#assembly').html('<option value="">Select Assembly</option>');

    $.get('/get-districts/' + stateId, function (data) {
      let options = '<option value="">Select District</option>';
      data.forEach(d => options += `<option value="${d.id}">${d.name}</option>`);
      $('#district').html(options);
    });
  });

  $('#district').on('change', function () {
    const districtId = $(this).val();
    $('#assembly').html('<option value="">Loading...</option>');

    $.get('/get-assemblies/' + districtId, function (data) {
      let options = '<option value="">Select Assembly</option>';
      data.forEach(a => options += `<option value="${a.id}">${a.name}</option>`);
      $('#assembly').html(options);
    });
  });
  $('#assembly').on('change', function () {
  const assemblyId = $(this).val();
  $('#part').html('<option value="">Loading...</option>');

  $.get('/get-parts/' + assemblyId, function (data) {
    let options = '<option value="">Select Part</option>';
    data.forEach(p => options += `<option value="${p.id}">${p.name}</option>`);
    $('#part').html(options);
  });
});
</script>
  @endsection
