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
