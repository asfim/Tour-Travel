<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Invoice {{ $booking->booking_number }} — GoTravel Bangladesh</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    body { font-family: 'Helvetica Neue', Arial, sans-serif; background-color: #f8fafc; color: #1e293b; }
    .invoice-card { background: #ffffff; border-radius: 16px; padding: 40px; box-shadow: 0 10px 30px rgba(0,0,0,0.06); max-width: 850px; margin: 40px auto; }
    @media print {
      body { background-color: #fff; }
      .invoice-card { box-shadow: none; margin: 0; max-width: 100%; border-radius: 0; padding: 20px; }
      .no-print { display: none !important; }
    }
  </style>
</head>
<body>

<div class="container">
  <div class="invoice-card">
    
    <!-- Invoice Header -->
    <div class="d-flex justify-content-between align-items-start border-bottom pb-4 mb-4">
      <div>
        <div class="d-flex align-items-center gap-2 mb-2">
          <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center fw-bold" style="width: 44px; height: 44px; font-size: 1.2rem;">GT</div>
          <span class="fs-3 fw-bold text-dark">Go<span class="text-success">Travel</span> Bangladesh</span>
        </div>
        <p class="text-muted small mb-0">House 45, Road 11, Block D, Gulshan 2, Dhaka-1212</p>
        <p class="text-muted small mb-0">Phone: +880 1712-345678 | Email: info@gotravel.com.bd</p>
        <p class="text-muted small mb-0">Govt. Travel License No: 1290/2020</p>
      </div>
      <div class="text-end">
        <h3 class="fw-bold text-uppercase tracking-wider text-primary mb-1">INVOICE</h3>
        <p class="mb-1">Invoice #: <strong>INV-{{ $booking->booking_number }}</strong></p>
        <p class="mb-1 text-muted small">Date: {{ $booking->created_at->format('M d, Y') }}</p>
        <span class="badge {{ $booking->payment_status === 'Paid' ? 'bg-success' : 'bg-warning text-dark' }} fs-6 px-3 py-2 mt-2">
          Payment Status: {{ strtoupper($booking->payment_status) }}
        </span>
      </div>
    </div>

    <!-- Bill To & Booking Info -->
    <div class="row mb-4">
      <div class="col-6">
        <h6 class="text-uppercase text-muted fw-bold small">Customer Information</h6>
        <h5 class="fw-bold mb-1">{{ $booking->customer_name }}</h5>
        <p class="mb-1"><i class="bi bi-telephone text-success"></i> {{ $booking->customer_phone }}</p>
        <p class="mb-1"><i class="bi bi-envelope text-success"></i> {{ $booking->customer_email }}</p>
        @if($booking->passport_number)
          <p class="mb-0 text-muted small">Passport #: {{ $booking->passport_number }}</p>
        @endif
      </div>
      <div class="col-6 text-end">
        <h6 class="text-uppercase text-muted fw-bold small">Booking Details</h6>
        <p class="mb-1">Travel Date: <strong>{{ \Carbon\Carbon::parse($booking->travel_date)->format('F d, Y') }}</strong></p>
        <p class="mb-1">Payment Method: <strong>{{ $booking->payment_method }}</strong></p>
        @if($booking->transaction_id)
          <p class="mb-1 text-success font-monospace">TrxID: {{ $booking->transaction_id }}</p>
        @endif
        <p class="mb-0">Booking Status: <span class="badge bg-secondary">{{ $booking->booking_status }}</span></p>
      </div>
    </div>

    <!-- Items Table -->
    <div class="table-responsive mb-4">
      <table class="table table-bordered align-middle">
        <thead class="table-light">
          <tr>
            <th>Description</th>
            <th class="text-center">Travelers</th>
            <th class="text-end">Rate / Person</th>
            <th class="text-end">Total Amount</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <strong class="d-block text-dark">{{ $booking->tourPackage->title }}</strong>
              <small class="text-muted">{{ $booking->tourPackage->destination->name }} ({{ $booking->tourPackage->duration_days }} Days / {{ $booking->tourPackage->duration_nights }} Nights)</small>
            </td>
            <td class="text-center">{{ $booking->adults_count }} Adult(s) @if($booking->children_count > 0), {{ $booking->children_count }} Child @endif</td>
            <td class="text-end">৳{{ number_format($booking->tourPackage->starting_price) }}</td>
            <td class="text-end fw-bold">৳{{ number_format($booking->total_price) }}</td>
          </tr>
        </tbody>
        <tfoot class="table-light">
          <tr>
            <td colspan="3" class="text-end fw-bold">Subtotal:</td>
            <td class="text-end fw-bold">৳{{ number_format($booking->total_price) }}</td>
          </tr>
          <tr>
            <td colspan="3" class="text-end fw-bold text-success">Paid Amount:</td>
            <td class="text-end fw-bold text-success">৳{{ number_format($booking->paid_amount) }}</td>
          </tr>
          <tr>
            <td colspan="3" class="text-end fw-bold text-danger">Due Amount:</td>
            <td class="text-end fw-bold text-danger">৳{{ number_format($booking->total_price - $booking->paid_amount) }}</td>
          </tr>
        </tfoot>
      </table>
    </div>

    <!-- Terms & Seal -->
    <div class="d-flex justify-content-between align-items-end pt-3 border-top">
      <div>
        <h6 class="fw-bold small text-uppercase">Payment Instructions</h6>
        <p class="text-muted small mb-0">This is an officially computer generated receipt from GoTravel Bangladesh.</p>
        <p class="text-muted small mb-0">For queries regarding this invoice, email billing@gotravel.com.bd</p>
      </div>
      <div class="text-center">
        <div class="border border-success rounded-circle p-2 text-success d-inline-block fw-bold small text-uppercase mb-1" style="width: 90px; height: 90px; line-height: 1.2; display: flex; align-items: center; justify-content: center;">
          GoTravel<br>VERIFIED
        </div>
        <small class="d-block text-muted">Authorized Signature</small>
      </div>
    </div>

    <!-- Print & Return Buttons -->
    <div class="mt-4 pt-3 border-top d-flex justify-content-between no-print">
      <a href="{{ route('home') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Back to Home</a>
      <button onclick="window.print()" class="btn btn-success"><i class="bi bi-printer me-1"></i> Print Invoice</button>
    </div>

  </div>
</div>

</body>
</html>
