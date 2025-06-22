<!-- // resources/views/rating/history.blade.php -->
<!--  -->
@extends('user.layout.main')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
  .rating-history-container {
    max-width: 1000px;
    margin: 50px auto;
    padding: 0 20px;
  }

  .rating-card {
    background: white;
    border-radius: 15px;
    padding: 25px;
    margin-bottom: 20px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
  }

  .rating-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
  }

  .rating-stars {
    color: #ffc107;
    font-size: 1.2rem;
  }

  .rating-meta {
    color: #666;
    font-size: 0.9rem;
  }
</style>

<div class="rating-history-container">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="fas fa-history mr-2"></i>Rating History</h2>
    <a href="{{ route('home') }}" class="btn btn-primary">
      <i class="fas fa-home mr-2"></i>Back to Home
    </a>
  </div>

  @if($ratings->count() > 0)
    @foreach($ratings as $rating)
    <div class="rating-card">
      <div class="row">
        <div class="col-md-8">
          <h5>{{ $rating->service->title ?? 'Service' }}</h5>
          <div class="rating-stars mb-2">
            @for($i = 1; $i <= 5; $i++)
              @if($i <= $rating->rating)
                <i class="fas fa-star"></i>
              @else
                <i class="far fa-star"></i>
              @endif
            @endfor
            <span class="ml-2">({{ $rating->rating }}/5)</span>
          </div>
          <p class="mb-2"><strong>Name:</strong> {{ $rating->name }}</p>
          @if($rating->note)
            <p class="mb-2"><strong>Note:</strong> {{ $rating->note }}</p>
          @endif
          <div class="rating-meta">
            <i class="fas fa-calendar mr-1"></i>{{ $rating->formatted_date }}
          </div>
        </div>
        <div class="col-md-4 text-right">
          <button class="btn btn-sm btn-danger" onclick="deleteRating({{ $rating->id }})">
            <i class="fas fa-trash mr-1"></i>Delete
          </button>
        </div>
      </div>
    </div>
    @endforeach

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
      {{ $ratings->links() }}
    </div>
  @else
    <div class="text-center py-5">
      <i class="fas fa-star" style="font-size: 4rem; color: #ddd; margin-bottom: 20px;"></i>
      <h4>No Ratings Yet</h4>
      <p class="text-muted">You haven't submitted any ratings yet.</p>
      <a href="{{ route('home') }}" class="btn btn-primary">
        <i class="fas fa-home mr-2"></i>Go to Home
      </a>
    </div>
  @endif
</div>

<script>
function deleteRating(ratingId) {
    if (confirm('Are you sure you want to delete this rating?')) {
        fetch(`/rating/${ratingId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Failed to delete rating.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred.');
        });
    }
}
</script>
