<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Professional Details Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body { background: #EF6603; }
    .section {  padding: 20px; border-radius: 8px;  margin-top: 30px; }
    .form-label { font-weight: bold; }
   .other-revenue-form {
  /* margin: 30px 0; */
  /* padding: 20px; */
  border: 1px solid #fff;
  border-radius: 10px;
  background-color: #fff;
    box-shadow: 0 0 10px rgba(0,0,0,0.15);

}

  </style>
</head>
<body>
<div class="container">
  

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  @if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif
  @if (session('error'))
    <div class="alert alert-danger">
      {{ session('error') }}
    </div>
  @endif
        <h3 class="text-center mt-4">Professional Details</h3>
  <form id="professionalForm" action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="section" id="formContainer">

      <!-- Initial Form Group Will Be Added by JS -->
    </div>

    <!-- <div class="text-center mt-4">
      <button type="button" id="addMoreBtn" class="btn btn-success">+ Add More</button>
    </div>

    <div class="text-center mt-4">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div> -->
    <div class="d-flex justify-content-end  mb-5">
  <button type="button" id="addMoreBtn" class="btn btn-success mr-2">+ Add More</button>
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
    <div class="form-row mt-4 other-revenue-form " id="formGroup-${index}">
      <div class="form-group col-lg-4">
        <label class="form-label">Trade Name</label>
        <input type="text" class="form-control" name="associate_trade_name[]">
      </div>
      <div class="form-group col-lg-4">
        <label class="form-label">Type</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="type_${index}" value="Trade"> Trade &nbsp;&nbsp;&nbsp;&nbsp;
           <input class="form-check-input" type="radio" name="type_${index}" value="Service"> Service &nbsp;&nbsp;&nbsp;&nbsp;
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
