<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Order History</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2 class="mb-4">Your Order History</h2>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead class="thead-light">
          <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Associate ID</th>
            <th>Service ID</th>
            <th>Note</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          @forelse($orders as $order)
            <tr>
              <td>{{ $order->id }}</td>
              <td>{{ $order->date }}</td>
              <td>{{ $order->amount }}</td>
              <td>{{ $order->associate_id }}</td>
              <td>{{ $order->service_id }}</td>
              <td>{{ $order->note }}</td>
              <td>
                <span class="badge 
                  {{ $order->status == 'Pending' ? 'badge-warning' : 
                     ($order->status == 'Confirmed' ? 'badge-success' : 
                     ($order->status == 'Cancelled' ? 'badge-danger' : 'badge-info')) }}">
                  {{ $order->status }}
                </span>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="7" class="text-center">No orders found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <a href="{{ route('home') }}" class="btn btn-primary mt-3">Back to Home</a>
  </div>
</body>
</html>
