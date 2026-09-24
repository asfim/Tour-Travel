@extends('layouts.admin')

@section('title', 'Booking Management — Admin')
@section('page_title', 'Booking Management')

@section('content')
<div class="card card-stat p-4 bg-white">
  <div class="table-responsive">
    <table class="table table-hover align-middle">
      <thead class="table-light">
        <tr>
          <th>Booking #</th>
          <th>Customer</th>
          <th>Phone</th>
          <th>Package</th>
          <th>Travel Date</th>
          <th>Total</th>
          <th>Payment Status</th>
          <th>Booking Status</th>
          <th>Update Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach($bookings as $b)
          <tr>
            <td class="fw-bold">{{ $b->booking_number }}</td>
            <td>{{ $b->customer_name }}</td>
            <td>{{ $b->customer_phone }}</td>
            <td>{{ $b->tourPackage->title }}</td>
            <td>{{ \Carbon\Carbon::parse($b->travel_date)->format('M d, Y') }}</td>
            <td class="fw-bold text-success">৳{{ number_format($b->total_price) }}</td>
            <td><span class="badge {{ $b->payment_status === 'Paid' ? 'bg-success' : 'bg-warning text-dark' }}">{{ $b->payment_status }}</span></td>
            <td><span class="badge bg-secondary">{{ $b->booking_status }}</span></td>
            <td>
              <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editBooking-{{ $b->id }}">
                <i class="bi bi-pencil-square"></i> Edit
              </button>

              <!-- Edit Modal -->
              <div class="modal fade" id="editBooking-{{ $b->id }}" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form action="{{ route('admin.bookings.update', $b->id) }}" method="POST">
                      @csrf
                      <div class="modal-header">
                        <h5 class="modal-title">Update Booking #{{ $b->booking_number }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>
                      <div class="modal-body">
                        <div class="mb-3">
                          <label class="form-label fw-bold">Booking Status</label>
                          <select name="booking_status" class="form-select">
                            <option value="Pending" {{ $b->booking_status === 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Confirmed" {{ $b->booking_status === 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="Cancelled" {{ $b->booking_status === 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                            <option value="Completed" {{ $b->booking_status === 'Completed' ? 'selected' : '' }}>Completed</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label class="form-label fw-bold">Payment Status</label>
                          <select name="payment_status" class="form-select">
                            <option value="Pending" {{ $b->payment_status === 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Paid" {{ $b->payment_status === 'Paid' ? 'selected' : '' }}>Paid</option>
                            <option value="Partial" {{ $b->payment_status === 'Partial' ? 'selected' : '' }}>Partial</option>
                            <option value="Failed" {{ $b->payment_status === 'Failed' ? 'selected' : '' }}>Failed</option>
                            <option value="Refunded" {{ $b->payment_status === 'Refunded' ? 'selected' : '' }}>Refunded</option>
                          </select>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Update Status</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="mt-3">
    {{ $bookings->links('pagination::bootstrap-5') }}
  </div>
</div>
@endsection
