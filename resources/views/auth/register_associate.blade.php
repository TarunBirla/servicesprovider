
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
    .btn-color{
      background-color: #EF6603;
      color: #fff;
padding: 10px 20px;
border-radius: 5px;
    }
    .section {
      background: #fff;
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
    
  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif
  @if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

    <div id="formContainer">
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
                          $states = DB::table('states')->select('st_ut_code as id','name')->get();
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
           
            <select class="form-control" id="assembly" name="part_name[]" style="height: 50px;">
                                      <option value="">Select part</option>
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
</body>
</html>
