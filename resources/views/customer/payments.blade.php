@extends('layouts.customer')

@section('title', 'Payment History — GoTravel Bangladesh')

@section('customer_content')
<div class="card border-0 shadow-sm rounded-4 bg-white p-4">
  <h4 class="fw-bold mb-4"><i class="bi bi-credit-card-2-front text-success me-2"></i> Payment History</h4>

  <div class="table-responsive">
    <table class="table table-hover align-middle">
      <thead class="table-light">
        <tr>
          <th>Booking #</th>
          <th>Method</th>
          <th>TrxID</th>
          <th>Total Price</th>
          <th>Paid Amount</th>
          <th>Status</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        @foreach($bookings as $b)
          <tr>
            <td class="fw-bold">{{ $b->booking_number }}</td>
            <td><span class="badge bg-light text-dark border">{{ $b->payment_method ?? 'bKash' }}</span></td>
            <td class="font-monospace text-primary">{{ $b->transaction_id ?? 'N/A' }}</td>
            <td>৳{{ number_format($b->total_price) }}</td>
            <td class="fw-bold text-success">৳{{ number_format($b->paid_amount) }}</td>
            <td><span class="badge {{ $b->payment_status === 'Paid' ? 'bg-success' : 'bg-warning text-dark' }}">{{ $b->payment_status }}</span></td>
            <td>{{ $b->created_at->format('M d, Y') }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
