@extends('layouts.app')

@section('title', 'Hotel Booking & Deals — GoTravel Bangladesh')

@section('content')
<div class="bg-navy text-white py-5" style="background: linear-gradient(rgba(10, 25, 47, 0.8), rgba(10, 25, 47, 0.9)), url('https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=1600&q=80') center center/cover;">
  <div class="container text-center py-4">
    <span class="badge bg-success px-3 py-2 fs-6 rounded-pill mb-2">Luxury Accommodation</span>
    <h1 class="display-5 fw-bold text-white mb-2">Hotel Booking & Exclusive Deals</h1>
    <p class="lead text-white-50">কক্সবাজার, সাজেক, দুবাই, মক্কা ও থাইল্যান্ডের সেরা ৫-স্টার হোটেল রিসোর্ট</p>
  </div>
</div>

<div class="py-5 bg-light">
  <div class="container">
    <div class="row g-4">
      @foreach($hotels as $hotel)
        <div class="col-lg-4 col-md-6">
          <div class="card-custom">
            <div class="card-img-wrapper">
              <img src="{{ $hotel->cover_image }}" alt="{{ $hotel->name }}" loading="lazy">
              <span class="card-badge"><i class="bi bi-star-fill text-warning me-1"></i> {{ $hotel->rating }}</span>
              <span class="card-price-badge">৳{{ number_format($hotel->price_per_night) }} <small class="fs-6 fw-normal">/ night</small></span>
            </div>
            <div class="card-body-custom">
              <h5 class="card-title-custom"><a href="{{ route('hotels.show', $hotel->slug) }}">{{ $hotel->name }}</a></h5>
              <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i> {{ $hotel->location }}</p>
              <p class="text-muted small mb-3">{{ Str::limit($hotel->description, 80) }}</p>
              <a href="{{ route('hotels.show', $hotel->slug) }}" class="btn btn-primary-custom btn-sm w-100">View Hotel & Reserve</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
