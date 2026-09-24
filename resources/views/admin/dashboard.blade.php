@extends('layouts.admin')

@section('title', 'Admin Dashboard — GoTravel')
@section('page_title', 'Dashboard Overview')

@section('content')
<!-- Metric Cards -->
<div class="row g-3 mb-4">
  <div class="col-md-3">
    <div class="card card-stat p-3 bg-white border-start border-primary border-4">
      <small class="text-muted text-uppercase fw-bold">Total Revenue</small>
      <h3 class="fw-bold mb-0 text-primary">৳{{ number_format($totalRevenue) }}</h3>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card card-stat p-3 bg-white border-start border-success border-4">
      <small class="text-muted text-uppercase fw-bold">Total Bookings</small>
      <h3 class="fw-bold mb-0 text-success">{{ $totalBookings }}</h3>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card card-stat p-3 bg-white border-start border-warning border-4">
      <small class="text-muted text-uppercase fw-bold">Pending Bookings</small>
      <h3 class="fw-bold mb-0 text-warning">{{ $pendingBookings }}</h3>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card card-stat p-3 bg-white border-start border-info border-4">
      <small class="text-muted text-uppercase fw-bold">Total Customers</small>
      <h3 class="fw-bold mb-0 text-info">{{ $totalCustomers }}</h3>
    </div>
  </div>
</div>

<div class="row g-4">
  <!-- Recent Bookings Table -->
  <div class="col-lg-8">
    <div class="card card-stat p-4 bg-white">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-bold mb-0"><i class="bi bi-journal-text me-2 text-primary"></i> Recent Customer Bookings</h6>
        <a href="{{ route('admin.bookings') }}" class="btn btn-outline-primary btn-sm">Manage All</a>
      </div>

      <div class="table-responsive">
        <table class="table table-hover align-middle">
          <thead class="table-light">
            <tr>
              <th>Booking #</th>
              <th>Customer</th>
              <th>Package</th>
              <th>Total</th>
              <th>Payment</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($recentBookings as $b)
              <tr>
                <td class="fw-bold text-dark">{{ $b->booking_number }}</td>
                <td>{{ $b->customer_name }}</td>
                <td>{{ Str::limit($b->tourPackage->title, 20) }}</td>
                <td class="fw-bold text-success">৳{{ number_format($b->total_price) }}</td>
                <td><span class="badge {{ $b->payment_status === 'Paid' ? 'bg-success' : 'bg-warning text-dark' }}">{{ $b->payment_status }}</span></td>
                <td><span class="badge bg-secondary">{{ $b->booking_status }}</span></td>
                <td>
                  <a href="{{ route('admin.bookings') }}" class="btn btn-light btn-sm"><i class="bi bi-pencil-square"></i></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Popular Packages -->
  <div class="col-lg-4">
    <div class="card card-stat p-4 bg-white">
      <h6 class="fw-bold mb-3"><i class="bi bi-fire me-2 text-danger"></i> Popular Packages</h6>
      
      <div class="list-group list-group-flush">
        @foreach($popularPackages as $pkg)
          <div class="list-group-item px-0 d-flex align-items-center gap-3">
            <img src="{{ $pkg->cover_image }}" alt="{{ $pkg->title }}" class="rounded-3 object-fit-cover" style="width: 50px; height: 50px;">
            <div class="flex-fill">
              <h6 class="mb-0 fw-bold fs-6">{{ Str::limit($pkg->title, 25) }}</h6>
              <small class="text-success fw-bold">৳{{ number_format($pkg->starting_price) }}</small>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
