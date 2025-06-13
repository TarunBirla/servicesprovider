<<<<<<< HEAD
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
  <style>
    body {
      background: #ffc107;
      font-family: Arial, sans-serif;
    }
    .section {
      background: #fffbea;
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 8px;
    }
    .section-title {
      font-weight: bold;
      color: #000;
      margin-bottom: 20px;
    }
    .form-label {
      font-weight: 600;
    }
    .remove-btn {
      margin-top: 28px;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <h3 class="text-center mb-4">Personal Details</h3>
    <div id="formContainer">
      <!-- Initial Form Block -->
      <div class="section form-block">
        <form method="POST" action="{{ route('register.associate.submit') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
          <div class="form-group col-md-4">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="associate_name[]" />
          </div>
          <div class="form-group col-md-4">
            <label class="form-label">Mobile</label>
            <input type="text" class="form-control" name="associate_mobile[]" />
          </div>
          <div class="form-group col-md-4">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="associate_email[]" />
          </div>
          <div class="form-group col-md-4">
            <label class="form-label">Address</label>
            <input type="text" class="form-control" name="associate_address[]" />
          </div>
          <div class="form-group col-md-4">
            <label class="form-label">Pincode</label>
            <input type="text" class="form-control" name="associate_pincode[]" />
          </div>
          <div class="form-group col-md-4">
            <label class="form-label">State</label>
            <select class="form-control" name="state[]">
              <option>UP</option>
              <option>MP</option>
              <option>Bihar</option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label class="form-label">District</label>
            <select class="form-control" name="district_name[]">
              <option>Lucknow</option>
              <option>Kanpur</option>
              <option>Prayagraj</option>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label class="form-label">Assembly</label>
            <select class="form-control" name="assembly_name[]">
              <option>Assembly 1</option>
              <option>Assembly 2</option>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label class="form-label">Part</label>
            <select class="form-control" name="part_name[]">
              <option>Part 1</option>
              <option>Part 2</option>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label class="form-label">Aadhar (Front)</label>
            <input type="file" class="form-control-file" name="aadhar_front[]" />
          </div>
          <div class="form-group col-md-3">
            <label class="form-label">Aadhar (Back)</label>
            <input type="file" class="form-control-file" name="aadhar_back[]" />
          </div>
        </div>
         <div class="text-center mb-4">
            <button class="btn btn-info" >Submit</button>
          </div>
        </form>

      </div>

    </div>

    <!-- Add/Remove Buttons -->
   
  </div>

 
</body>
</html>
=======
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Flexy Free Bootstrap Admin Template by WrapPixel</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/associate/assets/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('assets/associate/assets/css/styles.min.css') }}" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="{{ url('/') }}" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="{{ asset('assets/associate/assets/images/logos/logo.svg') }}" alt="">
                </a>
                <p class="text-center">Your Social Campaigns</p>
                <form>
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleInputtext1" name="name" aria-describedby="textHelp">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>    
                  </div>    
                  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign Up</button>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <a class="text-primary fw-bold" href="{{ route('password.request') }}">Forgot Password ?</a>
                    <a class="text-primary fw-bold" href="{{ route('login') }}">Sign In</a>
                  </div>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                    <a class="text-primary fw-bold ms-2" href="{{ route('login') }}">Sign In</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>
>>>>>>> 984eb22d97fcb297de473ab875d6ad398207b625
