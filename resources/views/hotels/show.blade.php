@extends('layouts.app')

@section('title', $hotel->name . ' — GoTravel Bangladesh')

@section('content')
<div class="py-5 bg-light">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
          <div class="rounded-4 overflow-hidden mb-4" style="height: 380px;">
            <img src="{{ $hotel->cover_image }}" alt="{{ $hotel->name }}" class="w-100 h-100 object-fit-cover">
          </div>

          <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
              <h2 class="fw-bold mb-1">{{ $hotel->name }}</h2>
              <p class="text-muted mb-0"><i class="bi bi-geo-alt-fill text-danger me-1"></i> {{ $hotel->address }}</p>
            </div>
            <div class="text-end">
              <span class="badge bg-warning text-dark fs-6 px-3 py-2"><i class="bi bi-star-fill me-1"></i> {{ $hotel->rating }} Rating</span>
              <h3 class="text-success fw-bold mb-0 mt-1">৳{{ number_format($hotel->price_per_night) }} <small class="text-muted fs-6">/ night</small></h3>
            </div>
          </div>

          <hr>

          <h5 class="fw-bold mb-3">Amenities & Facilities</h5>
          <div class="row g-2 mb-4">
            @if(is_array($hotel->amenities))
              @foreach($hotel->amenities as $am)
                <div class="col-md-4">
                  <div class="p-2 bg-light rounded-3 border small fw-semibold">
                    <i class="bi bi-check-circle-fill text-success me-2"></i> {{ $am }}
                  </div>
                </div>
              @endforeach
            @endif
          </div>

          <h5 class="fw-bold mb-2">About Hotel</h5>
          <p class="text-muted leading-relaxed mb-0">{{ $hotel->description }}</p>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="card border-0 shadow-lg rounded-4 p-4 sticky-top" style="top: 100px;">
          <h4 class="fw-bold mb-3"><i class="bi bi-building-check me-2 text-success"></i> Book Room</h4>
          <form action="#" method="POST" onsubmit="alert('Hotel booking request sent! Our desk will call you shortly.'); return false;">
            <div class="mb-3">
              <label class="form-label small fw-bold">Check-in Date</label>
              <input type="date" class="form-control" required min="{{ date('Y-m-d') }}">
            </div>
            <div class="mb-3">
              <label class="form-label small fw-bold">Check-out Date</label>
              <input type="date" class="form-control" required min="{{ date('Y-m-d') }}">
            </div>
            <div class="mb-3">
              <label class="form-label small fw-bold">Guest Name</label>
              <input type="text" class="form-control" required placeholder="Full Name">
            </div>
            <div class="mb-4">
              <label class="form-label small fw-bold">Phone Number</label>
              <input type="text" class="form-control" required placeholder="+880 1712-XXXXXX">
            </div>
            <button type="submit" class="btn btn-primary-custom w-100 py-3 fw-bold">Reserve Hotel Room</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
