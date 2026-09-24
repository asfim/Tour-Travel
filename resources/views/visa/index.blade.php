@extends('layouts.app')

@section('title', 'Visa Processing Services — GoTravel Bangladesh')

@section('content')
<div class="bg-navy text-white py-5" style="background: linear-gradient(rgba(10, 25, 47, 0.8), rgba(10, 25, 47, 0.9)), url('https://images.unsplash.com/photo-1544717305-2782549b5136?auto=format&fit=crop&w=1600&q=80') center center/cover;">
  <div class="container text-center py-4">
    <span class="badge bg-success px-3 py-2 fs-6 rounded-pill mb-2">Hassle-Free Processing</span>
    <h1 class="display-5 fw-bold text-white mb-2">Visa Consultancy & Processing</h1>
    <p class="lead text-white-50">ভারত, দুবাই, থাইল্যান্ড, মালয়েশিয়া ও সৌদি আরবের ১০০% নির্ভরযোগ্য ভিসা সার্ভিস</p>
  </div>
</div>

<div class="py-5 bg-light">
  <div class="container">
    <div class="row g-4">
      @foreach($visas as $visa)
        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100 d-flex flex-column justify-content-between">
            <div>
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="fw-bold mb-0">🌐 {{ $visa->country }}</h4>
                <span class="badge bg-success-subtle text-success font-weight-bold px-3 py-2">{{ $visa->visa_type }}</span>
              </div>

              <div class="p-3 bg-light rounded-3 mb-3">
                <div class="d-flex justify-content-between mb-1">
                  <span class="text-muted small">Processing Time:</span>
                  <strong class="text-dark small">{{ $visa->processing_time }}</strong>
                </div>
                <div class="d-flex justify-content-between">
                  <span class="text-muted small">Validity Period:</span>
                  <strong class="text-dark small">{{ $visa->validity }}</strong>
                </div>
              </div>

              <h6 class="fw-bold mb-2">Required Documents:</h6>
              <ul class="list-unstyled text-muted small mb-4">
                @if(is_array($visa->required_documents))
                  @foreach(array_slice($visa->required_documents, 0, 3) as $doc)
                    <li class="mb-1"><i class="bi bi-check-circle-fill text-success me-1"></i> {{ $doc }}</li>
                  @endforeach
                @endif
              </ul>
            </div>

            <div>
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted small">Service Charge</span>
                <h4 class="text-success fw-bold mb-0">৳{{ number_format($visa->price) }}</h4>
              </div>
              <a href="{{ route('visa.show', $visa->slug) }}" class="btn btn-primary-custom w-100">Apply & View Details</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
