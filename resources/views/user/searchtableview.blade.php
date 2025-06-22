@extends('user.layout.main')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
  :root {
    --primary-color: #EF6603;
    --primary-dark: #d4530a;
    --light-bg: #f8f9fa;
    --shadow: 0 4px 15px rgba(0,0,0,0.1);
    --shadow-hover: 0 8px 25px rgba(0,0,0,0.15);
  }

  body {
    background-color: var(--light-bg);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .hero-section {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    padding: 60px 0;
    margin-bottom: 40px;
    border-radius: 0 0 30px 30px;
  }

  .logo-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
  }

  .logo-container img {
    max-height: 120px;
    filter: drop-shadow(0 4px 8px rgba(0,0,0,0.2));
    border-radius: 15px;
  }

  .video-carousel-container {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: var(--shadow);
  }

  .carousel-item iframe {
    border-radius: 20px;
  }

  .carousel-control-prev,
  .carousel-control-next {
    width: 50px;
    height: 50px;
    background: rgba(239, 102, 3, 0.8);
    border-radius: 50%;
    top: 50%;
    transform: translateY(-50%);
  }

  .carousel-control-prev {
    left: -25px;
  }

  .carousel-control-next {
    right: -25px;
  }

  .info-card {
    background: white;
    border-radius: 20px;
    padding: 30px;
    box-shadow: var(--shadow);
    margin-bottom: 30px;
    transition: all 0.3s ease;
  }

  .info-card:hover {
    box-shadow: var(--shadow-hover);
    transform: translateY(-5px);
  }

  .info-header {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    color: white;
    padding: 25px;
    border-radius: 15px;
    margin-bottom: 25px;
  }

  .info-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 0;
    border-bottom: 1px solid #eee;
  }

  .info-row:last-child {
    border-bottom: none;
  }

  .info-label {
    font-weight: 600;
    color: #555;
    display: flex;
    align-items: center;
    min-width: 180px;
  }

  .info-label i {
    margin-right: 8px;
    color: var(--primary-color);
    width: 20px;
  }

  .info-value {
    font-weight: 500;
    color: #333;
    text-align: right;
    flex: 1;
  }

  .booking-section {
    background: white;
    border-radius: 20px;
    padding: 30px;
    box-shadow: var(--shadow);
    margin-bottom: 30px;
  }

  .calendar-container {
    background: white;
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    margin-bottom: 20px;
  }

  .time-input-container {
    margin-top: 20px;
  }

  .time-input-container input {
    border-radius: 10px;
    border: 2px solid #e9ecef;
    padding: 12px 15px;
    font-size: 16px;
    transition: all 0.3s ease;
  }

  .time-input-container input:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(239, 102, 3, 0.25);
  }

  .confirmation-section {
    background: white;
    border-radius: 20px;
    padding: 30px;
    box-shadow: var(--shadow);
  }

  .confirmation-header {
    text-align: center;
    margin-bottom: 25px;
  }

  .confirmation-header h4 {
    color: var(--primary-color);
    font-weight: 700;
    margin-bottom: 10px;
  }

  .confirmation-text {
    color: #666;
    font-size: 14px;
    line-height: 1.5;
    margin-bottom: 20px;
  }

  .price-breakdown {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    color: white;
    padding: 25px;
    border-radius: 15px;
    margin: 20px 0;
    display: none;
  }

  .price-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 8px 0;
    border-bottom: 1px solid rgba(255,255,255,0.2);
  }

  .price-row:last-child {
    border-bottom: 2px solid white;
    font-weight: 700;
    font-size: 18px;
    margin-top: 10px;
    padding-top: 15px;
  }

  .btn-primary {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    border: none;
    border-radius: 10px;
    padding: 12px 30px;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(239, 102, 3, 0.3);
  }

  .btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(239, 102, 3, 0.4);
  }

  .form-control {
    border-radius: 10px;
    border: 2px solid #e9ecef;
    padding: 12px 15px;
    transition: all 0.3s ease;
  }

  .form-control:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(239, 102, 3, 0.25);
  }

  .rating-stars {
    color: #ffc107;
  }

  .status-badge {
    display: inline-block;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    background: rgba(239, 102, 3, 0.1);
    color: var(--primary-color);
  }

  @media (max-width: 768px) {
    .hero-section {
      padding: 40px 0;
    }
    
    .info-card,
    .booking-section,
    .confirmation-section {
      padding: 20px;
    }
    
    .info-row {
      flex-direction: column;
      align-items: flex-start;
      gap: 5px;
    }
    
    .info-value {
      text-align: left;
    }
  }
</style>

<!-- Hero Section with Videos -->
<section class="hero-section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
        <div class="logo-container">
          <img src="{{ asset('assets/lg.jpg') }}" class="img-fluid" alt="Company Logo">
        </div>
      </div>
      
      <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
        <div class="video-carousel-container">
          <div id="videoCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" 
                          src="https://www.youtube.com/embed/xxTg6FjWV00" 
                          allowfullscreen></iframe>
                </div>
              </div>
              <div class="carousel-item">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" 
                          src="https://www.youtube.com/embed/3JZ_D3ELwOQ" 
                          allowfullscreen></iframe>
                </div>
              </div>
            </div>
            
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
      </div>
      
      <div class="col-lg-3 col-md-6">
        <div class="logo-container">
          <img src="{{ asset('assets/lg.jpg') }}" class="img-fluid" alt="Company Logo">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Service Information -->
<div class="container">
  <div class="info-card">
    <div class="info-header">
      <h3 class="mb-0"><i class="fas fa-store mr-2"></i>Service Provider Details</h3>
    </div>
    
    <div class="row">
      <div class="col-lg-6">
        <div class="info-row">
          <span class="info-label"><i class="fas fa-briefcase"></i>Trade Name</span>
          <span class="info-value">{{ $service->title ?? 'N/A' }}</span>
        </div>
        <div class="info-row">
          <span class="info-label"><i class="fas fa-map-marker-alt"></i>Address</span>
          <span class="info-value">{{ $service->address ?? 'N/A' }}</span>
        </div>
        <div class="info-row">
          <span class="info-label"><i class="fas fa-mail-bulk"></i>Pincode</span>
          <span class="info-value">{{ $service->pincode ?? 'N/A' }}</span>
        </div>
        <div class="info-row">
          <span class="info-label"><i class="fas fa-user"></i>Associate Name</span>
          <span class="info-value">{{ $service->associate->name ?? 'N/A' }}</span>
        </div>
        <div class="info-row">
          <span class="info-label"><i class="fas fa-phone"></i>Mobile</span>
          <span class="info-value">{{ $service->associate->mobile ?? 'N/A' }}</span>
        </div>
        <div class="info-row">
          <span class="info-label"><i class="fas fa-envelope"></i>Email</span>
          <span class="info-value">{{ $service->associate->email ?? 'N/A' }}</span>
        </div>
      </div>
      
      <div class="col-lg-6">
        <div class="info-row">
          <span class="info-label"><i class="fas fa-calendar-check"></i>Experience</span>
          <span class="info-value">{{ $service->experience_year ?? 'N/A' }} Years</span>
        </div>
        <div class="info-row">
          <span class="info-label"><i class="fas fa-star"></i>Rating</span>
          <span class="info-value">
            <span class="rating-stars">
              @for($i = 1; $i <= 5; $i++)
                @if($i <= ($service->associate->rating ?? 0))
                  <i class="fas fa-star"></i>
                @else
                  <i class="far fa-star"></i>
                @endif
              @endfor
            </span>
            ({{ $service->associate->rating ?? 'N/A' }})
          </span>
        </div>
        <div class="info-row">
          <span class="info-label"><i class="fas fa-coins"></i>Revenue Type</span>
          <span class="info-value">
            <span class="status-badge">{{ $service->revenue_type ?? 'N/A' }}</span>
          </span>
        </div>
        <div class="info-row">
          <span class="info-label"><i class="fas fa-layer-group"></i>Sector</span>
          <span class="info-value">{{ $service->sector_name ?? 'N/A' }}</span>
        </div>
        <div class="info-row">
          <span class="info-label"><i class="fas fa-industry"></i>Industry</span>
          <span class="info-value">{{ $service->industry_name ?? 'N/A' }}</span>
        </div>
        <div class="info-row">
          <span class="info-label"><i class="fas fa-tags"></i>Sub Industry</span>
          <span class="info-value">{{ $service->sub_industry_name ?? 'N/A' }}</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Booking Section -->
  <div class="row">
    <div class="col-lg-6">
      <div class="booking-section">
        <h4 class="mb-4"><i class="fas fa-calendar-alt mr-2"></i>Select Date & Time</h4>
         <div class="row">
    <div class="col-lg-8">
      
        <div class="calendar-container">
          <div id="inline-calendar"></div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="time-input-container">
                  <label for="time-slot" class="font-weight-bold mb-2">
                    <i class="fas fa-clock mr-2"></i>Select Time
                  </label>
                  <input type="time" id="time-slot" class="form-control" name="time_slot" placeholder="Select Time">
                </div>



            </div>
        </div> 
      </div>
    </div>

    @php
        $amount = $service->amount ?? 0;
        $cgst = $amount * 0.09;
        $sgst = $amount * 0.09;
        $igst = 0; 
        $serviceCharges = 0;
        $otherCharges =  0;

        $grandTotal = $amount + $cgst + $sgst + $serviceCharges + $otherCharges;
    @endphp
    <div class="col-lg-6">
      <div class="confirmation-section">
        <div class="confirmation-header">
          <h4><i class="fas fa-check-circle mr-2"></i>Service Confirmation</h4>
          <p class="confirmation-text">
            Select your preferred date and time slot to proceed with the booking. 
            The pricing details will be displayed once you make your selection.
          </p>
        </div>

        <div class="price-breakdown" id="confirmation-header">
          <div class="price-row">
            <span><i class="fas fa-tag mr-2"></i>Service Amount</span>
            <span>₹{{ number_format($amount, 2) }}</span>
          </div>

          <div class="price-row">
            <span><i class="fas fa-cog mr-2"></i>Service Charges</span>
            <span>₹{{ number_format($serviceCharges, 2) }}</span>
          </div>

          <div class="price-row">
            <span><i class="fas fa-percent mr-2"></i>CGST (9%)</span>
            <span>₹{{ number_format($cgst, 2) }}</span>
          </div>

          <div class="price-row">
            <span><i class="fas fa-percent mr-2"></i>SGST (9%)</span>
            <span>₹{{ number_format($sgst, 2) }}</span>
          </div>

          <div class="price-row">
            <span><i class="fas fa-plus mr-2"></i>Other Charges</span>
            <span>₹{{ number_format($otherCharges, 2) }}</span>
          </div>

          <div class="price-row">
            <span><i class="fas fa-calculator mr-2"></i><strong>Grand Total</strong></span>
            <span><strong>₹{{ number_format($grandTotal, 2) }}</strong></span>
          </div>
        </div>

        <form method="POST" action="{{ route('order.submit') }}" id="order-form">
          @csrf
          <input type="hidden" name="service_id" value="{{ $service->id }}">
          <input type="hidden" name="associate_id" value="{{ $service->associate->id }}">
          <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
          <input type="hidden" name="amount" value="{{ $service->amount }}">
          <input type="hidden" id="selectedDate" name="date" required>
          <input type="hidden" id="selectedTime" name="time" required>

          <div class="form-group">
            <label for="note" class="font-weight-bold">
              <i class="fas fa-sticky-note mr-2"></i>Additional Notes (Optional)
            </label>
            <textarea name="note" class="form-control" rows="3" 
                      placeholder="Any special requirements or notes for the service provider..."></textarea>
          </div>

          <button type="submit" class="btn btn-primary btn-block btn-lg">
            <i class="fas fa-check mr-2"></i>Confirm Booking
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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

  // Initialize Flatpickr with custom styling
  flatpickr(calendarInput, {
    inline: true,
    minDate: "today",
    dateFormat: "Y-m-d",
    onChange: function(selectedDates, dateStr) {
      selectedDateInput.value = dateStr;
      isDateSelected = !!dateStr;
      toggleHeader();
      
      // Add visual feedback
      if (dateStr) {
        calendarInput.style.border = '2px solid #EF6603';
      }
    }
  });

  // Handle time input with visual feedback
  timeInput.addEventListener("change", function () {
    selectedTimeInput.value = this.value;
    isTimeSelected = !!this.value;
    toggleHeader();
    
    if (this.value) {
      this.style.borderColor = '#EF6603';
    }
  });

  // Show/hide confirmation section with animation
  function toggleHeader() {
    if (isDateSelected && isTimeSelected) {
      header.style.display = "block";
      header.style.animation = "fadeIn 0.5s ease-in";
    } else {
      header.style.display = "none";
    }
  }

  // Form validation with better UX
  document.getElementById("order-form").addEventListener("submit", function(e) {
    if (!selectedDateInput.value || !selectedTimeInput.value) {
      e.preventDefault();
      
      // Show specific error messages
      let message = "Please select ";
      if (!selectedDateInput.value && !selectedTimeInput.value) {
        message += "both a date and time";
      } else if (!selectedDateInput.value) {
        message += "a date";
      } else {
        message += "a time";
      }
      
      alert(message + " to proceed with booking.");
      
      // Highlight missing fields
      if (!selectedDateInput.value) {
        calendarInput.style.border = '2px solid #dc3545';
      }
      if (!selectedTimeInput.value) {
        timeInput.style.borderColor = '#dc3545';
      }
    }
  });
});

// Add CSS animation
const style = document.createElement('style');
style.textContent = `
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }
`;
document.head.appendChild(style);
</script>

@endsection