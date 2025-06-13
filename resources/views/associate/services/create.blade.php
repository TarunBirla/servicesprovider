<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Professional Details Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body { background: #f8f9fa; }
    .section { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); margin-top: 30px; }
    .form-label { font-weight: bold; }
  </style>
</head>
<body>
<div class="container">
  <h3 class="text-center mt-4">Professional Details</h3>
  <form id="professionalForm" action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
    <div class="section" id="formContainer">
      <!-- Initial Form Group Will Be Added by JS -->
    </div>

    <div class="text-center mt-4">
      <button type="button" id="addMoreBtn" class="btn btn-success">+ Add More</button>
    </div>

    <div class="text-center mt-4">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>

<script>
  let formCount = 0;
  let maxOtherRevenueForms = 3;
  let selectedRevenueType = '';

  function createFormSection(index) {
    return `
    <div class="form-row mt-4" id="formGroup-${index}">
      <div class="form-group col-lg-4">
        <label class="form-label">Trade Name</label>
        <input type="text" class="form-control" name="associate_trade_name[]">
      </div>
      <div class="form-group col-lg-4">
        <label class="form-label">Type</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="type_${index}" value="Trade"> Trade
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="type_${index}" value="Service"> Service
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="type_${index}" value="Establishment"> Establishment
        </div>
      </div>
      <div class="form-group col-lg-4">
        <label class="form-label">Revenue Type</label>
        <select class="form-control revenueTypeSelect" name="revenue_type[]">
          <option value="">Select</option>
          <option value="COMMERCIAL">COMMERCIAL</option>
          <option value="CHARITABLE">CHARITABLE</option>
          <option value="VOLUNTORY">VOLUNTORY</option>
          <option value="FREE">FREE</option>
        </select>
      </div>

      <div class="form-group col-lg-4">
        <label class="form-label">Sector</label>
        <select class="form-control" name="sector_name[]">
          <option>Sector 1</option><option>Sector 2</option>
        </select>
      </div>
      <div class="form-group col-lg-4">
        <label class="form-label">Industry</label>
        <select class="form-control" name="industry_name[]">
          <option>Industry 1</option><option>Industry 2</option>
        </select>
      </div>
      <div class="form-group col-lg-4">
        <label class="form-label">Sub Industry</label>
        <select class="form-control" name="sub_industry_name[]">
          <option>Sub 1</option><option>Sub 2</option>
        </select>
      </div>

      <div class="form-group col-lg-4">
        <label class="form-label">Experience Year</label>
        <input type="text" class="form-control" name="experience_year[]">
      </div>
      <div class="form-group col-lg-4">
        <label class="form-label">Address</label>
        <input type="text" class="form-control" name="associate_trade_address[]">
      </div>
      <div class="form-group col-lg-4">
        <label class="form-label">Pincode</label>
        <input type="text" class="form-control" name="associate_trade_pincode[]">
      </div>

      <div class="form-group col-lg-4">
        <label class="form-label">Coverage Area (State/UT)</label>
        <select class="form-control" name="associate_trade_st_ut_name[]">
          <option>UP</option><option>MP</option>
        </select>
      </div>
      <div class="form-group col-lg-4">
        <label class="form-label">District</label>
        <select class="form-control" name="associate_trade_district_name[]">
          <option>District 1</option><option>District 2</option>
        </select>
      </div>
      <div class="form-group col-lg-4">
        <label class="form-label">Assembly</label>
        <select class="form-control" name="associate_trade_assembly_name[]">
          <option>Assembly 1</option><option>Assembly 2</option>
        </select>
      </div>
      <div class="form-group col-lg-4">
        <label class="form-label">Part</label>
        <select class="form-control" name="associate_trade_part_name[]">
          <option>Part 1</option><option>Part 2</option>
        </select>
      </div>
    </div>
    `;
  }

  function addFormSection() {
    if (selectedRevenueType === 'COMMERCIAL' || formCount < maxOtherRevenueForms) {
      const container = document.getElementById('formContainer');
      container.insertAdjacentHTML('beforeend', createFormSection(formCount));
      formCount++;
    }
  }

  document.getElementById('addMoreBtn').addEventListener('click', addFormSection);

  // Add first form section on load
  addFormSection();

  // Listen for revenue type changes and update tracking var
  document.addEventListener('change', function (e) {
    if (e.target && e.target.classList.contains('revenueTypeSelect')) {
      selectedRevenueType = e.target.value;
    }
  });
</script>
</body>
</html>
=======
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
          <!--  Row 1 -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card p-5">
                <div class="container"   class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <h2>Create New Service</h2>

    @if(session('success'))
        <div class="alert alert-success ">{{ session('success') }}</div>
    @endif

    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Title --}}
        <div class="row">
        <div class="form-group mt-2 col-6">
            <label>Title <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        {{-- Category --}}
        <div class="form-group mt-2 col-6">
            <label>Category <span class="text-danger">*</span></label>
            <select name="category_id" class="form-control" required>
                <option value="">Select Category</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Price --}}
        <div class="form-group mt-2 col-6">
            <label>Price (INR) <span class="text-danger">*</span></label>
            <input type="number" name="price" class="form-control" value="{{ old('price') }}" required>
        </div>

        {{-- Description --}}
        <div class="form-group mt-2 col-6">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
        </div>

        {{-- Image Upload --}}
        <div class="form-group mt-2 col-6">
            <label>Image (optional)</label>
            <input type="file" name="image" class="form-control-file">
        </div>

        {{-- Location Dropdowns --}}
        <div class="form-group mt-2 col-6">
            <label>State</label>
            <select name="state_id" id="state" class="form-control">
                <option value="">Select State</option>
                @foreach($states as $state)
                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-2 col-6">
            <label>District</label>
            <select name="district_id" id="district" class="form-control">
                <option value="">Select District</option>
            </select>
        </div>

        <div class="form-group mt-2 col-6">
            <label>Assembly</label>
            <select name="assembly_id" id="assembly" class="form-control">
                <option value="">Select Assembly</option>
            </select>
        </div>

        <div class="form-group mt-2 col-6">
            <label>City</label>
            <select name="city_id" id="city" class="form-control">
                <option value="">Select City</option>
            </select>
        </div>
</div>
        {{-- Submit --}}
        <button type="submit" class="btn btn-primary mt-5">Create Service</button>
    </form>
</div> 
              </div>
            </div>
           
           
          </div>
          <div class="py-6 px-6 text-center">
            <p class="mb-0 fs-4">Design and Developed by <a href="#"
                class="pe-1 text-primary text-decoration-underline">Wrappixel.com</a> Distributed by <a href="https://themewagon.com" target="_blank" >ThemeWagon</a></p>
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
>>>>>>> 984eb22d97fcb297de473ab875d6ad398207b625
