@extends('layouts.customer')

@section('title', 'My Invoices — GoTravel Bangladesh')

@section('customer_content')
<div class="card border-0 shadow-sm rounded-4 bg-white p-4">
  <h4 class="fw-bold mb-4"><i class="bi bi-receipt text-success me-2"></i> All Trip Invoices</h4>

  <div class="row g-3">
    @foreach($bookings as $b)
      <div class="col-md-6">
        <div class="p-3 bg-light rounded-4 border d-flex justify-content-between align-items-center">
          <div>
            <h6 class="fw-bold mb-1">Invoice #: INV-{{ $b->booking_number }}</h6>
            <small class="text-muted d-block">{{ $b->tourPackage->title }}</small>
            <span class="badge {{ $b->payment_status === 'Paid' ? 'bg-success' : 'bg-warning text-dark' }} mt-1">{{ $b->payment_status }}</span>
          </div>
          <a href="{{ route('booking.invoice', $b->booking_number) }}" class="btn btn-navy-custom btn-sm"><i class="bi bi-printer me-1"></i> Print / Download</a>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
