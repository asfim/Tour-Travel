@extends('layouts.app')

@section('title', $destination->name . ' Tour Packages — GoTravel Bangladesh')

@section('content')
<div class="bg-navy text-white py-5" style="background: linear-gradient(rgba(10, 25, 47, 0.75), rgba(10, 25, 47, 0.85)), url('{{ $destination->image_url }}') center center/cover;">
  <div class="container text-center py-4">
    <span class="badge bg-success px-3 py-2 fs-6 rounded-pill mb-2">{{ $destination->country }}</span>
    <h1 class="display-4 fw-bold text-white mb-2">{{ $destination->name }}</h1>
    <p class="lead text-white-50 max-w-700 mx-auto">{{ $destination->description }}</p>
  </div>
</div>

<div class="py-5 bg-light">
  <div class="container">
    <h3 class="fw-bold mb-4">Tour Packages for {{ $destination->name }}</h3>

    <div class="row g-4">
      @forelse($packages as $pkg)
        <div class="col-lg-4 col-md-6">
          <div class="card-custom">
            <div class="card-img-wrapper">
              <img src="{{ $pkg->cover_image }}" alt="{{ $pkg->title }}" loading="lazy">
              <span class="card-price-badge">৳{{ number_format($pkg->starting_price) }}</span>
            </div>
            <div class="card-body-custom">
              <h5 class="card-title-custom"><a href="{{ route('packages.show', $pkg->slug) }}">{{ $pkg->title }}</a></h5>
              <p class="text-muted small mb-3">{{ Str::limit($pkg->short_description, 90) }}</p>
              <a href="{{ route('packages.show', $pkg->slug) }}" class="btn btn-primary-custom w-100 btn-sm">View Package</a>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center py-5">
          <p class="text-muted fs-5">No specific packages listed for this destination yet.</p>
          <a href="{{ route('packages.index') }}" class="btn btn-primary-custom">View All Packages</a>
        </div>
      @endforelse
    </div>
  </div>
</div>
@endsection
