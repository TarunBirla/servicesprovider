@extends('user.layout.main')
  @section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <!-- FullCalendar CSS -->
<!-- Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


  <style>
     .calendar-container {
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .highlight {
      background-color: #EF6603;
      font-weight: bold;
    }
    .header {
      background-color: #EF6603;
      padding: 15px;
      margin-bottom: 20px;
      border-radius: 8px;
    }
   
    
  </style>
      <section id="features" class="features section">
        <div class="container ">
          <div class="row">
            <div class="col-lg-3 mt-3" >
          <img src="{{ asset('assets/lg.jpg') }}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 mt-5 text-center" >
            <h1>Provider Details</h1>
          </div>
          <div class="col-lg-3 mt-3" >
          <img src="{{ asset('assets/lg.jpg') }}" class="img-fluid" alt="">
          </div>
          </div>
        </div>
      </section>
      <div class="container mt-4">
        <div class="header">
          <div class="row search-bar">
            <div class="col-lg-6">
              <label for="sector" class="font-weight-bold text-white">Associate Trade Name:-</label>
               <label for="sector" class="font-weight-bold text-white">{{ $service->title ?? 'N/A' }}</label></br>

              <label for="sector" class="font-weight-bold text-white">Associate Trade Address:-</label>
              <label for="sector" class="font-weight-bold text-white">{{ $service->address ?? 'N/A' }}</label>
              </br>

              <label for="sector" class="font-weight-bold text-white">Associate Trade Pincode:-</label>
              <label for="sector" class="font-weight-bold text-white">{{ $service->pincode ?? 'N/A' }}</label>
              <br>

              <label for="sector" class="font-weight-bold text-white">Associate Name:- </label>
              <label for="sector" class="font-weight-bold text-white">{{ $service->associate->name ?? 'N/A' }}</label>
              </br>

              <label for="sector" class="font-weight-bold text-white">Associate Mobile:-  </label>
              <label for="sector" class="font-weight-bold text-white">{{ $service->associate->mobile ?? 'N/A' }}</label></br>

              <label for="sector" class="font-weight-bold text-white">Associate Email :-</label>
              <label for="sector" class="font-weight-bold text-white">{{ $service->associate->email ?? 'N/A' }}</label>

            </div>
            <div class="col-lg-6">
            <label for="sector" class="font-weight-bold text-white">Associate Experience:-</label>
              <label for="sector" class="font-weight-bold text-white">{{ $service->experience_year ?? 'N/A' }}</label>
              </br>

              <label for="sector" class="font-weight-bold text-white">Associate Rating:-</label>
              <label for="sector" class="font-weight-bold text-white">{{ $service->associate->rating ?? 'N/A' }}</label>
              </br>

              <label for="sector" class="font-weight-bold text-white">Associate Revenue Type:- </label>
              <label for="sector" class="font-weight-bold text-white">{{ $service->revenue_type ?? 'N/A' }}</label>
              <br>

              <label for="sector" class="font-weight-bold text-white">Sector Name:-</label>
              <label for="sector" class="font-weight-bold text-white">{{ $service->sector_name ?? 'N/A' }}</label>
              <br>

              <label for="sector" class="font-weight-bold text-white">Industry Name:-</label>
              <label for="sector" class="font-weight-bold text-white">{{ $service->industry_name ?? 'N/A' }}</label>
              <br>

              <label for="sector" class="font-weight-bold text-white">Sub Industry Name:-</label>
              <label for="sector" class="font-weight-bold text-white">{{ $service->sub_industry_name ?? 'N/A' }}</label>
            </div>

          </div>
        </div>

          <div class="row ">
           <div class="col-lg-6">
  <div class="d-flex justify-content-center mt-4">
    <div id="inline-calendar" class="border rounded"></div>
  </div>
</div>

              <div class="col-lg-6">
               <h4>SERVICE CONFIRMATION</h4>
                          <span class="mt-4 mb-4">YOUR SERVICE HAS BEEN SCHEDULED FOR (DATE) AND (TIME SLOT)
                                THE TENTATIVE AMOUNT WILL BE AS PER BELOW PLACED TABLE</span>

                <div class="header">
                  <div class="row search-bar">
                    <div class="col-lg-12">
                      <label for="sector" class="font-weight-bold text-white">Amount:- </label>
                      <label for="sector" class="font-weight-bold text-white">RS. {{ $service->amount ?? 'N/A' }}</label></br>

                      <label for="sector" class="font-weight-bold text-white">Service Charges:- </label>  
                      <label for="sector" class="font-weight-bold text-white">RS. 0.00</label></br>

                      <label for="sector" class="font-weight-bold text-white">IGST/CGST:- </label>
                      <label for="sector" class="font-weight-bold text-white">RS. 0.00</label></br>

                      <label for="sector" class="font-weight-bold text-white">SGST:- </label>
                      <label for="sector" class="font-weight-bold text-white">RS. 0.00</label></br>

                      <label for="sector" class="font-weight-bold text-white">Other:- </label>
                      <label for="sector" class="font-weight-bold text-white">RS. 0.00</label></br>
                      
                      <label for="sector" class="font-weight-bold text-white">Grand Total:- </label>
                      <label for="sector" class="font-weight-bold text-white">RS. 0.00</label></br>

                      <label for="sector" class="font-weight-bold text-white">Amount In Words:- </label>
                      <label for="sector" class="font-weight-bold text-white">RS. 0.00</label></br>

                    </div>
                  </div>
                </div>

                                   <form method="POST" action="{{ route('order.submit') }}">
                                            @csrf
                                            <input type="hidden" name="service_id" value="{{ $service->id }}">
                                            <input type="hidden" name="associate_id" value="{{ $service->associate->id }}">
                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                            <input type="hidden" name="amount" value="{{ $service->amount }}">
                                            <input type="hidden" id="selectedDate" name="date" required>


                                            <div class="form-group mt-3">
                                              <label for="note">Note (optional)</label>
                                              <textarea name="note" class="form-control" rows="3"></textarea>
                                            </div>

                                            <button type="submit" class="btn btn-primary mt-3 mb-4">Confirm Order</button>
                                          </form>
                                        </div>
                                      </div>

             
            </div>
          </div>
      </div>

  </div>

<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>



<script>
  document.addEventListener('DOMContentLoaded', function () {
    const hiddenDateInput = document.getElementById('selectedDate');

    flatpickr("#inline-calendar", {
      inline: true, // ✅ Always visible calendar
      minDate: "today", // Optional: disable past dates
      dateFormat: "Y-m-d",
      onChange: function(selectedDates, dateStr) {
        hiddenDateInput.value = dateStr;
        console.log("📅 Selected date:", dateStr);
      }
    });

    // Prevent form submission without date
    document.querySelector('form').addEventListener('submit', function (e) {
      if (!hiddenDateInput.value) {
        e.preventDefault();
        alert('Please select a date before submitting.');
      }
    });
  });
</script>








@endsection

