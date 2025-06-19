@extends('user.layout.main')
  @section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <!-- FullCalendar CSS -->
<!-- Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<!-- Bootstrap 4 CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">




  <style>
    video {
  max-height: 400px;
  object-fit: cover;
}

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
            <div class="col-lg-3 mt-5" >
          <img src="{{ asset('assets/lg.jpg') }}" class="img-fluid" alt="">
          </div>
       <div class="col-lg-6 mt-5 text-center">
          <div id="videoCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

              <!-- Slide 1 -->
              <div class="carousel-item active">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" 
                          src="https://www.youtube.com/embed/xxTg6FjWV00" 
                          allowfullscreen></iframe>
                </div>
              </div>

            

              <!-- Slide 3 -->
              <div class="carousel-item">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" 
                          src="https://www.youtube.com/embed/3JZ_D3ELwOQ" 
                          allowfullscreen></iframe>
                </div>
              </div>

            </div>

            <!-- Controls -->
            <a class="carousel-control-prev" href="#videoCarousel" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#videoCarousel" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>


          <div class="col-lg-3 mt-5" >
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
    <input  type="time" id="time-slot" class="form-control" name="time_slot" placeholder="Select Time">
  </div>
</div>

              <div class="col-lg-6">
               <h4>SERVICE CONFIRMATION</h4>
                          <span class="mt-4 mb-4">YOUR SERVICE HAS BEEN SCHEDULED FOR (DATE) AND (TIME SLOT)
                                THE TENTATIVE AMOUNT WILL BE AS PER BELOW PLACED TABLE</span>

                <div class="header" id="confirmation-header" style="display: none;">
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
                                          <input type="hidden" id="selectedTime" name="time" required>



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

<!-- Bootstrap 4 JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const calendarInput = document.getElementById('inline-calendar');
    const timeInput = document.getElementById('time-slot');
    const selectedDateInput = document.getElementById('selectedDate');
    const selectedTimeInput = document.getElementById('selectedTime');
    const header = document.getElementById('confirmation-header');

    let isDateSelected = false;
    let isTimeSelected = false;

    // Initialize Flatpickr
    flatpickr(calendarInput, {
      inline: true,
      minDate: "today",
      dateFormat: "Y-m-d",
      onChange: function(selectedDates, dateStr) {
        selectedDateInput.value = dateStr;
        isDateSelected = !!dateStr;
        toggleHeader();
      }
    });

    // Handle time input
    timeInput.addEventListener("change", function () {
      selectedTimeInput.value = this.value;
      isTimeSelected = !!this.value;
      toggleHeader();
    });

    // Show header if both date and time are selected
    function toggleHeader() {
      if (isDateSelected && isTimeSelected) {
        header.style.display = "block";
      } else {
        header.style.display = "none";
      }
    }

    // Prevent form submission without both values
    document.getElementById("order-form").addEventListener("submit", function(e) {
      if (!selectedDateInput.value || !selectedTimeInput.value) {
        e.preventDefault();
        alert("Please select both a date and a time.");
      }
    });
  });
</script>








@endsection

