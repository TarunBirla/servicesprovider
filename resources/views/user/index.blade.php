@extends('user.layout.main')
  @section('content')
    <main class="main">
      <section id="features" class="features section">
        <div class="container ">
          <div class="row">
            <div class="col-lg-3" >
          <img src="https://sewamitra.up.gov.in/images/SewaMitra.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 mt-5 text-center" >
          <h1>Services Provider</h1>
          </div>
          <div class="col-lg-3" >
          <img src="https://sewamitra.up.gov.in/images/SewaMitra.png" class="img-fluid" alt="">
          
          </div>
          </div>
        </div>
      </section>
     
        <div class=" mt-5">
          <section id="hero" class="hero section dark-background">
              <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
                <div class="tab-pane fade active show" id="features-tab-1">
                  <div id="hero-carousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">
                    <div class="d-flex align-items-center justify-content-center" style="min-height: 60vh;">
                          @php
                            use Illuminate\Support\Facades\DB;
                            $states = DB::table('states')->get();
                          @endphp

                        <div class="container text-center">
                          <h2 class="mb-4">Search Home & Office Services</h2>
                          <form action="/search" method="POST">
                            @csrf
                            <div class="row justify-content-center">

                              <!-- State -->
                              <div class="col-12 col-md-3 mb-3">
                                <select class="form-control" id="state" name="state_id" style="height: 50px;">
                                  <option value="">Select State</option>
                                  @foreach($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                  @endforeach
                                </select>
                              </div>

                              <!-- District -->
                              <div class="col-12 col-md-3 mb-3">
                                <select class="form-control" id="district" name="district_id" style="height: 50px;">
                                  <option value="">Select District</option>
                                </select>
                              </div>

                              <!-- Assembly -->
                              <div class="col-12 col-md-3 mb-3">
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
          <section>
          
             <div class="table-responsive">
                  <table class="table table-bordered text-center">
                    <thead>
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
                        
                          @php 
                          
                        
                          $associate = $service->associate; @endphp
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                              <div class="highlight">{{ $service->title ?? 'N/A' }}</div>
                              {{ $service->address ?? 'N/A' }}<br>
                              {{ $service->pincode ?? 'N/A' }}
                            </td>
                            <td>
                              {{ $associate->name ?? 'N/A' }}<br>
                              {{ $associate->mobile ?? 'N/A' }}<br>
                              <span class="text-primary">{{ $associate->email ?? 'N/A' }}</span>
                            </td>
                            <td>
                              {{ $service->experience_year ?? 'N/A' }}<br>
                              {{ $associate->rating ?? 'N/A' }}<br>
                              {{ $associate->review ?? 'N/A' }}
                            </td>
                            <td class="text-danger">
                              <a href="{{ url('/servicelist?id=' . $service->id) }}">View</a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                  </table>
              </div>
          </section>
        @endif
        </div>
        <!-- End Tab Content Item -->
    </main>

    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $('#state').change(function () {
    var stateID = $(this).val();
    $('#district').html('<option value="">Loading...</option>');
    $('#assembly').html('<option value="">Select Assembly</option>');

    if (stateID) {
      $.ajax({
        url: '/get-districts/' + stateID,
        type: 'GET',
        success: function (data) {
          $('#district').html('<option value="">Select District</option>');
          $.each(data, function (key, value) {
            $('#district').append('<option value="' + value.id + '">' + value.name + '</option>');
          });
        }
      });
    }
  });

  $('#district').change(function () {
    var districtID = $(this).val();
    $('#assembly').html('<option value="">Loading...</option>');

    if (districtID) {
      $.ajax({
        url: '/get-assemblies/' + districtID,
        type: 'GET',
        success: function (data) {
          $('#assembly').html('<option value="">Select Assembly</option>');
          $.each(data, function (key, value) {
            $('#assembly').append('<option value="' + value.id + '">' + value.name + '</option>');
          });
        }
      });
    }
  });
</script>
  @endsection
