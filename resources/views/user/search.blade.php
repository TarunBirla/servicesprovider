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
  <style>
    body {
      background: #fdf6e3;
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
    table th {
      background: #ff9900;
      color: white;
    }
    table td {
      background: #ffcc66;
    }
    table .row-alt td {
      background: #ffff99;
    }
    .search-bar {
      margin-top: 20px;
      margin-bottom: 30px;
    }
  </style>
</head>
<body>

<div class="container mt-4">
  <div class="header">
    <div class="row search-bar">
      <div class="col-lg-5">
        <label for="sector" class="font-weight-bold text-white">Sector</label>
        <select id="sector" class="form-control">
          <option value="">Select Sector</option>
          <option value="Sector 1">Sector 1</option>
          <option value="Sector 2">Sector 2</option>
        </select>
      </div>
      <div class="col-lg-5">
        <label for="coverage" class="font-weight-bold text-white">Coverage Area</label>
        <select id="coverage" class="form-control">
          <option value="">Select Coverage</option>
          <option value="UP">UP</option>
          <option value="MP">MP</option>
        </select>
      </div>
      <div class="col-lg-2 d-flex align-items-end">
        <button class="btn btn-dark btn-block">Search</button>
      </div>
    </div>
  </div>

  
  <div class="table-responsive">
    <table class="table table-bordered text-center">
      <thead>
        <tr>
          <th>GRID</th>
          <th>SERVICE DETAIL</th>
          <th>CONTACT</th>
          <th>EXPERIENCE</th>
          <th>REVENUE</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>(1)</td>
          <td>
            <div class="highlight">ASSOCIATE_TRADE_NAME</div>
            ASSOCIATE_TRADE_ADDRESS<br>
            ASSOCIATE_TRADE_PINCODE
          </td>
          <td>
            ASSOCIATE_NAME<br>
            ASSOCIATE_MOBILE<br>
            <span class="text-primary">ASSOCIATE_EMAIL</span>
          </td>
          <td>
            ASSOCIATE_EXPERIENCE<br>
            ASSOCIATE_RATING<br>
            ASSOCIATE_REVIEW
          </td>
          <td class="text-danger">
            <a href="/searchtable">View</a>
            
          </td>
        </tr>
       
      </tbody>
    </table>
  </div>
</div>

</body>
</html>
