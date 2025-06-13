<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Professional Search</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link
    rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
  >
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <!-- FullCalendar CSS -->
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet" />
  <style>
    body {
      background: #fdf6e3;
    }
     .calendar-container {
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .highlight {
      background-color: #ffcc00;
      font-weight: bold;
    }
    .header {
      background-color: orange;
      padding: 15px;
      margin-bottom: 20px;
      border-radius: 8px;
    }
    
  </style>
</head>
<body>

<div class="container mt-4">
  <div class="header">
    <div class="row search-bar">
      <div class="col-lg-6">
        <label for="sector" class="font-weight-bold text-white">ASSOCIATE_TRADE_NAME</label></br>
        <label for="sector" class="font-weight-bold text-white">ASSOCIATE_TRADE_ADDRESS</label></br></br></br>
        <label for="sector" class="font-weight-bold text-white">ASSOCIATE_TRADE_PINCODE</label></br>
        <label for="sector" class="font-weight-bold text-white">ASSOCIATE_NAME</label></br>
        <label for="sector" class="font-weight-bold text-white">ASSOCIATE_MOBILE</label></br>
        <label for="sector" class="font-weight-bold text-white">ASSOCIATE_EMAIL</label>
        
      </div>
      <div class="col-lg-6">
       <label for="sector" class="font-weight-bold text-white">ASSOCIATE_EXPERIENCE</label></br>
        <label for="sector" class="font-weight-bold text-white">ASSOCIATE_RATING</label></br></br></br>
        <label for="sector" class="font-weight-bold text-white">ASSOCIATE_REVENUE_TYPE</label></br>
        <label for="sector" class="font-weight-bold text-white">SECTOR_NAME</label></br>
        <label for="sector" class="font-weight-bold text-white">INDUSTRY_NAME</label></br>
        <label for="sector" class="font-weight-bold text-white">SUB_INDUSTRY_NAME</label>
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
      <h4 class="mt-4 mb-4">YOUR SERVICE HAS BEEN SCHEDULED FOR (DATE) AND (TIME SLOT)
                   THE TENTATIVE AMOUNT WILL BE AS PER BELOW PLACED TABLE</h4>

        <div class="header">
            <div class="row search-bar">
              <div class="col-lg-6">
                <label for="sector" class="font-weight-bold text-white">ASSOCIATE_TRADE_NAME</label></br>
                <label for="sector" class="font-weight-bold text-white">ASSOCIATE_TRADE_ADDRESS</label></br></br></br>
                <label for="sector" class="font-weight-bold text-white">ASSOCIATE_TRADE_PINCODE</label></br>
                <label for="sector" class="font-weight-bold text-white">ASSOCIATE_NAME</label></br>
                <label for="sector" class="font-weight-bold text-white">ASSOCIATE_MOBILE</label></br>
                <label for="sector" class="font-weight-bold text-white">ASSOCIATE_EMAIL</label>
                
              </div>
              <div class="col-lg-6">
              <label for="sector" class="font-weight-bold text-white">ASSOCIATE_EXPERIENCE</label></br>
                <label for="sector" class="font-weight-bold text-white">ASSOCIATE_RATING</label></br></br></br>
                <label for="sector" class="font-weight-bold text-white">ASSOCIATE_REVENUE_TYPE</label></br>
                <label for="sector" class="font-weight-bold text-white">SECTOR_NAME</label></br>
                <label for="sector" class="font-weight-bold text-white">INDUSTRY_NAME</label></br>
                <label for="sector" class="font-weight-bold text-white">SUB_INDUSTRY_NAME</label>
              </div>
            
            </div>
      <button  class="btn btn-primary mt-4">CONFIRM Order</button>

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
</body>
</html>
