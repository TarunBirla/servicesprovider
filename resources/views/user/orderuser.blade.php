@extends('user.layout.main')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

<style>
  :root {
    --primary-color: #EF6603;
    --primary-dark: #d4530a;
    --light-bg: #f8f9fa;
    --success-color: #28a745;
    --warning-color: #ffc107;
    --danger-color: #dc3545;
    --info-color: #17a2b8;
    --shadow: 0 4px 15px rgba(0,0,0,0.1);
    --shadow-hover: 0 8px 25px rgba(0,0,0,0.15);
  }

  body {
    background-color: var(--light-bg);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .main {
    min-height: 100vh;
    padding: 60px 0;
  }

  .page-header {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    color: white;
    padding: 40px 0;
    margin-bottom: 40px;
    border-radius: 0 0 30px 30px;
    position: relative;
    overflow: hidden;
  }

  .page-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="25" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="25" r="1" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    opacity: 0.1;
  }

  .page-header h1 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 10px;
    position: relative;
    z-index: 1;
  }

  .page-header p {
    font-size: 1.1rem;
    opacity: 0.9;
    margin-bottom: 0;
    position: relative;
    z-index: 1;
  }

  .orders-container {
    background: white;
    border-radius: 20px;
    padding: 30px;
    box-shadow: var(--shadow);
    margin-bottom: 30px;
  }

  .orders-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    padding-bottom: 15px;
    border-bottom: 2px solid #f1f3f4;
  }

  .orders-stats {
    display: flex;
    gap: 20px;
    margin-bottom: 30px;
  }

  .stat-card {
    background: linear-gradient(135deg, #FA822D 0%, #764ba2 100%);
    color: white;
    padding: 20px;
    border-radius: 15px;
    text-align: center;
    flex: 1;
    min-width: 150px;
  }

  .stat-card.pending {
    background: linear-gradient(135deg, var(--warning-color) 0%, #fd7e14 100%);
  }

  .stat-card.confirmed {
    background: linear-gradient(135deg, var(--success-color) 0%, #20c997 100%);
  }

  .stat-card.cancelled {
    background: linear-gradient(135deg, var(--danger-color) 0%, #e83e8c 100%);
  }

  .stat-number {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 5px;
  }

  .stat-label {
    font-size: 0.9rem;
    opacity: 0.9;
  }

  .order-card {
    background: white;
    border-radius: 15px;
    padding: 25px;
    margin-bottom: 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    border-left: 4px solid var(--primary-color);
    transition: all 0.3s ease;
  }

  .order-card:hover {
    box-shadow: var(--shadow-hover);
    transform: translateY(-2px);
  }

  .order-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
  }

  .order-id {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--primary-color);
  }

  .order-date {
    color: #666;
    font-size: 0.9rem;
  }

  .order-details {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
    margin-bottom: 20px;
  }

  .detail-item {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .detail-icon {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background: rgba(239, 102, 3, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-color);
  }

  .detail-content {
    flex: 1;
  }

  .detail-label {
    font-size: 0.8rem;
    color: #666;
    margin-bottom: 2px;
  }

  .detail-value {
    font-weight: 600;
    color: #333;
  }

  .order-note {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 10px;
    margin-top: 15px;
    font-style: italic;
    color: #666;
  }

  .status-badge {
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .status-pending {
    background: linear-gradient(135deg, var(--warning-color), #fd7e14);
    color: white;
  }

  .status-confirmed {
    background: linear-gradient(135deg, var(--success-color), #20c997);
    color: white;
  }

  .status-cancelled {
    background: linear-gradient(135deg, var(--danger-color), #e83e8c);
    color: white;
  }

  .status-completed {
    background: linear-gradient(135deg, var(--info-color), #6f42c1);
    color: white;
  }

  .empty-state {
    text-align: center;
    padding: 60px 20px;
    color: #666;
  }

  .empty-state i {
    font-size: 4rem;
    color: #ddd;
    margin-bottom: 20px;
  }

  .empty-state h3 {
    color: #999;
    margin-bottom: 10px;
  }

  .empty-state p {
    color: #666;
    margin-bottom: 30px;
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

  .btn-outline-primary {
    border: 2px solid var(--primary-color);
    color: var(--primary-color);
    border-radius: 10px;
    padding: 10px 25px;
    font-weight: 600;
    transition: all 0.3s ease;
  }

  .btn-outline-primary:hover {
    background: var(--primary-color);
    color: white;
    transform: translateY(-2px);
  }

  .search-filter-section {
    background: white;
    padding: 20px;
    border-radius: 15px;
    margin-bottom: 30px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
  }

  .filter-controls {
    display: flex;
    gap: 15px;
    align-items: center;
    flex-wrap: wrap;
  }

  .form-control {
    border-radius: 8px;
    border: 2px solid #e9ecef;
    padding: 10px 15px;
    transition: all 0.3s ease;
  }

  .form-control:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(239, 102, 3, 0.25);
  }

  @media (max-width: 768px) {
    .orders-header {
      flex-direction: column;
      gap: 20px;
      text-align: center;
    }
    
    .orders-stats {
      flex-direction: column;
    }
    
    .order-details {
      grid-template-columns: 1fr;
    }
    
    .filter-controls {
      flex-direction: column;
      align-items: stretch;
    }
    
    .page-header h1 {
      font-size: 2rem;
    }
  }
</style>

<main class="main">
  <!-- Page Header -->
  <div class="page-header">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8">
          <h1><i class="fas fa-history mr-3"></i>Order History</h1>
          <p>Track and manage all your service bookings in one place</p>
        </div>
        <div class="col-lg-4 text-lg-right">
          <a href="{{ route('home') }}" class="btn btn-outline-light btn-lg">
            <i class="fas fa-home mr-2"></i>Back to Home
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
        <button type="button" class="close" data-dismiss="alert">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

    @if($orders->count() > 0)
      <!-- Order Statistics -->
      <div class="orders-stats">
        <div class="stat-card pending">
          <div class="stat-number">{{ $orders->where('status', 'Pending')->count() }}</div>
          <div class="stat-label">Pending Orders</div>
        </div>
        <div class="stat-card confirmed">
          <div class="stat-number">{{ $orders->where('status', 'Confirmed')->count() }}</div>
          <div class="stat-label">Confirmed Orders</div>
        </div>
        <div class="stat-card cancelled">
          <div class="stat-number">{{ $orders->where('status', 'Cancelled')->count() }}</div>
          <div class="stat-label">Cancelled Orders</div>
        </div>
        <div class="stat-card">
          <div class="stat-number">{{ $orders->count() }}</div>
          <div class="stat-label">Total Orders</div>
        </div>
      </div>

      <!-- Search and Filter Section -->
      <div class="search-filter-section">
        <div class="filter-controls">
          <div class="form-group mb-0">
            <input type="text" id="searchInput" class="form-control" placeholder="Search orders...">
          </div>
          <div class="form-group mb-0">
            <select id="statusFilter" class="form-control">
              <option value="">All Status</option>
              <option value="Pending">Pending</option>
              <option value="Confirmed">Confirmed</option>
              <option value="Cancelled">Cancelled</option>
              <option value="Completed">Completed</option>
            </select>
          </div>
          <div class="form-group mb-0">
            <input type="date" id="dateFilter" class="form-control">
          </div>
          <button class="btn btn-outline-primary" onclick="clearFilters()">
            <i class="fas fa-times mr-2"></i>Clear Filters
          </button>
        </div>
      </div>

      <!-- Orders Container -->
      <div class="orders-container">
        <div class="orders-header">
          <h3><i class="fas fa-list-alt mr-2"></i>Your Orders</h3>
          <span class="text-muted">{{ $orders->count() }} orders found</span>
        </div>

        <div id="ordersContainer">
          @foreach($orders as $order)
            <div class="order-card" data-status="{{ $order->status }}" data-date="{{ $order->date }}">
              <div class="order-header">
                <div>
                  <div class="order-id">Order #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</div>
                  <div class="order-date">
                    <i class="fas fa-calendar mr-1"></i>{{ \Carbon\Carbon::parse($order->date)->format('M d, Y') }}
                    @if($order->time)
                      <i class="fas fa-clock ml-2 mr-1"></i>{{ \Carbon\Carbon::parse($order->time)->format('h:i A') }}
                    @endif
                  </div>
                </div>
                <div class="status-badge status-{{ strtolower($order->status) }}">
                  {{ $order->status }}
                </div>
              </div>

              <div class="order-details">
                <div class="detail-item">
                  <div class="detail-icon">
                    <i class="fas fa-rupee-sign"></i>
                  </div>
                  <div class="detail-content">
                    <div class="detail-label">Amount</div>
                    <div class="detail-value">₹{{ number_format($order->amount, 2) }}</div>
                  </div>
                </div>

                <div class="detail-item">
                  <div class="detail-icon">
                    <i class="fas fa-user-tie"></i>
                  </div>
                  <div class="detail-content">
                    <div class="detail-label">Associate ID</div>
                    <div class="detail-value">#{{ $order->associate_id }}</div>
                  </div>
                </div>

                <div class="detail-item">
                  <div class="detail-icon">
                    <i class="fas fa-cogs"></i>
                  </div>
                  <div class="detail-content">
                    <div class="detail-label">Service ID</div>
                    <div class="detail-value">#{{ $order->service_id }}</div>
                  </div>
                </div>

                <div class="detail-item">
                  <div class="detail-icon">
                    <i class="fas fa-info-circle"></i>
                  </div>
                  <div class="detail-content">
                    <div class="detail-label">Order Status</div>
                    <div class="detail-value">{{ $order->status }}</div>
                  </div>
                </div>
              </div>

              @if($order->note)
                <div class="order-note">
                  <i class="fas fa-sticky-note mr-2"></i>
                  <strong>Note:</strong> {{ $order->note }}
                </div>
              @endif
            </div>
          @endforeach
        </div>
      </div>
    @else
      <!-- Empty State -->
      <div class="orders-container">
        <div class="empty-state">
          <i class="fas fa-clipboard-list"></i>
          <h3>No Orders Yet</h3>
          <p>You haven't placed any orders yet. Start exploring our services!</p>
          <a href="{{ route('home') }}" class="btn btn-primary btn-lg">
            <i class="fas fa-search mr-2"></i>Browse Services
          </a>
        </div>
      </div>
    @endif
  </div>
</main>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.getElementById('searchInput');
  const statusFilter = document.getElementById('statusFilter');
  const dateFilter = document.getElementById('dateFilter');
  const ordersContainer = document.getElementById('ordersContainer');
  const orderCards = document.querySelectorAll('.order-card');

  // Search and filter functionality
  function filterOrders() {
    const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';
    const statusValue = statusFilter ? statusFilter.value : '';
    const dateValue = dateFilter ? dateFilter.value : '';

    orderCards.forEach(card => {
      const cardText = card.textContent.toLowerCase();
      const cardStatus = card.dataset.status;
      const cardDate = card.dataset.date;

      const matchesSearch = cardText.includes(searchTerm);
      const matchesStatus = !statusValue || cardStatus === statusValue;
      const matchesDate = !dateValue || cardDate === dateValue;

      if (matchesSearch && matchesStatus && matchesDate) {
        card.style.display = 'block';
        card.style.animation = 'fadeIn 0.3s ease-in';
      } else {
        card.style.display = 'none';
      }
    });

    // Update results count
    const visibleCards = Array.from(orderCards).filter(card => card.style.display !== 'none');
    const countElement = document.querySelector('.orders-header span');
    if (countElement) {
      countElement.textContent = `${visibleCards.length} orders found`;
    }
  }

  // Add event listeners if elements exist
  if (searchInput) {
    searchInput.addEventListener('input', filterOrders);
  }
  if (statusFilter) {
    statusFilter.addEventListener('change', filterOrders);
  }
  if (dateFilter) {
    dateFilter.addEventListener('change', filterOrders);
  }

  // Clear filters function
  window.clearFilters = function() {
    if (searchInput) searchInput.value = '';
    if (statusFilter) statusFilter.value = '';
    if (dateFilter) dateFilter.value = '';
    filterOrders();
  };

  // Add fade-in animation
  const style = document.createElement('style');
  style.textContent = `
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
  `;
  document.head.appendChild(style);
});
</script>

@endsection