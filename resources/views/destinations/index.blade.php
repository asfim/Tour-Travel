@extends('layouts.app')

@section('title', 'Destinations — GoTravel Bangladesh')

@section('content')
<div class="bg-navy text-white py-5" style="background: linear-gradient(rgba(10, 25, 47, 0.8), rgba(10, 25, 47, 0.9)), url('https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&w=1600&q=80') center center/cover;">
  <div class="container text-center py-4">
    <span class="badge bg-success px-3 py-2 fs-6 rounded-pill mb-2">Explore Destinations</span>
    <h1 class="display-5 fw-bold text-white mb-2">Popular Travel Destinations</h1>
    <p class="lead text-white-50">দেশ ও বিদেশের চমৎকার সব ভ্রমণ গন্তব্যসমূহ</p>
  </div>
</div>

<div class="py-5 bg-light">
  <div class="container">
    <div class="row g-4">
      @foreach($destinations as $dest)
        <div class="col-lg-4 col-md-6">
          <a href="{{ route('destinations.show', $dest->slug) }}" class="text-decoration-none">
            <div class="dest-card" style="height: 300px;">
              <img src="{{ $dest->image_url }}" alt="{{ $dest->name }}" loading="lazy">
              <div class="dest-overlay">
                <h3 class="dest-name text-white">{{ $dest->name }}</h3>
                <span class="dest-country text-white-50 mb-2">{{ $dest->country }}</span>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="badge bg-light text-dark">{{ $dest->packages_count }} Packages Available</span>
                  <span class="badge bg-success">Explore <i class="bi bi-arrow-right"></i></span>
                </div>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
