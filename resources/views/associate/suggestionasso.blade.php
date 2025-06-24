@extends('associate.layout.main')
@section('content')
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!-- Sidebar Start -->
    
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      
      <!--  Header End -->
      <div class="body-wrapper-inner">
        <div class="container-fluid">
          <!--  Row 1 -->
      

          

<div class="container ">
    <div class="row justify-content-center ">
        <div class="col-md-10 ">
            <div class="card shadow-lg">
                <div class="card-header submitsuggention">
                    <h4 class="mb-0 text-white text-center"><i class="fas fa-lightbulb"></i> Submit Your Suggestion</h4>
                </div>
                <div class="card-body p-5">
                    <form id="suggestionForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="hidden" class="form-control" id="associate_id" name="associate_id" value="{{ auth()->user()->id }}">
                                <input type="hidden" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}">
                                <input type="hidden" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}">

                                
                            </div>
                           
                            
                        </div>
                        
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="subject" name="subject" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="message" class="form-label">Your Suggestion <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="message" name="message" rows="6" required placeholder="Please describe your suggestion in detail..."></textarea>
                            <div class="invalid-feedback"></div>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-lg submitsuggention" id="submitBtn">
                                <i class="fas fa-paper-plane"></i> Submit Suggestion
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="successModalLabel">
                    <i class="fas fa-check-circle"></i> Success!
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <div class="mb-3">
                    <i class="fas fa-check-circle text-success" style="font-size: 3rem;"></i>
                </div>
                <h5>Thank you for your suggestion!</h5>
                <p class="mb-0">Your suggestion has been submitted successfully. We'll review it and get back to you soon.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Error Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="errorModalLabel">
                    <i class="fas fa-exclamation-triangle"></i> Error!
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <div class="mb-3">
                    <i class="fas fa-exclamation-triangle text-danger" style="font-size: 3rem;"></i>
                </div>
                <h5>Something went wrong!</h5>
                <p class="mb-0" id="errorMessage">Please try again later.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border: none;
        border-radius: 15px;
    }
    
    .card-header {
        border-radius: 15px 15px 0 0 !important;
        padding: 1.5rem;
    }
    
    .form-control {
        border-radius: 8px;
        padding: 12px 15px;
        border: 2px solid #e9ecef;
        transition: all 0.3s ease;
    }
    .submitsuggention{
        background-color: #EF6603;
        border-color: #EF6603;
        color:#fff;
    }
    .form-control:focus {
        border-color:#EF6603;
        box-shadow: 0 0 0 0.1rem #EF6603;
    }
    
    .btn-primary {
        border-radius: 8px;
        padding: 12px 30px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px #dc2626;
    }
    
    .invalid-feedback {
        display: block;
    }
    
    .form-control.is-invalid {
        border-color: #EF6603;
    }
    
    .spinner-border-sm {
        width: 1rem;
        height: 1rem;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('suggestionForm');
    const submitBtn = document.getElementById('submitBtn');
    const successModal = new bootstrap.Modal(document.getElementById('successModal'));
    const errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
    
    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        // Clear previous errors
        clearErrors();
        
        // Show loading state
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Submitting...';
        
        try {
            const formData = new FormData(form);
            const response = await fetch('{{ route("suggestions.store.associate") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                }
            });
            
            const data = await response.json();
            
            if (data.success) {
                form.reset();
                successModal.show();
            } else {
                if (data.errors) {
                    showErrors(data.errors);
                } else {
                    showErrorModal(data.message || 'Something went wrong!');
                }
            }
        } catch (error) {
            console.error('Error:', error);
            showErrorModal('Network error. Please check your connection.');
        } finally {
            // Reset button state
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Submit Suggestion';
        }
    });
    
    function clearErrors() {
        const errorElements = document.querySelectorAll('.invalid-feedback');
        const inputElements = document.querySelectorAll('.form-control');
        
        errorElements.forEach(el => el.textContent = '');
        inputElements.forEach(el => el.classList.remove('is-invalid'));
    }
    
    function showErrors(errors) {
        for (const [field, messages] of Object.entries(errors)) {
            const input = document.getElementById(field);
            const errorDiv = input.nextElementSibling;
            
            if (input && errorDiv) {
                input.classList.add('is-invalid');
                errorDiv.textContent = messages[0];
            }
        }
    }
    
    function showErrorModal(message) {
        document.getElementById('errorMessage').textContent = message;
        errorModal.show();
    }
});
</script>

        </div>
      </div>
    </div>
  </div>
  @endsection