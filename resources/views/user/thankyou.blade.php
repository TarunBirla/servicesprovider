<!-- 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5 text-center">
    <h1 class="text-success">Thank You!</h1>
    <p class="lead">Your service order has been placed successfully.</p>
    <a href="{{ route('home') }}" class="btn btn-primary mt-3">Back to Home</a>
    <a href="{{ route('ordertable') }}" class="btn btn-warning mt-3">Order History</a>

</div>
</body>
</html> -->





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<style>
  :root {
    --primary-color: #EF6603;
    --primary-dark: #d4530a;
    --success-green: #28a745;
    --shadow: 0 4px 15px rgba(0,0,0,0.1);
  }

  body {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .thank-you-container {
    max-width: 800px;
    margin: 50px auto;
    padding: 0 20px;
  }

  .success-card {
    background: white;
    border-radius: 25px;
    padding: 40px;
    box-shadow: var(--shadow);
    text-align: center;
    margin-bottom: 30px;
    border-top: 5px solid var(--success-green);
  }

  .success-icon {
    font-size: 4rem;
    color: var(--success-green);
    margin-bottom: 20px;
    animation: bounce 2s infinite;
  }

  .success-title {
    color: var(--success-green);
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 15px;
  }

  .rating-card {
    background: white;
    border-radius: 25px;
    padding: 35px;
    box-shadow: var(--shadow);
    margin-bottom: 30px;
  }

  .rating-header {
    text-align: center;
    margin-bottom: 30px;
  }

  .rating-header h3 {
    color: var(--primary-color);
    font-weight: 700;
  }

  .star-rating {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin: 25px 0;
  }

  .star {
    font-size: 2.5rem;
    color: #ddd;
    cursor: pointer;
    transition: all 0.3s ease;
  }

  .star:hover,
  .star.selected {
    color: #ffc107;
    transform: scale(1.1);
  }

  .selected-rating {
    text-align: center;
    margin: 15px 0;
    font-size: 18px;
    font-weight: 600;
    color: var(--primary-color);
    display: none;
  }

  .form-control {
    border-radius: 12px;
    border: 2px solid #e9ecef;
    padding: 15px;
    font-size: 16px;
  }

  .form-control:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(239, 102, 3, 0.25);
  }

  .btn-submit-rating {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    border: none;
    border-radius: 12px;
    padding: 15px 40px;
    font-weight: 600;
    color: white;
    font-size: 18px;
    width: 100%;
    transition: all 0.3s ease;
  }

  .btn-submit-rating:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(239, 102, 3, 0.4);
  }

  .btn-submit-rating:disabled {
    opacity: 0.6;
    cursor: not-allowed;
  }

  .action-buttons {
    display: flex;
    gap: 15px;
    justify-content: center;
    margin-top: 25px;
  }

  .btn-action {
    padding: 12px 30px;
    border-radius: 12px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    min-width: 180px;
  }

  .btn-primary-action {
    background: linear-gradient(135deg, #007bff, #0056b3);
    color: white;
  }

  .btn-warning-action {
    background: linear-gradient(135deg, #ffc107, #e0a800);
    color: #212529;
  }

  .rating-success {
    display: none;
    text-align: center;
    padding: 30px;
    background: linear-gradient(135deg, var(--success-green), #1e7e34);
    color: white;
    border-radius: 15px;
    margin-top: 20px;
  }

  .loading-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    z-index: 9999;
  }

  .loading-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: white;
    padding: 30px;
    border-radius: 15px;
    text-align: center;
  }

  .spinner {
    border: 4px solid #f3f3f3;
    border-top: 4px solid var(--primary-color);
    border-radius: 50%;
    width: 50px;
    height: 50px;
    animation: spin 1s linear infinite;
    margin: 0 auto 20px;
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }

  @keyframes bounce {
    0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
    40% { transform: translateY(-10px); }
    60% { transform: translateY(-5px); }
  }

  @media (max-width: 768px) {
    .action-buttons {
      flex-direction: column;
      align-items: center;
    }
  }
</style>
<body>
  


<div class="thank-you-container">
  <!-- Success Card -->
  <div class="success-card">
    <div class="success-icon">
      <i class="fas fa-check-circle"></i>
    </div>
    <h1 class="success-title">Thank You!</h1>
    <p class="lead">Your service order has been placed successfully.</p>
  </div>

  <!-- Rating Card -->
  <div class="rating-card" id="rating-card">
    <div class="rating-header">
      <h3><i class="fas fa-star mr-2"></i>Rate Your Experience</h3>
      <p class="text-muted">Please share your rating to help others</p>
    </div>

    <form method="POST" id="rating-form">
    
      
      <!-- Star Rating -->
      <div class="star-rating">
        <i class="fas fa-star star" data-rating="1"></i>
        <i class="fas fa-star star" data-rating="2"></i>
        <i class="fas fa-star star" data-rating="3"></i>
        <i class="fas fa-star star" data-rating="4"></i>
        <i class="fas fa-star star" data-rating="5"></i>
      </div>
      
      <div class="selected-rating" id="selected-rating">
        <i class="fas fa-heart mr-2"></i>
        You selected <span id="rating-text">0</span> stars
      </div>

      <!-- Name Field -->
      <div class="form-group">
        <label for="name" class="font-weight-bold">
          <i class="fas fa-user mr-2"></i>Your Name
        </label>
        <input type="text" name="name" id="name" class="form-control" 
               placeholder="Enter your name" required>
      </div>

      <!-- Note Field -->
      <div class="form-group">
        <label for="note" class="font-weight-bold">
          <i class="fas fa-sticky-note mr-2"></i>Additional Notes (Optional)
        </label>
        <textarea name="note" id="note" class="form-control" rows="3" 
                  placeholder="Share your experience and feedback..."></textarea>
      </div>

      <input type="hidden" name="rating" id="rating-value">

      <button type="submit" class="btn-submit-rating" id="submit-btn" disabled>
        <i class="fas fa-check mr-2"></i>Submit Rating
      </button>
    </form>

    <!-- Success Message -->
    <div class="rating-success" id="rating-success">
      <i class="fas fa-check-circle" style="font-size: 3rem; margin-bottom: 15px;"></i>
      <h4>Rating Submitted Successfully!</h4>
      <p>Thank you for your valuable feedback!</p>
    </div>
  </div>

  <!-- Action Buttons -->
  <div class="action-buttons" id="action-buttons">
    <a href="{{ route('home') }}" class="btn-action btn-primary-action">
      <i class="fas fa-home mr-2"></i>Back to Home
    </a>
    <a href="{{ route('rating.history') }}" class="btn-action btn-warning-action">
      <i class="fas fa-history mr-2"></i>Rating History
    </a>
    <a href="{{ route('ordertable') }}" class="btn-action btn-primary-action">Order History</a>

  </div>
</div>

<!-- Loading Overlay -->
<div class="loading-overlay" id="loading-overlay">
  <div class="loading-content">
    <div class="spinner"></div>
    <h5>Please wait...</h5>
    <p>Submitting your rating...</p>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    let selectedRating = 0;
    
    // Star rating functionality
    $('.star').on('click', function() {
        selectedRating = $(this).data('rating');
        updateStars();
        updateSubmitButton();
        
        $('#rating-value').val(selectedRating);
        $('#selected-rating').show();
        $('#rating-text').text(selectedRating);
    });

    $('.star').on('mouseover', function() {
        const hoverRating = $(this).data('rating');
        highlightStars(hoverRating);
    });

    $('.star-rating').on('mouseleave', function() {
        updateStars();
    });

    function highlightStars(rating) {
        $('.star').each(function(index) {
            if (index < rating) {
                $(this).addClass('selected');
            } else {
                $(this).removeClass('selected');
            }
        });
    }

    function updateStars() {
        $('.star').each(function(index) {
            if (index < selectedRating) {
                $(this).addClass('selected');
            } else {
                $(this).removeClass('selected');
            }
        });
    }

    function updateSubmitButton() {
        const nameValue = $('#name').val().trim();
        if (selectedRating > 0 && nameValue.length > 0) {
            $('#submit-btn').prop('disabled', false);
        } else {
            $('#submit-btn').prop('disabled', true);
        }
    }

    // Check name field
    $('#name').on('input', function() {
        updateSubmitButton();
    });

    // Form submission
    $('#rating-form').on('submit', function(e) {
        e.preventDefault();
        
        if (selectedRating === 0) {
            alert('Please select a rating before submitting.');
            return;
        }

        const nameValue = $('#name').val().trim();
        if (nameValue.length === 0) {
            alert('Please enter your name.');
            $('#name').focus();
            return;
        }

        // Show loading
        $('#loading-overlay').show();
        $('#submit-btn').prop('disabled', true);

        // Prepare form data
        const formData = {
            serviceid: $('input[name="serviceid"]').val(),
            name: nameValue,
            rating: selectedRating,
            note: $('#note').val(),
            _token: $('input[name="_token"]').val()
        };

        // Submit via AJAX
        $.ajax({
            url: '{{ route("rating.submit") }}',
            method: 'POST',
            data: formData,
            success: function(response) {
                $('#loading-overlay').hide();
                
                if (response.success) {
                    // Hide form and show success message
                    $('#rating-form').hide();
                    $('#rating-success').show();
                    
                    // Show success notification
                    showNotification('Rating submitted successfully!', 'success');
                } else {
                    showNotification(response.message || 'Failed to submit rating.', 'error');
                    $('#submit-btn').prop('disabled', false);
                }
            },
            error: function(xhr) {
                $('#loading-overlay').hide();
                $('#submit-btn').prop('disabled', false);
                
                let errorMessage = 'An error occurred. Please try again.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                
                showNotification(errorMessage, 'error');
            }
        });
    });

    function showNotification(message, type) {
        const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
        const icon = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-triangle';
        
        const notification = `
            <div class="alert ${alertClass} alert-dismissible fade show" role="alert" style="position: fixed; top: 20px; right: 20px; z-index: 10000; min-width: 300px;">
                <i class="fas ${icon} mr-2"></i>
                ${message}
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        `;
        
        $('body').append(notification);
        
        // Auto remove after 5 seconds
        setTimeout(function() {
            $('.alert').fadeOut();
        }, 5000);
    }
});
</script>
</body>
</html>
