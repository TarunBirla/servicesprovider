@extends('user.layout.main')
  @section('content')
  <main class="main">
      <section id="features" class="features section">
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
                <span class="btn 
                  {{ $order->status == 'Pending' ? 'btn-warning' : 
                     ($order->status == 'Confirmed' ? 'btn-success' : 
                     ($order->status == 'Cancelled' ? 'btn-danger' : 'btn-info')) }}">
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
</section>
</main>
 @endsection

