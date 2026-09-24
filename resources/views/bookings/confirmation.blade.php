@extends('layouts.app')

@section('title', 'Booking Confirmation — ' . $booking->booking_number)

@section('content')
<div class="py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        
        <!-- Status Card -->
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden mb-4">
          <div class="card-header bg-success text-white p-4 text-center">
            <i class="bi bi-check-circle-fill display-3 mb-2"></i>
            <h2 class="fw-bold mb-1">Booking Request Received!</h2>
            <p class="mb-0 text-white-50">Booking Reference Number: <strong>{{ $booking->booking_number }}</strong></p>
          </div>
          
          <div class="card-body p-4 p-md-5">
            <h5 class="fw-bold mb-3 text-primary-color">Trip Summary</h5>

            <div class="table-responsive mb-4">
              <table class="table table-bordered align-middle">
                <tbody>
                  <tr>
                    <th class="bg-light w-35">Tour Package</th>
                    <td><strong class="text-success">{{ $booking->tourPackage->title }}</strong></td>
                  </tr>
                  <tr>
                    <th class="bg-light">Destination</th>
                    <td>{{ $booking->tourPackage->destination->name }} ({{ $booking->tourPackage->destination->country }})</td>
                  </tr>
                  <tr>
                    <th class="bg-light">Travel Date</th>
                    <td><strong>{{ \Carbon\Carbon::parse($booking->travel_date)->format('F d, Y') }}</strong></td>
                  </tr>
                  <tr>
                    <th class="bg-light">Travelers</th>
                    <td>{{ $booking->adults_count }} Adults @if($booking->children_count > 0), {{ $booking->children_count }} Children @endif</td>
                  </tr>
                  <tr>
                    <th class="bg-light">Customer Name</th>
                    <td>{{ $booking->customer_name }} ({{ $booking->customer_phone }})</td>
                  </tr>
                  <tr>
                    <th class="bg-light">Selected Payment Method</th>
                    <td><span class="badge bg-primary fs-6">{{ $booking->payment_method }}</span></td>
                  </tr>
                  <tr>
                    <th class="bg-light">Total Price</th>
                    <td class="fs-4 fw-bold text-success">৳{{ number_format($booking->total_price) }}</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- Payment Completion Box -->
            <div class="bg-warning-subtle p-4 rounded-4 border border-warning-subtle mb-4">
              <h5 class="fw-bold text-dark mb-2"><i class="bi bi-wallet2 text-warning me-2"></i> Complete Payment via {{ $booking->payment_method }}</h5>
              <p class="small text-dark mb-3">
                @if($booking->payment_method === 'bKash')
                  bKash Merchant Account Number: <strong>01712-345678</strong> (Option: Make Payment). Reference: <strong>{{ $booking->booking_number }}</strong>.
                @elseif($booking->payment_method === 'Nagad')
                  Nagad Merchant Number: <strong>01712-345678</strong> (Option: Merchant Pay). Reference: <strong>{{ $booking->booking_number }}</strong>.
                @else
                  Please submit payment to our Bank Account / Merchant portal using reference <strong>{{ $booking->booking_number }}</strong>.
                @endif
              </p>

              <form action="{{ route('booking.payment', $booking->booking_number) }}" method="POST" class="row g-2 align-items-center">
                @csrf
                <input type="hidden" name="payment_method" value="{{ $booking->payment_method }}">
                <div class="col-md-8">
                  <input type="text" name="transaction_id" class="form-control" placeholder="Enter Transaction ID (e.g. BK890123 / NG778899)" required>
                </div>
                <div class="col-md-4">
                  <button type="submit" class="btn btn-success w-100 fw-bold">Submit Transaction ID</button>
                </div>
              </form>
            </div>

            <div class="d-flex justify-content-between align-items-center">
              <a href="{{ route('home') }}" class="btn btn-outline-secondary"><i class="bi bi-house me-1"></i> Back to Home</a>
              <a href="{{ route('booking.invoice', $booking->booking_number) }}" class="btn btn-navy-custom"><i class="bi bi-receipt me-1"></i> View Official Invoice</a>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
