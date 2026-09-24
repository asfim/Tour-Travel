@extends('layouts.app')

@section('title', $visa->country . ' Visa Processing — GoTravel Bangladesh')

@section('content')
<div class="py-5 bg-light">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-7">
        <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white mb-4">
          <span class="badge bg-success px-3 py-1 font-weight-bold fs-6 mb-2 d-inline-block">{{ $visa->visa_type }}</span>
          <h2 class="fw-bold mb-3">{{ $visa->country }} Visa Application</h2>
          
          <div class="row g-3 mb-4">
            <div class="col-md-6">
              <div class="p-3 bg-light rounded-3 border">
                <span class="text-muted small d-block">Processing Duration</span>
                <strong class="text-dark">{{ $visa->processing_time }}</strong>
              </div>
            </div>
            <div class="col-md-6">
              <div class="p-3 bg-light rounded-3 border">
                <span class="text-muted small d-block">Visa Fee</span>
                <strong class="text-success fs-5">৳{{ number_format($visa->price) }}</strong>
              </div>
            </div>
          </div>

          <h5 class="fw-bold mb-3">Required Documents Checklist:</h5>
          <div class="p-4 bg-light rounded-4 border mb-4">
            <ul class="list-unstyled mb-0">
              @if(is_array($visa->required_documents))
                @foreach($visa->required_documents as $doc)
                  <li class="mb-2 d-flex align-items-center"><i class="bi bi-file-earmark-check-fill text-success me-2 fs-5"></i> {{ $doc }}</li>
                @endforeach
              @endif
            </ul>
          </div>

          <h5 class="fw-bold mb-2">Service Overview</h5>
          <p class="text-muted leading-relaxed mb-0">{{ $visa->details }}</p>
        </div>
      </div>

      <div class="col-lg-5">
        <div class="card border-0 shadow-lg rounded-4 p-4 sticky-top" style="top: 100px;">
          <h4 class="fw-bold mb-3 text-primary-color"><i class="bi bi-send-fill text-success me-2"></i> Apply for Visa</h4>
          
          <form action="{{ route('visa.apply') }}" method="POST">
            @csrf
            <input type="hidden" name="country" value="{{ $visa->country }}">
            <input type="hidden" name="visa_type" value="{{ $visa->visa_type }}">

            <div class="mb-3">
              <label class="form-label small fw-bold">Applicant Full Name *</label>
              <input type="text" name="applicant_name" class="form-control" required placeholder="Enter full name">
            </div>

            <div class="mb-3">
              <label class="form-label small fw-bold">Mobile Phone *</label>
              <input type="text" name="applicant_phone" class="form-control" required placeholder="+880 1712-XXXXXX">
            </div>

            <div class="mb-4">
              <label class="form-label small fw-bold">Email Address *</label>
              <input type="email" name="applicant_email" class="form-control" required placeholder="you@example.com">
            </div>

            <button type="submit" class="btn btn-primary-custom w-100 py-3 fw-bold">Submit Visa Application</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
