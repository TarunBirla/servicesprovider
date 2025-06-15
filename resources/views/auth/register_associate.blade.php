
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
      background: #EF6603;
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
    
    <div id="formContainer">
   
      <!-- Initial Form Block -->
      <div class="section form-block">
           <h3 class="text-center mb-4">PERSONAL DETAILS</h3>
        <form method="POST" action="{{ route('register.associate.submit') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="associate_name[]" />
          </div>
          <div class="form-group col-md-6">
            <label class="form-label">Mobile</label>
            <input type="text" class="form-control" name="associate_mobile[]" />
          </div>
           
          <div class="form-group col-md-6">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="associate_email[]" />
          </div>
          <div class="form-group col-md-6">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="associate_password[]" />
          </div>
          <div class="form-group col-md-6">
            <label class="form-label">Address</label>
            <input type="text" class="form-control" name="associate_address[]" />
          </div>
          <div class="form-group col-md-6">
            <label class="form-label">Pincode</label>
            <input type="text" class="form-control" name="associate_pincode[]" />
          </div>
          @php
              use Illuminate\Support\Facades\DB;
              $states = DB::table('states')->get();
            @endphp
          <div class="form-group col-md-6">
            <label class="form-label">State</label>
             <select class="form-control" id="state" name="state[]" style="height: 50px;">
                <option value="">Select State</option>
                @foreach($states as $state)
                  <option value="{{ $state->id }}">{{ $state->name }}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group col-md-6">
              <label class="form-label">District</label>
              <select class="form-control" id="district" name="district_name[]" style="height: 50px;">
                <option value="">Select District</option>
              </select>
          </div>

          <div class="form-group col-md-6">
              <label class="form-label">Assembly</label>
              <select class="form-control" id="assembly" name="assembly_name[]" style="height: 50px;">
                <option value="">Select Assembly</option>
              </select>
          </div>

          <div class="form-group col-md-6">
            <label class="form-label">Part</label>
            <select class="form-control" name="part_name[]">
              <option>Part 1</option>
              <option>Part 2</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label class="form-label">Aadhar (Front)</label>
            <input type="file" class="form-control-file" name="aadhar_front[]" />
          </div>
          <div class="form-group col-md-6">
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
</body>
</html>
