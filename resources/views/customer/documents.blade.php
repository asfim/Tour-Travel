@extends('layouts.customer')

@section('title', 'Travel Documents — GoTravel Bangladesh')

@section('customer_content')
<div class="card border-0 shadow-sm rounded-4 bg-white p-4">
  <h4 class="fw-bold mb-4"><i class="bi bi-file-earmark-text text-success me-2"></i> Passport & Travel Documents</h4>

  <div class="alert alert-info rounded-3">
    <i class="bi bi-info-circle me-1"></i> আপনার পাসপোর্ট কপি, ই-ভিসা এবং ফ্লাইট টিকিটসমূহ এখানে সংরক্ষিত থাকে।
  </div>

  <div class="row g-3 mt-2">
    <div class="col-md-6">
      <div class="p-4 border rounded-4 text-center bg-light">
        <i class="bi bi-passport display-4 text-primary mb-2"></i>
        <h6 class="fw-bold">Passport Scan Copy</h6>
        <p class="text-muted small">Passport #: {{ $user->passport_number ?? 'Not uploaded yet' }}</p>
        <button type="button" class="btn btn-outline-primary btn-sm"><i class="bi bi-upload me-1"></i> Upload Passport PDF/Photo</button>
      </div>
    </div>

    <div class="col-md-6">
      <div class="p-4 border rounded-4 text-center bg-light">
        <i class="bi bi-file-pdf display-4 text-danger mb-2"></i>
        <h6 class="fw-bold">Issued E-Visas & E-tickets</h6>
        <p class="text-muted small">Automatic PDF copy generation upon visa approval</p>
        <button type="button" class="btn btn-outline-secondary btn-sm" disabled>No active e-visas</button>
      </div>
    </div>
  </div>
</div>
@endsection
