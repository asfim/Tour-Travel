@extends('layouts.customer')

@section('title', 'Customer Dashboard — GoTravel Bangladesh')

@section('customer_content')
<!-- Dashboard Stats Cards -->
<div class="row g-3 mb-4">
  <div class="col-md-3">
    <div class="card border-0 shadow-sm rounded-4 p-3 bg-white text-center">
      <div class="rounded-circle bg-primary bg-opacity-10 text-primary mx-auto mb-2 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
        <i class="bi bi-journal-bookmark-fill fs-4"></i>
      </div>
      <h3 class="fw-bold mb-0 text-dark">{{ $totalBookings }}</h3>
      <span class="text-muted small">Total Bookings</span>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card border-0 shadow-sm rounded-4 p-3 bg-white text-center">
      <div class="rounded-circle bg-warning bg-opacity-10 text-warning mx-auto mb-2 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
        <i class="bi bi-clock-history fs-4"></i>
      </div>
      <h3 class="fw-bold mb-0 text-dark">{{ $pendingBookings }}</h3>
      <span class="text-muted small">Pending Bookings</span>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card border-0 shadow-sm rounded-4 p-3 bg-white text-center">
      <div class="rounded-circle bg-success bg-opacity-10 text-success mx-auto mb-2 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
        <i class="bi bi-check-circle-fill fs-4"></i>
      </div>
      <h3 class="fw-bold mb-0 text-dark">{{ $confirmedTrips }}</h3>
      <span class="text-muted small">Confirmed Trips</span>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card border-0 shadow-sm rounded-4 p-3 bg-white text-center">
      <div class="rounded-circle bg-danger bg-opacity-10 text-danger mx-auto mb-2 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
        <i class="bi bi-exclamation-triangle-fill fs-4"></i>
      </div>
      <h3 class="fw-bold mb-0 text-dark">{{ $pendingPayments }}</h3>
      <span class="text-muted small">Pending Payments</span>
    </div>
  </div>
</div>

<!-- Recent Bookings Table -->
<div class="card border-0 shadow-sm rounded-4 bg-white p-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-bold mb-0"><i class="bi bi-journal-text text-success me-2"></i> Recent Trip Bookings</h5>
    <a href="{{ route('customer.bookings') }}" class="btn btn-outline-success btn-sm">View All</a>
  </div>

  @if($recentBookings->count() > 0)
    <div class="table-responsive">
      <table class="table table-hover align-middle">
        <thead class="table-light">
          <tr>
            <th>Booking #</th>
            <th>Package</th>
            <th>Travel Date</th>
            <th>Total Price</th>
            <th>Payment</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($recentBookings as $b)
            <tr>
              <td class="fw-bold text-dark">{{ $b->booking_number }}</td>
              <td>{{ $b->tourPackage->title }}</td>
              <td>{{ \Carbon\Carbon::parse($b->travel_date)->format('M d, Y') }}</td>
              <td class="fw-bold text-success">৳{{ number_format($b->total_price) }}</td>
              <td>
                <span class="badge {{ $b->payment_status === 'Paid' ? 'bg-success' : 'bg-warning text-dark' }}">{{ $b->payment_status }}</span>
              </td>
              <td>
                <span class="badge bg-secondary">{{ $b->booking_status }}</span>
              </td>
              <td>
                <a href="{{ route('booking.invoice', $b->booking_number) }}" class="btn btn-light btn-sm"><i class="bi bi-receipt"></i> Invoice</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @else
    <p class="text-muted mb-0">আপনার কোনো সাম্প্রতিক বুকিং নেই। নতুন ট্যুর বুক করতে <a href="{{ route('packages.index') }}" class="text-success fw-bold">প্যাকেজসমূহ দেখুন</a>।</p>
  @endif
</div>
@endsection
