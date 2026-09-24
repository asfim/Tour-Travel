@extends('layouts.customer')

@section('title', 'My Bookings — GoTravel Bangladesh')

@section('customer_content')
<div class="card border-0 shadow-sm rounded-4 bg-white p-4">
  <h4 class="fw-bold mb-4"><i class="bi bi-journal-check text-success me-2"></i> My Tour Bookings</h4>

  @if($bookings->count() > 0)
    <div class="table-responsive">
      <table class="table table-hover align-middle">
        <thead class="table-light">
          <tr>
            <th>Booking #</th>
            <th>Tour Package</th>
            <th>Travel Date</th>
            <th>Travelers</th>
            <th>Total Price</th>
            <th>Payment Status</th>
            <th>Booking Status</th>
            <th>Invoice</th>
          </tr>
        </thead>
        <tbody>
          @foreach($bookings as $b)
            <tr>
              <td class="fw-bold text-dark">{{ $b->booking_number }}</td>
              <td>
                <strong>{{ $b->tourPackage->title }}</strong>
                <small class="d-block text-muted">{{ $b->tourPackage->destination->name }}</small>
              </td>
              <td>{{ \Carbon\Carbon::parse($b->travel_date)->format('M d, Y') }}</td>
              <td>{{ $b->adults_count }} Ad @if($b->children_count > 0), {{ $b->children_count }} Ch @endif</td>
              <td class="fw-bold text-success">৳{{ number_format($b->total_price) }}</td>
              <td><span class="badge {{ $b->payment_status === 'Paid' ? 'bg-success' : 'bg-warning text-dark' }}">{{ $b->payment_status }}</span></td>
              <td><span class="badge bg-primary">{{ $b->booking_status }}</span></td>
              <td>
                <a href="{{ route('booking.invoice', $b->booking_number) }}" class="btn btn-outline-success btn-sm"><i class="bi bi-receipt"></i> Invoice</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="mt-4">
      {{ $bookings->links('pagination::bootstrap-5') }}
    </div>
  @else
    <p class="text-muted">আপনার কোনো সক্রিয় বুকিং পাওয়া যায়নি।</p>
  @endif
</div>
@endsection
