<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Associate Personal Details</title>
  <link
    rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
  />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary-color: #ef4444;
      --primary-dark:rgb(230, 84, 11);
      --secondary-color: #f8fafc;
      --accent-color: #EF6603;
      --text-primary: #1e293b;
      --text-secondary: #64748b;
      --border-color: #e2e8f0;
      --success-color: #10b981;
      --error-color: #ef4444;
      --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
      --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
      --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
    }

    * {
      box-sizing: border-box;
    }

    body {
      background:#fff;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
      line-height: 1.6;
      color: var(--text-primary);
      min-height: 100vh;
      padding: 20px 0;
    }

    .main-container {
      max-width: 1200px;
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

    .form-section {
      margin-bottom: 30px;
    }

    .section-divider {
      height: 2px;
      background: linear-gradient(90deg, var(--primary-color), transparent);
      margin: 30px 0;
      border-radius: 1px;
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

    .form-label.required::after {
      content: '*';
      color: var(--error-color);
      margin-left: 4px;
    }

    .form-control {
      width: 100%;
      /* padding: 12px 16px; */
      border: 2px solid var(--border-color);
      border-radius: 12px;
      font-size: 1rem;
      transition: all 0.2s ease;
      background: white;
      position: relative;
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

    .form-control-file {
      padding: 10px 0;
      border: 2px dashed var(--border-color);
      border-radius: 12px;
      background: var(--secondary-color);
      text-align: center;
      transition: all 0.2s ease;
      cursor: pointer;
      position: relative;
      overflow: hidden;
    }

    .form-control-file:hover {
      border-color: var(--primary-color);
      background: rgb(37 99 235 / 0.05);
    }

    .file-input-wrapper {
      position: relative;
      display: inline-block;
      width: 100%;
    }

    .file-input-wrapper input[type="file"] {
      position: absolute;
      opacity: 0;
      width: 100%;
      height: 100%;
      cursor: pointer;
    }

    .file-input-content {
      padding: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 8px;
    }

    .file-input-icon {
      font-size: 2rem;
      color: var(--text-secondary);
    }

    .file-input-text {
      font-size: 0.875rem;
      color: var(--text-secondary);
      text-align: center;
    }

    .btn-primary {
      background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
      border: none;
      padding: 14px 32px;
      font-size: 1rem;
      font-weight: 600;
      border-radius: 12px;
      transition: all 0.2s ease;
      box-shadow: var(--shadow-md);
      letter-spacing: 0.025em;
      position: relative;
      overflow: hidden;
    }

    .btn-primary::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
      transition: left 0.5s;
    }

    .btn-primary:hover::before {
      left: 100%;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow-lg);
    }

    .btn-primary:active {
      transform: translateY(0);
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

    .image-section {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
      background: var(--secondary-color);
      border-radius: 16px;
      margin-bottom: 30px;
      margin: auto;
      display: block;
      margin-top:30%;
    }

    .image-section img {
      max-width: 100%;
      height: 50vh;
      border-radius: 12px;
      box-shadow: var(--shadow-md);
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

    .form-progress {
      height: 4px;
      background: var(--border-color);
      border-radius: 2px;
      overflow: hidden;
      margin-bottom: 30px;
    }

    .form-progress-bar {
      height: 100%;
      background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
      border-radius: 2px;
      transition: width 0.3s ease;
      width: 0%;
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
      
      .btn-primary {
        width: 100%;
        padding: 16px;
      }
    }

    .form-row {
      display: flex;
      flex-wrap: wrap;
      margin: 0 -10px;
    }

    .form-row .form-group {
      padding: 0 10px;
    }

    .col-md-6 {
      flex: 0 0 50%;
      max-width: 50%;
    }

    @media (max-width: 768px) {
      .col-md-6 {
        flex: 0 0 100%;
        max-width: 100%;
      }
    }
  </style>
</head>
<body>
  <div class="main-container">
    
    @if(session('success'))
      <div class="alert alert-success">
        <i class="fas fa-check-circle me-2"></i>
        {{ session('success') }}
      </div>
    @endif
    
    @if($errors->any())
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

    <div class="form-card">
      <div class="form-header">
        <h1 style="
                  font-family: 'Tiro Devanagari Sanskrit', serif;
                  letter-spacing: 0.5px;
                  font-size: 3rem;
                  color:rgb(249, 245, 240);
                  text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.3);
                  line-height: 1.8;" class="form-title">ASSOCIATE REGISTRATION</h1>
        
        <p  style="
                  font-family: 'Tiro Devanagari Sanskrit', serif;
                  letter-spacing: 1.5px;
                  font-size: 15px;
                  color:rgb(249, 245, 240);
                  text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.3);
                  line-height: 1.8;"
                   class="form-subtitle">Please fill in your personal details to complete the registration process</p>
      </div>

      <div class="form-body">
        <div class="form-progress">
          <div class="form-progress-bar" id="progressBar"></div>
        </div>

        <div class="row">
          <div class="col-md-5">
            <div class="image-section">
              <img src="{{ asset('assets/j2.png') }}" alt="Registration Illustration" />
            </div>
          </div>

          <div class="col-md-7">
            <form method="POST" action="{{ route('register.associate.submit') }}" enctype="multipart/form-data" id="registrationForm">
              @csrf
              
              <div class="form-section">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="form-label required">Full Name</label>
                    <input type="text" class="form-control" name="associate_name[]" placeholder="Enter your full name" required />
                  </div>
                  <div class="form-group col-md-6">
                    <label class="form-label required">Mobile Number</label>
                    <input type="tel" class="form-control" name="associate_mobile[]" placeholder="Enter mobile number" required />
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="form-label required">Email Address</label>
                    <input type="email" class="form-control" name="associate_email[]" placeholder="Enter email address" required />
                  </div>
                  <div class="form-group col-md-6">
                    <label class="form-label required">Password</label>
                    <input type="password" class="form-control" name="associate_password[]" placeholder="Create a strong password" required />
                  </div>
                </div>

                <div class="section-divider"></div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="form-label required">Address</label>
                    <input type="text" class="form-control" name="associate_address[]" placeholder="Enter your full address" required />
                  </div>
                  <div class="form-group col-md-6">
                    <label class="form-label required">Pincode</label>
                    <input type="text" class="form-control" name="associate_pincode[]" placeholder="Enter pincode" required />
                  </div>
                </div>

                @php
                  use Illuminate\Support\Facades\DB;
                  $states = DB::table('states')->select('st_ut_code as id','name')->get();
                @endphp

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="form-label required">State</label>
                    <select class="form-control" id="state" name="state[]" required>
                      <option value="">Select State</option>
                      @foreach($states as $state)
                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label class="form-label required">District</label>
                    <select class="form-control" id="district" name="district_name[]" required>
                      <option value="">Select District</option>
                    </select>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="form-label required">Assembly</label>
                    <select class="form-control" id="assembly" name="assembly_name[]" required>
                      <option value="">Select Assembly</option>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label class="form-label required">Part</label>
                    <select class="form-control" id="part" name="part_name[]" required>
                      <option value="">Select Part</option>
                    </select>
                  </div>
                </div>

                <div class="section-divider"></div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="form-label required">Aadhar Card (Front)</label>
                    <div class="file-input-wrapper">
                      <div class="form-control-file">
                        <input type="file" name="aadhar_front[]" accept="image/*,.pdf" required />
                        <div class="file-input-content">
                          <i class="fas fa-cloud-upload-alt file-input-icon"></i>
                          <div class="file-input-text">
                            <strong>Click to upload</strong> or drag and drop<br>
                            <small>Supports: JPG, PNG, PDF (Max 5MB)</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label class="form-label required">Aadhar Card (Back)</label>
                    <div class="file-input-wrapper">
                      <div class="form-control-file">
                        <input type="file" name="aadhar_back[]" accept="image/*,.pdf" required />
                        <div class="file-input-content">
                          <i class="fas fa-cloud-upload-alt file-input-icon"></i>
                          <div class="file-input-text">
                            <strong>Click to upload</strong> or drag and drop<br>
                            <small>Supports: JPG, PNG, PDF (Max 5MB)</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-user-plus me-2"></i>
                  Submit Registration
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    // Progress bar animation
    function updateProgress() {
      const form = document.getElementById('registrationForm');
      const inputs = form.querySelectorAll('input[required], select[required]');
      const filled = Array.from(inputs).filter(input => input.value.trim() !== '').length;
      const progress = (filled / inputs.length) * 100;
      document.getElementById('progressBar').style.width = progress + '%';
    }

    // Add event listeners to all form inputs
    document.addEventListener('DOMContentLoaded', function() {
      const inputs = document.querySelectorAll('input, select');
      inputs.forEach(input => {
        input.addEventListener('input', updateProgress);
        input.addEventListener('change', updateProgress);
      });
      updateProgress();
    });

    // State change handler
    $('#state').on('change', function () {
      const stateId = $(this).val();
      const districtSelect = $('#district');
      const assemblySelect = $('#assembly');
      const partSelect = $('#part');
      
      // Reset dependent dropdowns
      assemblySelect.html('<option value="">Select Assembly</option>');
      partSelect.html('<option value="">Select Part</option>');
      
      if (stateId) {
        districtSelect.html('<option value=""><span class="loading-spinner"></span>Loading Districts...</option>');
        
        $.get('/get-districts/' + stateId, function (data) {
          let options = '<option value="">Select District</option>';
          data.forEach(d => options += `<option value="${d.id}">${d.name}</option>`);
          districtSelect.html(options);
        }).fail(function() {
          districtSelect.html('<option value="">Error loading districts</option>');
        });
      } else {
        districtSelect.html('<option value="">Select District</option>');
      }
      
      updateProgress();
    });

    // District change handler
    $('#district').on('change', function () {
      const districtId = $(this).val();
      const assemblySelect = $('#assembly');
      const partSelect = $('#part');
      
      // Reset dependent dropdown
      partSelect.html('<option value="">Select Part</option>');
      
      if (districtId) {
        assemblySelect.html('<option value=""><span class="loading-spinner"></span>Loading Assemblies...</option>');
        
        $.get('/get-assemblies/' + districtId, function (data) {
          let options = '<option value="">Select Assembly</option>';
          data.forEach(a => options += `<option value="${a.id}">${a.name}</option>`);
          assemblySelect.html(options);
        }).fail(function() {
          assemblySelect.html('<option value="">Error loading assemblies</option>');
        });
      } else {
        assemblySelect.html('<option value="">Select Assembly</option>');
      }
      
      updateProgress();
    });

    // Assembly change handler
    $('#assembly').on('change', function () {
      const assemblyId = $(this).val();
      const partSelect = $('#part');
      
      if (assemblyId) {
        partSelect.html('<option value=""><span class="loading-spinner"></span>Loading Parts...</option>');
        
        $.get('/get-parts/' + assemblyId, function (data) {
          let options = '<option value="">Select Part</option>';
          data.forEach(p => options += `<option value="${p.id}">${p.name}</option>`);
          partSelect.html(options);
        }).fail(function() {
          partSelect.html('<option value="">Error loading parts</option>');
        });
      } else {
        partSelect.html('<option value="">Select Part</option>');
      }
      
      updateProgress();
    });

    // File input enhancement
    document.querySelectorAll('input[type="file"]').forEach(input => {
      input.addEventListener('change', function() {
        const fileInputContent = this.parentElement.querySelector('.file-input-content');
        if (this.files.length > 0) {
          const fileName = this.files[0].name;
          fileInputContent.innerHTML = `
            <i class="fas fa-check-circle file-input-icon" style="color: var(--success-color);"></i>
            <div class="file-input-text">
              <strong>File Selected:</strong><br>
              <small>${fileName}</small>
            </div>
          `;
          this.parentElement.style.borderColor = 'var(--success-color)';
          this.parentElement.style.background = 'rgb(16 185 129 / 0.05)';
        }
        updateProgress();
      });
    });

    // Form validation enhancement
    document.getElementById('registrationForm').addEventListener('submit', function(e) {
      const submitBtn = this.querySelector('button[type="submit"]');
      submitBtn.innerHTML = '<span class="loading-spinner"></span>Processing...';
      submitBtn.disabled = true;
    });
  </script>
</body>
</html>