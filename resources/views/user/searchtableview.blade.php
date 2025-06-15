@extends('user.layout.main')
  @section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <!-- FullCalendar CSS -->
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet" />
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
            <div class="col-lg-3" >
          <img src="{{ asset('assets/lg.jpg') }}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 mt-5 text-center" >
            <h1>Provider Details</h1>
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
              <div class="calendar-container">
                <div id="calendar"></div>
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
                      <label for="sector" class="font-weight-bold text-white">RS. 0.00</label></br>

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
                  <button  class="btn btn-primary mt-4">Confirm Order</button>
                </div>
              </div>
            </div>
          </div>
      </div>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      height: 500,
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      events: [
        {
          title: 'Meeting with Client',
          start: '2025-06-14',
        },
        {
          title: 'Service Deadline',
          start: '2025-06-18'
        }
      ]
    });
    calendar.render();
  });
</script>

@endsection

