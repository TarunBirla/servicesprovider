@extends('user.layout.main')
@section('content')

<style>
  @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@400;600;700&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Tiro+Devanagari+Sanskrit:wght@400;600&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

  :root {
    --primary-color: #4B2E00;
    --secondary-color: #FF6B35;
    --accent-color: #FFB700;
    --dark-bg: #1a1a1a;
    --light-bg: #f8f9fa;
    --text-dark: #2c3e50;
    --text-light: #6c757d;
    --border-color: #e9ecef;
    --shadow-light: 0 2px 10px rgba(0,0,0,0.1);
    --shadow-medium: 0 5px 25px rgba(0,0,0,0.15);
    --shadow-heavy: 0 10px 40px rgba(0,0,0,0.2);
  }

  * {
    box-sizing: border-box;
  }

  body {
    font-family: 'Inter', sans-serif;
    line-height: 1.6;
    color: var(--text-dark);
  }

  /* Sanskrit Quote Section */
  .sanskrit-section {
    background: linear-gradient(135deg, #e38515 0%, #a2704b 100%);
    padding: 60px 0;
    position: relative;
    overflow: hidden;
  }

  .sanskrit-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="rgba(255,255,255,0.1)"><polygon points="0,0 1000,0 1000,80 0,100"/></svg>');
    background-size: cover;
  }

  .sanskrit-quote {
    font-family: 'Tiro Devanagari Sanskrit', serif;
    font-size: clamp(1.8rem, 4vw, 3.2rem);
    color: #ffffff;
    text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
    line-height: 1.8;
    font-weight: 600;
    position: relative;
    z-index: 2;
    text-align: center;
    margin-bottom: 0;
    animation: fadeInUp 1s ease-out;
  }

  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(30px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  /* Hero Section */
  .hero {
    /* background: linear-gradient(135deg, var(--dark-bg) 0%, #2c2c2c 100%); */
    min-height: 55vh;
    display: flex;
    align-items: center;
    position: relative;
    overflow: hidden;
  }

  .hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 30% 70%, rgba(255, 107, 53, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 70% 30%, rgba(255, 183, 0, 0.1) 0%, transparent 50%);
  }

  .search-container {
    position: relative;
    z-index: 2;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    padding: 40px;
    box-shadow: var(--shadow-heavy);
    border: 1px solid rgba(255, 255, 255, 0.2);
    max-width: 1000px;
    margin: 0 auto;
  }

  .search-title {
    color: var(--primary-color);
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 30px;
    text-align: center;
    position: relative;
  }

  .search-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 3px;
    background: linear-gradient(90deg, var(--secondary-color), var(--accent-color));
    border-radius: 2px;
  }

  /* Enhanced Form Controls */
  .form-group {
    position: relative;
    margin-bottom: 25px;
  }

  .form-control {
    height: 55px !important;
    border: 2px solid var(--border-color);
    border-radius: 12px;
    padding: 0 20px;
    font-size: 16px;
    font-weight: 500;
    background: #fff;
    transition: all 0.3s ease;
    box-shadow: var(--shadow-light);
  }

  .form-control:focus {
    border-color: var(--secondary-color);
    box-shadow: 0 0 0 0.2rem rgba(255, 107, 53, 0.25);
    transform: translateY(-2px);
  }

  .search-btn {
    height: 55px !important;
    background: linear-gradient(135deg, var(--secondary-color) 0%, var(--accent-color) 100%);
    border: none;
    border-radius: 12px;
    color: white;
    font-weight: 600;
    font-size: 16px;
    transition: all 0.3s ease;
    box-shadow: var(--shadow-medium);
    position: relative;
    overflow: hidden;
  }

  .search-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
  }

  .search-btn:hover::before {
    left: 100%;
  }

  .search-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 30px rgba(255, 107, 53, 0.4);
  }

  /* Loading States */
  .loading-option {
    color: var(--text-light);
    font-style: italic;
  }

  /* Services Table */
  .services-section {
    padding: 60px 0;
    background: var(--light-bg);
  }

  .services-table {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: var(--shadow-medium);
    border: none;
  }

  .services-table thead {
    background: linear-gradient(135deg, var(--primary-color) 0%, #6d4c00 100%);
  }

  .services-table th {
    color: black;
    font-weight: 600;
    padding: 20px 15px;
    border: none;
    text-transform: uppercase;
    font-size: 0.9rem;
    letter-spacing: 0.5px;
  }

  .services-table td {
    padding: 20px 15px;
    border: none;
    border-bottom: 1px solid var(--border-color);
    vertical-align: middle;
  }

  .services-table tbody tr {
    transition: all 0.3s ease;
  }

  .services-table tbody tr:hover {
    background: linear-gradient(90deg, rgba(255, 107, 53, 0.05), rgba(255, 183, 0, 0.05));
    transform: translateX(5px);
  }

  .service-title {
    font-weight: 700;
    color: var(--primary-color);
    font-size: 1.1rem;
    margin-bottom: 5px;
  }

  .service-details {
    color: var(--text-light);
    font-size: 0.9rem;
    line-height: 1.4;
  }

  .contact-info {
    line-height: 1.6;
  }

  .contact-name {
    font-weight: 600;
    color: var(--text-dark);
    font-size: 1rem;
  }

  .contact-mobile {
    color: var(--secondary-color);
    font-weight: 500;
  }

  .contact-email {
    color: #007bff;
    font-size: 0.9rem;
  }

  .experience-info {
    text-align: center;
  }

  .experience-years {
    font-weight: 600;
    color: var(--primary-color);
    font-size: 1.1rem;
  }

  .rating-stars {
    color: var(--accent-color);
    font-size: 1.2rem;
  }

  .review-count {
    color: var(--text-light);
    font-size: 0.9rem;
  }

  .select-btn {
    background: linear-gradient(135deg, var(--secondary-color) 0%, #ff8c42 100%);
    border: none;
    color: white;
    padding: 10px 25px;
    border-radius: 25px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-block;
    text-align: center;
    box-shadow: var(--shadow-light);
  }

  .select-btn:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-medium);
    color: white;
    text-decoration: none;
  }

  /* Responsive Design */
  @media (max-width: 768px) {
    .search-container {
      margin: 20px;
      padding: 25px;
    }

    .search-title {
      font-size: 2rem;
    }

    .sanskrit-quote {
      font-size: 1.5rem;
      padding: 0 15px;
    }

    .services-table {
      font-size: 0.9rem;
    }

    .services-table th,
    .services-table td {
      padding: 15px 10px;
    }
  }

  /* Animation for table rows */
  @keyframes slideInUp {
    from {
      opacity: 0;
      transform: translateY(20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .services-table tbody tr {
    animation: slideInUp 0.5s ease-out forwards;
  }

  .services-table tbody tr:nth-child(even) {
    animation-delay: 0.1s;
  }

  .services-table tbody tr:nth-child(odd) {
    animation-delay: 0.2s;
  }

  /* Wave Animation */
  .hero-waves {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
  }

  .hero-waves svg {
    position: relative;
    display: block;
    width: calc(100% + 1.3px);
    height: 60px;
  }

  .hero-waves .wave1 use {
    animation: wave-animation 10s ease-in-out infinite;
    fill: rgba(255, 255, 255, 0.1);
  }

  .hero-waves .wave2 use {
    animation: wave-animation 8s ease-in-out infinite reverse;
    fill: rgba(255, 255, 255, 0.2);
  }

  .hero-waves .wave3 use {
    animation: wave-animation 6s ease-in-out infinite;
    fill: rgba(255, 255, 255, 0.1);
  }

  @keyframes wave-animation {
    0%, 100% {
      transform: translateX(0px);
    }
    50% {
      transform: translateX(-25px);
    }
  }
</style>

<main class="main">
  <!-- Sanskrit Quote Section -->
  <section class="sanskrit-section mt-5">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1 class="sanskrit-quote">
            धर्म एव हतो हन्ति धर्मो रक्षति रक्षितः ⁠। <br/>
            तस्माद् धर्मं न त्यजामि मा नो धर्मो हतोऽवधीत् ⁠॥
          </h1>
        </div>
      </div>
    </div>
  </section>

  <!-- Hero Section with Search -->
  <section class="hero section">
    <div class="container">
      <div class="search-container" data-aos="fade-up" data-aos-delay="200">
        @php
          use Illuminate\Support\Facades\DB;
          $states = DB::table('states')->select('st_ut_code as id','name')->get();
        @endphp

        <h2 class="search-title">Find Home & Office Services</h2>
        
        <form action="/search" method="POST">
          @csrf
          <div class="row">
            <!-- State -->
            <div class="col-lg-4 col-md-6">
              <div class="form-group">
                <select class="form-control" id="state" name="state_id">
                  <option value="">🏛️ Select State</option>
                  @foreach($states as $state)
                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <!-- District -->
            <div class="col-lg-4 col-md-6">
              <div class="form-group">
                <select class="form-control" id="district" name="district_id">
                  <option value="">🏙️ Select District</option>
                </select>
              </div>
            </div>

            <!-- Assembly -->
            <div class="col-lg-4 col-md-6">
              <div class="form-group">
                <select class="form-control" id="assembly" name="assembly_id">
                  <option value="">🏛️ Select Assembly</option>
                </select>
              </div>
            </div>

            <!-- Category -->
            <div class="col-lg-4 col-md-6">
              <div class="form-group">
                 <select class="form-control" name="sector_code[]" id="sectorSelect">
                <option value="">Select Sector</option>
                @foreach(DB::table('service_list')->select('sector_code', 'sector_name')->distinct()->get() as $sector)
                  <option value="{{ $sector->sector_code }}">{{ $sector->sector_name }}</option>
                @endforeach
              </select>
              </div>
            </div>


            <div class="col-lg-4 col-md-6">
              <div class="form-group">
                 <select class="form-control" name="industry_code[]" id="industrySelect">
                <option value="">Select Industry</option>
              </select>
              </div>
            </div>



            <div class="col-lg-4 col-md-6">
              <div class="form-group">
                  <select class="form-control" name="subindustry_code[]" id="subIndustrySelect">
                <option value="">Select Sub Industry</option>
              </select>
                
              </div>
            </div>

            <!-- Search Button -->
            <div class="col-12 text-center">
              <button type="submit" class="search-btn px-5">
                🔍 Search Services
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Animated Waves -->
    <div class="hero-waves">
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none">
        <defs>
          <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"/>
        </defs>
        <g class="wave1">
          <use xlink:href="#wave-path" x="50" y="3"/>
        </g>
        <g class="wave2">
          <use xlink:href="#wave-path" x="50" y="0"/>
        </g>
        <g class="wave3">
          <use xlink:href="#wave-path" x="50" y="9"/>
        </g>
      </svg>
    </div>
  </section>

  <!-- Services Results -->
  @if(isset($services) && !empty($services))
    <section class="services-section">
      <div class="container">
        <div class="table-responsive">
          <table class="table services-table">
            <thead>
              <tr>
                <th>S.No.</th>
                <th>Service Details</th>
                <th>Contact Information</th>
                <th>Experience & Rating</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($services as $service)
                @php $associate = $service->associate; @endphp
                <tr>
                  <td>
                    <div class="text-center">
                      <strong style="font-size: 1.2rem; color: var(--primary-color);">
                        {{ $loop->iteration }}
                      </strong>
                    </div>
                  </td>
                  <td>
                    <div class="service-title">{{ $service->title ?? 'Service Not Specified' }}</div>
                    <div class="service-details">
                      📍 {{ $service->address ?? 'Address not provided' }}<br>
                      📮 PIN: {{ $service->pincode ?? 'N/A' }}
                    </div>
                  </td>
                  <td>
                    <div class="contact-info">
                      <div class="contact-name">{{ $associate->name ?? 'Name not available' }}</div>
                      <div class="contact-mobile">📱 {{ $associate->mobile ?? 'Mobile not provided' }}</div>
                      <div class="contact-email">✉️ {{ $associate->email ?? 'Email not provided' }}</div>
                    </div>
                  </td>
                  <td>
                    <div class="experience-info">
                      <div class="experience-years">{{ $service->experience_year ?? '0' }} Years</div>
                      <div class="rating-stars">⭐ {{ $associate->rating ?? 'N/A' }}</div>
                      <div class="review-count">{{ $associate->review ?? '0' }} Reviews</div>
                    </div>
                  </td>
                  <td>
                    <a href="{{ url('/servicelist?id=' . $service->id) }}" class="select-btn">
                      Select Service
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
</main>

<!-- Enhanced JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  // State change handler
  $('#state').on('change', function () {
    const stateId = $(this).val();
    const $district = $('#district');
    const $assembly = $('#assembly');
    
    if (!stateId) {
      $district.html('<option value="">🏙️ Select District</option>');
      $assembly.html('<option value="">🏛️ Select Assembly</option>');
      return;
    }

    // Show loading state
    $district.html('<option value="" class="loading-option">🔄 Loading districts...</option>');
    $assembly.html('<option value="">🏛️ Select Assembly</option>');

    // Fetch districts
    $.get('/get-districts/' + stateId)
      .done(function (data) {
        let options = '<option value="">🏙️ Select District</option>';
        data.forEach(d => {
          options += `<option value="${d.id}">${d.name}</option>`;
        });
        $district.html(options);
      })
      .fail(function() {
        $district.html('<option value="">❌ Error loading districts</option>');
      });
  });

  // District change handler
  $('#district').on('change', function () {
    const districtId = $(this).val();
    const $assembly = $('#assembly');
    
    if (!districtId) {
      $assembly.html('<option value="">🏛️ Select Assembly</option>');
      return;
    }

    // Show loading state
    $assembly.html('<option value="" class="loading-option">🔄 Loading assemblies...</option>');

    // Fetch assemblies
    $.get('/get-assemblies/' + districtId)
      .done(function (data) {
        let options = '<option value="">🏛️ Select Assembly</option>';
        data.forEach(a => {
          options += `<option value="${a.id}">${a.name}</option>`;
        });
        $assembly.html(options);
      })
      .fail(function() {
        $assembly.html('<option value="">❌ Error loading assemblies</option>');
      });
  });

  // Assembly change handler (if you have parts functionality)
  $('#assembly').on('change', function () {
    const assemblyId = $(this).val();
    const $part = $('#part');
    
    if (!assemblyId || !$part.length) return;

    $part.html('<option value="" class="loading-option">🔄 Loading parts...</option>');

    $.get('/get-parts/' + assemblyId)
      .done(function (data) {
        let options = '<option value="">Select Part</option>';
        data.forEach(p => {
          options += `<option value="${p.id}">${p.name}</option>`;
        });
        $part.html(options);
      })
      .fail(function() {
        $part.html('<option value="">❌ Error loading parts</option>');
      });
  });

  // Form validation
  $('form').on('submit', function(e) {
    const state = $('#state').val();
    const category = $('select[name="category"]').val();
    
    if (!state && !category) {
      e.preventDefault();
      alert('⚠️ Please select at least a state or service category to search.');
      return false;
    }
  });

  // Add loading spinner to search button on form submit
  $('form').on('submit', function() {
    const $btn = $('.search-btn');
    $btn.html('🔄 Searching...').prop('disabled', true);
  });
});
</script>

@endsection