<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Professional Details Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary-color: #ef4444;
      --primary-dark: #ef4444;
      --secondary-color: #f8fafc;
      --accent-color: #EF6603;
      --text-primary: #1e293b;
      --text-secondary: #64748b;
      --border-color: #e2e8f0;
      --success-color: #10b981;
      --error-color: #ef4444;
      --warning-color: #f59e0b;
      --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
      --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
      --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
    }

    * {
      box-sizing: border-box;
    }

    body {
      background: #fff;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
      line-height: 1.6;
      color: var(--text-primary);
      min-height: 100vh;
      padding: 20px 0;
    }

    .main-container {
      max-width: 1400px;
      margin: 0 auto;
      padding: 0 15px;
    }

    .form-card {
      background: white;
      border-radius: 20px;
      box-shadow: var(--shadow-lg);
      overflow: hidden;
      margin-bottom: 30px;
    }

    .form-header {
      background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
      color: white;
      padding: 40px 30px;
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    .form-header::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.1"/><circle cx="90" cy="40" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
      animation: float 20s ease-in-out infinite;
    }

    @keyframes float {
      0%, 100% { transform: translate(0, 0) rotate(0deg); }
      50% { transform: translate(-20px, -20px) rotate(180deg); }
    }

    .form-title {
      font-size: 2.5rem;
      font-weight: 700;
      margin: 0;
      letter-spacing: -0.025em;
      position: relative;
      z-index: 1;
    }

    .form-subtitle {
      font-size: 1.1rem;
      margin-top: 10px;
      opacity: 0.9;
      font-weight: 400;
      position: relative;
      z-index: 1;
    }

    .form-body {
      padding: 40px 30px;
    }

    .alert {
      border: none;
      border-radius: 12px;
      padding: 16px 20px;
      margin-bottom: 25px;
      font-weight: 500;
      box-shadow: var(--shadow-sm);
    }

    .alert-success {
      background: rgb(16 185 129 / 0.1);
      color: var(--success-color);
      border-left: 4px solid var(--success-color);
    }

    .alert-danger {
      background: rgb(239 68 68 / 0.1);
      color: var(--error-color);
      border-left: 4px solid var(--error-color);
    }

    .alert ul {
      margin: 0;
      padding-left: 20px;
    }

    .other-revenue-form {
      background: white;
      border: 2px solid var(--border-color);
      border-radius: 16px;
      padding: 30px;
      margin: 30px 0;
      box-shadow: var(--shadow-md);
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .other-revenue-form::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 4px;
      background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
    }

    .other-revenue-form:hover {
      box-shadow: var(--shadow-lg);
      transform: translateY(-2px);
    }

    .form-section-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 25px;
      padding-bottom: 15px;
      border-bottom: 2px solid var(--border-color);
    }

    .form-section-title {
      font-size: 1.25rem;
      font-weight: 600;
      color: var(--text-primary);
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .form-section-number {
      background: var(--primary-color);
      color: white;
      width: 32px;
      height: 32px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.875rem;
      font-weight: 600;
    }

    .remove-section-btn {
      background: var(--error-color);
      color: white;
      border: none;
      padding: 8px 12px;
      border-radius: 8px;
      font-size: 0.875rem;
      cursor: pointer;
      transition: all 0.2s ease;
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .remove-section-btn:hover {
      background: #dc2626;
      transform: translateY(-1px);
    }

    .form-group {
      margin-bottom: 25px;
      position: relative;
    }

    .form-label {
      display: block;
      font-weight: 600;
      color: var(--text-primary);
      margin-bottom: 8px;
      font-size: 0.875rem;
      letter-spacing: 0.025em;
    }

    .form-control {
      width: 100%;
      /* padding: 12px 16px; */
      border: 2px solid var(--border-color);
      border-radius: 12px;
      font-size: 1rem;
      transition: all 0.2s ease;
      background: white;
    }

    .form-control:focus {
      outline: none;
      border-color: var(--primary-color);
      box-shadow: 0 0 0 3px rgb(37 99 235 / 0.1);
      transform: translateY(-1px);
    }

    .form-control:hover {
      border-color: var(--primary-color);
    }

    .form-check {
      display: flex;
      align-items: center;
      gap: 20px;
      margin-top: 8px;
    }

    .form-check-input {
      width: 18px;
      height: 18px;
      margin-right: 8px;
      accent-color: var(--primary-color);
    }

    .form-check-label {
      font-size: 0.875rem;
      color: var(--text-primary);
      cursor: pointer;
      display: flex;
      align-items: center;
    }

    .btn {
      padding: 12px 24px;
      font-size: 1rem;
      font-weight: 600;
      border-radius: 12px;
      transition: all 0.2s ease;
      border: none;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }

    .btn-primary {
      background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
      color: white;
      box-shadow: var(--shadow-md);
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow-lg);
    }

    .btn-success {
      background: linear-gradient(135deg, var(--success-color) 0%, #059669 100%);
      color: white;
      box-shadow: var(--shadow-md);
    }

    .btn-success:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow-lg);
    }

    .btn-actions {
      display: flex;
      justify-content: center;
      gap: 15px;
      margin-top: 40px;
      padding-top: 30px;
      border-top: 2px solid var(--border-color);
    }

    .loading-spinner {
      display: inline-block;
      width: 14px;
      height: 14px;
      border: 2px solid var(--border-color);
      border-radius: 50%;
      border-top-color: var(--primary-color);
      animation: spin 1s ease-in-out infinite;
      margin-right: 8px;
    }

    @keyframes spin {
      to { transform: rotate(360deg); }
    }

    .form-row {
      display: flex;
      flex-wrap: wrap;
      margin: 0 -10px;
    }

    .form-row .form-group {
      padding: 0 10px;
    }

    .col-lg-4 {
      flex: 0 0 33.333333%;
      max-width: 33.333333%;
    }

    .col-lg-6 {
      flex: 0 0 50%;
      max-width: 50%;
    }

    @media (max-width: 992px) {
      .col-lg-4 {
        flex: 0 0 50%;
        max-width: 50%;
      }
    }

    @media (max-width: 768px) {
      .form-header {
        padding: 30px 20px;
      }
      
      .form-title {
        font-size: 2rem;
      }
      
      .form-body {
        padding: 30px 20px;
      }
      
      .other-revenue-form {
        padding: 20px;
      }
      
      .col-lg-4, .col-lg-6 {
        flex: 0 0 100%;
        max-width: 100%;
      }
      
      .btn-actions {
        flex-direction: column;
      }
      
      .btn {
        width: 100%;
        justify-content: center;
      }
    }

    .empty-state {
      text-align: center;
      padding: 60px 20px;
      color: var(--text-secondary);
    }

    .empty-state-icon {
      font-size: 4rem;
      margin-bottom: 20px;
      opacity: 0.5;
    }

    .empty-state-text {
      font-size: 1.1rem;
      margin-bottom: 10px;
    }

    .empty-state-subtext {
      font-size: 0.875rem;
    }

    .revenue-type-badge {
      display: inline-block;
      padding: 4px 12px;
      font-size: 0.75rem;
      font-weight: 600;
      border-radius: 20px;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    .revenue-type-commercial {
      background: rgb(37 99 235 / 0.1);
      color: var(--primary-color);
    }

    .revenue-type-charitable {
      background: rgb(16 185 129 / 0.1);
      color: var(--success-color);
    }

    .revenue-type-voluntary {
      background: rgb(245 158 11 / 0.1);
      color: var(--warning-color);
    }

    .revenue-type-free {
      background: rgb(107 114 128 / 0.1);
      color: #6b7280;
    }
  </style>
</head>
<body>
  <div class="main-container">
    @if ($errors->any())
      <div class="alert alert-danger">
        <i class="fas fa-exclamation-triangle me-2"></i>
        <strong>Please correct the following errors:</strong>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    
    @if (session('success'))
      <div class="alert alert-success">
        <i class="fas fa-check-circle me-2"></i>
        {{ session('success') }}
      </div>
    @endif
    
    @if (session('error'))
      <div class="alert alert-danger">
        <i class="fas fa-exclamation-triangle me-2"></i>
        {{ session('error') }}
      </div>
    @endif

    <div class="form-card">
      <div class="form-header">
          <h1 style="font-family: 'Tiro Devanagari Sanskrit', serif;
            letter-spacing: 0.5px;
            font-size: 3rem;
            color:rgb(249, 245, 240);
            text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.3);
            line-height: 1.8;" class="form-title">
            Professional Details
          </h1>

        <p   style=" font-family: 'Tiro Devanagari Sanskrit', serif;
                  letter-spacing: 1.5px;
                  font-size: 15px;
                  color:rgb(249, 245, 240);
                  text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.3);
                  line-height: 1.8;" class="form-subtitle">Add your professional information and services to complete your profile</p>
      </div>

      <div class="form-body">
        <form id="professionalForm" action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          
          <div id="formContainer">
            <div class="empty-state" id="emptyState">
              <div class="empty-state-icon">
                <i class="fas fa-briefcase"></i>
              </div>
              <div class="empty-state-text">No professional details added yet</div>
              <div class="empty-state-subtext">Click "Add Professional Details" to get started</div>
            </div>
          </div>

          <div class="btn-actions">
            <!-- <button type="button" id="addMoreBtn" class="btn btn-success">
              <i class="fas fa-plus"></i>
              Add Professional Details
            </button> -->
            <button type="submit" class="btn btn-primary">
              <i class="fas fa-save"></i>
              Submit Details
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    let formCount = 0;
    let maxOtherRevenueForms = 3;
    let selectedRevenueType = '';

    function createFormSection(index) {
      return `
        <div class="other-revenue-form" id="formGroup-${index}">
          <div class="form-section-header">
            <div class="form-section-title">
              <div class="form-section-number">${index + 1}</div>
              Professional Details
            </div>
            ${index > 0 ? `<button type="button" class="remove-section-btn" onclick="removeFormSection(${index})">
              <i class="fas fa-trash"></i>
              Remove
            </button>` : ''}
          </div>
          
          <div class="form-row">
            <div class="form-group col-lg-4">
              <label class="form-label">Trade Name</label>
              <input type="text" class="form-control" name="associate_trade_name[]" placeholder="Enter trade name">
            </div>
            
            <div class="form-group col-lg-4">
              <label class="form-label">Type</label>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="type_${index}" value="Trade">
                  Trade
                </label>
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="type_${index}" value="Service">
                  Service
                </label>
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="type_${index}" value="Establishment">
                  Establishment
                </label>
              </div>
            </div>
            
            <div class="form-group col-lg-4">
              <label class="form-label">Revenue Type</label>
              <select class="form-control revenueTypeSelect" name="revenue_type[]">
                <option value="">Select Revenue Type</option>
                <option value="COMMERCIAL">Commercial</option>
                <option value="CHARITABLE">Charitable</option>
                <option value="VOLUNTORY">Voluntary</option>
                <option value="FREE">Free</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-lg-4">
              <label class="form-label">Sector</label>
              <select class="form-control" name="sector_code[]" id="sectorSelect">
                <option value="">Select Sector</option>
                @foreach(DB::table('service_list')->select('sector_code', 'sector_name')->distinct()->get() as $sector)
                  <option value="{{ $sector->sector_code }}">{{ $sector->sector_name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group col-lg-4">
              <label class="form-label">Industry</label>
              <select class="form-control" name="industry_code[]" id="industrySelect">
                <option value="">Select Industry</option>
              </select>
            </div>

            <div class="form-group col-lg-4">
              <label class="form-label">Sub Industry</label>
              <select class="form-control" name="subindustry_code[]" id="subIndustrySelect">
                <option value="">Select Sub Industry</option>
              </select>
            </div>

          </div>

          <div class="form-row">
            <div class="form-group col-lg-4">
              <label class="form-label">Experience (Years)</label>
              <input type="number" class="form-control" name="experience_year[]" placeholder="Enter years of experience" min="0">
            </div>
            
            <div class="form-group col-lg-4">
              <label class="form-label">Amount</label>
              <input type="number" class="form-control" name="amount[]" placeholder="Enter amount" min="0" step="0.01">
            </div>
            
            <div class="form-group col-lg-4">
              <label class="form-label">Address</label>
              <input type="text" class="form-control" name="associate_trade_address[]" placeholder="Enter business address">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-lg-4">
              <label class="form-label">Pincode</label>
              <input type="text" class="form-control" name="associate_trade_pincode[]" placeholder="Enter pincode" pattern="[0-9]{6}">
            </div>
            
            <div class="form-group col-lg-4">
              <label class="form-label">Coverage Area (State/UT)</label>
              <select class="form-control state-select" name="associate_trade_st_ut_name[]">
                <option value="">Select State</option>
                <option value="all">All Over India</option>
                @foreach(DB::table('states')->get() as $state)
                  <option value="{{ $state->st_ut_code }}">{{ $state->name }}</option>
                @endforeach
              </select>
            </div>
            
            <div class="form-group col-lg-4">
              <label class="form-label">District</label>
              <select class="form-control district-select" name="associate_trade_district_name[]">
                <option value="">Select District</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-lg-4">
              <label class="form-label">Assembly</label>
              <select class="form-control assembly-select" name="associate_trade_assembly_name[]">
                <option value="">Select Assembly</option>
              </select>
            </div>
            
            <div class="form-group col-lg-4">
              <label class="form-label">Part</label>
              <select class="form-control assembly-select" name="associate_trade_part_name[]">
                <option value="">Select Part</option>
              </select>
            </div>
          </div>
        </div>
      `;
    }

    function addFormSection() {
      if (selectedRevenueType === 'COMMERCIAL' || formCount < maxOtherRevenueForms) {
        const container = document.getElementById('formContainer');
        const emptyState = document.getElementById('emptyState');
        
        if (emptyState) {
          emptyState.style.display = 'none';
        }
        
        container.insertAdjacentHTML('beforeend', createFormSection(formCount));
        formCount++;
        
        // Update button text
        // const addBtn = document.getElementById('addMoreBtn');
        // if (formCount >= maxOtherRevenueForms && selectedRevenueType !== 'COMMERCIAL') {
        //   addBtn.style.display = 'none';
        // }
      }
    }

    function removeFormSection(index) {
      const formGroup = document.getElementById(`formGroup-${index}`);
      if (formGroup) {
        formGroup.remove();
        
        // Show empty state if no forms left
        const container = document.getElementById('formContainer');
        if (container.children.length === 1) { // Only empty state left
          document.getElementById('emptyState').style.display = 'block';
        }
        
        // Show add button again if hidden
        // const addBtn = document.getElementById('addMoreBtn');
        // addBtn.style.display = 'inline-flex';
      }
    }

    // Event listeners
    // document.getElementById('addMoreBtn').addEventListener('click', addFormSection);

    document.addEventListener('change', function (e) {
      if (e.target && e.target.classList.contains('revenueTypeSelect')) {
        selectedRevenueType = e.target.value;
        
        // Add visual indicator for revenue type
        const formGroup = e.target.closest('.other-revenue-form');
        const header = formGroup.querySelector('.form-section-title');
        
        // Remove existing badge
        const existingBadge = header.querySelector('.revenue-type-badge');
        if (existingBadge) {
          existingBadge.remove();
        }
        
        // Add new badge
        if (e.target.value) {
          const badge = document.createElement('span');
          badge.className = `revenue-type-badge revenue-type-${e.target.value.toLowerCase()}`;
          badge.textContent = e.target.value;
          header.appendChild(badge);
        }
      }
    });

    // AJAX handlers for dropdowns
 // STATE -> DISTRICT
    $(document).on('change', '.state-select', function () {
      var $row = $(this).closest('.other-revenue-form');
      var stateID = $(this).val();
      var $districtSelect = $row.find('.district-select');
      var $assemblySelect = $row.find('.assembly-select');
      var $partSelect = $row.find('.part-select');

      $districtSelect.html('<option value="">Loading Districts...</option>');
      $assemblySelect.html('<option value="">Select Assembly</option>');
      $partSelect.html('<option value="">Select Part</option>');

      if (stateID === 'all') {
        $districtSelect.html('<option value="all_state">All Over State</option>');
        $assemblySelect.html('<option value="all_district">All Over District</option>');
        $partSelect.html('<option value="all_assembly">All Over Assembly</option>');
        return;
      }

      $.ajax({
        url: '/get-districts/' + stateID,
        type: 'GET',
        success: function (data) {
          let options = '<option value="">Select District</option>';
            options += '<option value="all_state">All Over State</option>';
          $.each(data, function (key, value) {
            options += '<option value="' + value.id + '">' + value.name + '</option>';
          });
        
          $districtSelect.html(options);
        },
        error: function () {
          $districtSelect.html('<option value="">Error loading districts</option>');
        }
      });
    });

    $(document).on('change', '.district-select', function () {
       var $row = $(this).closest('.other-revenue-form');
      var districtID = $(this).val();
      var $assemblySelect = $row.find('.assembly-select');
      var $partSelect = $row.find('.part-select');

      $assemblySelect.html('<option value="">Loading Assemblies...</option>');
      $partSelect.html('<option value="">Select Part</option><option value="all_assembly">All_Over_Assembly</option>');

      if (districtID === 'all_state') {
        // All Over State selected → show only All Over options in Assembly & Part
        $assemblySelect.html('<option value="all_district">All Over District</option>');
        $partSelect.html('<option value="all_assembly">All Over Assembly</option>');
        return;
      }

      // Normal flow: fetch assemblies
      $.ajax({
        url: '/get-assemblies/' + districtID,
        type: 'GET',
        success: function (data) {
          let options = '<option value="">Select Assembly</option>';
           options += '<option value="all_district">All Over District</option>';
          $.each(data, function (key, value) {
            options += '<option value="' + value.id + '">' + value.name + '</option>';
          });
         
          $assemblySelect.html(options);
        },
        error: function () {
          $assemblySelect.html('<option value="">Error loading assemblies</option>');
        }
      });
    });


  $(document).on('change', '.assembly-select', function () {
    var $row = $(this).closest('.other-revenue-form');
    var assemblyID = $(this).val();
    var $partSelect = $row.find('.part-select');

    $partSelect.html('<option value="">Loading Parts...</option>');

    if (assemblyID === 'all_district') {
      // All Over District selected → show only All Over Assembly
      $partSelect.html('<option value="all_assembly">All Over Assembly</option>');
      return;
    }

    // Normal flow: fetch parts
    $.ajax({
      url: '/get-parts/' + assemblyID,
      type: 'GET',
      success: function (data) {
        let options = '<option value="">Select Part</option>';
         options += '<option value="all_assembly">All Over Assembly</option>';
        $.each(data, function (key, value) {
          options += '<option value="' + value.id + '">' + value.name + '</option>';
        });
       
        $partSelect.html(options);
      },
      error: function () {
        $partSelect.html('<option value="">Error loading parts</option>');
      }
    });
  });


    // Form submission handler
    document.getElementById('professionalForm').addEventListener('submit', function(e) {
      const submitBtn = this.querySelector('button[type="submit"]');
      submitBtn.innerHTML = '<span class="loading-spinner"></span>Submitting...';
      submitBtn.disabled = true;
    });

    // Initialize with one form section
    addFormSection();
  </script>
<script>
  $('#sectorSelect').on('change', function () {
    const sectorCode = $(this).val();

    if (sectorCode) {
      $.ajax({
        url: '/get-industries/' + sectorCode,
        type: 'GET',
        success: function (data) {
          $('#industrySelect').html('<option value="">Select Industry</option>');
          $('#subIndustrySelect').html('<option value="">Select Sub Industry</option>');

          $.each(data.industries, function (key, industry) {
            $('#industrySelect').append('<option value="' + industry.industry_code + '">' + industry.industry_name + '</option>');
          });
        }
      });
    }
  });

  $('#industrySelect').on('change', function () {
    const industryCode = $(this).val();

    if (industryCode) {
      $.ajax({
        url: '/get-subindustries/' + industryCode,
        type: 'GET',
        success: function (data) {
          $('#subIndustrySelect').html('<option value="">Select Sub Industry</option>');

          $.each(data.subindustries, function (key, subindustry) {
            $('#subIndustrySelect').append('<option value="' + subindustry.subindustry_code + '">' + subindustry.subindustry_name + '</option>');
          });
        }
      });
    }
  });
</script>

</body>
</html>