@extends('layouts.app')

@section('title', $package->title . ' — GoTravel Bangladesh')
@section('meta_description', Str::limit($package->short_description, 160))

@section('content')
<!-- BREADCRUMB HEADER -->
<div class="bg-light py-3 border-bottom">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0 small fw-semibold">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-secondary">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('packages.index') }}" class="text-secondary">Tour Packages</a></li>
        <li class="breadcrumb-item"><a href="{{ route('destinations.show', $package->destination->slug) }}" class="text-secondary">{{ $package->destination->name }}</a></li>
        <li class="breadcrumb-item active text-success" aria-current="page">{{ $package->title }}</li>
      </ol>
    </nav>
  </div>
</div>

<div class="py-5">
  <div class="container">
    <!-- Package Title & Meta -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
      <div>
        <div class="d-flex align-items-center gap-2 mb-2">
          <span class="badge bg-success-subtle text-success px-3 py-1 font-weight-bold fs-6"><i class="bi bi-geo-alt-fill me-1"></i> {{ $package->destination->name }}</span>
          <span class="badge bg-light text-dark border px-3 py-1 font-weight-bold fs-6"><i class="bi bi-clock me-1 text-primary"></i> {{ $package->duration_days }} Days / {{ $package->duration_nights }} Nights</span>
          <span class="text-warning fw-bold fs-6"><i class="bi bi-star-fill me-1"></i> {{ $package->rating }} ({{ $package->reviews_count }} reviews)</span>
        </div>
        <h1 class="display-6 fw-bold mb-0 text-primary-color">{{ $package->title }}</h1>
      </div>
      <div class="mt-3 mt-md-0 text-md-end">
        <small class="text-muted d-block text-uppercase fw-bold">Starting Price</small>
        <h2 class="text-success fw-bold mb-0">৳{{ number_format($package->starting_price) }} <small class="text-muted fs-6">/ person</small></h2>
        @if($package->original_price)
          <small class="text-muted text-decoration-line-through me-2">৳{{ number_format($package->original_price) }}</small>
          <span class="badge bg-danger">Save ৳{{ number_format($package->original_price - $package->starting_price) }}</span>
        @endif
      </div>
    </div>

    <!-- Gallery Grid -->
    <div class="row g-2 mb-5">
      <div class="col-lg-8">
        <div class="rounded-4 overflow-hidden shadow-sm" style="height: 420px;">
          <img src="{{ $package->cover_image }}" alt="{{ $package->title }}" class="w-100 h-100 object-fit-cover">
        </div>
      </div>
      <div class="col-lg-4">
        <div class="d-flex flex-column gap-2 h-100">
          @if($package->gallery && is_array($package->gallery))
            @foreach(array_slice($package->gallery, 0, 2) as $img)
              <div class="rounded-4 overflow-hidden shadow-sm flex-fill" style="height: 205px;">
                <img src="{{ $img }}" alt="Gallery" class="w-100 h-100 object-fit-cover">
              </div>
            @endforeach
          @else
            <div class="rounded-4 overflow-hidden shadow-sm flex-fill" style="height: 205px;">
              <img src="{{ $package->cover_image }}" alt="Gallery" class="w-100 h-100 object-fit-cover">
            </div>
          @endif
        </div>
      </div>
    </div>

    <div class="row g-4">
      <!-- Left Column: Details & Tabs -->
      <div class="col-lg-8">

        <!-- Tabs Navigation -->
        <ul class="nav nav-pills custom-pills mb-4 p-2 bg-light rounded-4 shadow-sm" id="packageTabs" role="tablist">
          <li class="nav-item flex-fill text-center">
            <button class="nav-link active rounded-3 w-100 fw-bold" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button">Overview</button>
          </li>
          <li class="nav-item flex-fill text-center">
            <button class="nav-link rounded-3 w-100 fw-bold" id="itinerary-tab" data-bs-toggle="tab" data-bs-target="#itinerary" type="button">Itinerary</button>
          </li>
          <li class="nav-item flex-fill text-center">
            <button class="nav-link rounded-3 w-100 fw-bold" id="inclusions-tab" data-bs-toggle="tab" data-bs-target="#inclusions" type="button">Inclusions</button>
          </li>
          <li class="nav-item flex-fill text-center">
            <button class="nav-link rounded-3 w-100 fw-bold" id="hotel-tab" data-bs-toggle="tab" data-bs-target="#hotel" type="button">Hotel & Transport</button>
          </li>
          <li class="nav-item flex-fill text-center">
            <button class="nav-link rounded-3 w-100 fw-bold" id="terms-tab" data-bs-toggle="tab" data-bs-target="#terms" type="button">Terms</button>
          </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content bg-white p-4 rounded-4 shadow-sm border mb-4" id="packageTabContent">
          
          <!-- OVERVIEW TAB -->
          <div class="tab-pane fade show active" id="overview">
            <h4 class="fw-bold mb-3">Package Overview</h4>
            <p class="text-muted leading-relaxed mb-4">{{ $package->overview }}</p>

            <div class="row g-3">
              <div class="col-md-6">
                <div class="p-3 bg-light rounded-3 border">
                  <span class="text-muted small d-block">Destination</span>
                  <strong class="text-dark">{{ $package->destination->name }} ({{ $package->destination->country }})</strong>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 bg-light rounded-3 border">
                  <span class="text-muted small d-block">Tour Duration</span>
                  <strong class="text-dark">{{ $package->duration_days }} Days / {{ $package->duration_nights }} Nights</strong>
                </div>
              </div>
            </div>
          </div>

          <!-- ITINERARY TAB -->
          <div class="tab-pane fade" id="itinerary">
            <h4 class="fw-bold mb-4">Day-by-Day Itinerary</h4>
            
            @if(is_array($package->itinerary))
              <div class="timeline">
                @foreach($package->itinerary as $day)
                  <div class="mb-4 pb-3 border-bottom">
                    <div class="d-flex align-items-center gap-2 mb-2">
                      <span class="badge bg-success px-3 py-2 fs-6 rounded-pill">Day {{ $day['day'] ?? $loop->iteration }}</span>
                      <h5 class="fw-bold mb-0 text-dark">{{ $day['title'] ?? '' }}</h5>
                    </div>
                    <p class="text-muted mb-0 ps-4 ms-2 leading-relaxed">{{ $day['description'] ?? '' }}</p>
                  </div>
                @endforeach
              </div>
            @else
              <p class="text-muted">Detailed itinerary will be provided upon booking request.</p>
            @endif
          </div>

          <!-- INCLUSIONS & EXCLUSIONS TAB -->
          <div class="tab-pane fade" id="inclusions">
            <div class="row g-4">
              <div class="col-md-6">
                <h5 class="fw-bold text-success mb-3"><i class="bi bi-check-circle-fill me-2"></i> What is Included</h5>
                <ul class="list-unstyled">
                  @if(is_array($package->inclusions))
                    @foreach($package->inclusions as $inc)
                      <li class="mb-2 d-flex align-items-center"><i class="bi bi-check2 text-success me-2 fs-5"></i> {{ $inc }}</li>
                    @endforeach
                  @endif
                </ul>
              </div>

              <div class="col-md-6">
                <h5 class="fw-bold text-danger mb-3"><i class="bi bi-x-circle-fill me-2"></i> What is Excluded</h5>
                <ul class="list-unstyled">
                  @if(is_array($package->exclusions))
                    @foreach($package->exclusions as $exc)
                      <li class="mb-2 d-flex align-items-center"><i class="bi bi-x text-danger me-2 fs-5"></i> {{ $exc }}</li>
                    @endforeach
                  @endif
                </ul>
              </div>
            </div>
          </div>

          <!-- HOTEL & TRANSPORT TAB -->
          <div class="tab-pane fade" id="hotel">
            <h5 class="fw-bold mb-3"><i class="bi bi-building me-2 text-primary"></i> Hotel Information</h5>
            <p class="text-muted mb-4">{{ $package->hotel_info ?? 'Selected 3-Star or 4-Star deluxe hotel with breakfast included.' }}</p>

            <h5 class="fw-bold mb-3"><i class="bi bi-car-front me-2 text-success"></i> Transport Information</h5>
            <p class="text-muted mb-0">{{ $package->transport_info ?? 'Air-conditioned private vehicle / luxury tourist coach for transfers & sightseeing tours.' }}</p>
          </div>

          <!-- TERMS TAB -->
          <div class="tab-pane fade" id="terms">
            <h5 class="fw-bold mb-3">Terms & Conditions</h5>
            <p class="text-muted leading-relaxed">{{ $package->terms_conditions ?? '50% advance payment required for booking confirmation. Cancellation fee applies as per airline & hotel policy.' }}</p>
          </div>

        </div>
      </div>

      <!-- Right Column: Interactive Booking Form -->
      <div class="col-lg-4" id="booking-form">
        <div class="card border-0 shadow-lg rounded-4 p-4 sticky-top" style="top: 100px;">
          <h4 class="fw-bold mb-1 text-primary-color"><i class="bi bi-calendar-check text-success me-2"></i> Book This Tour</h4>
          <p class="text-muted small mb-3">Instant booking request. No hidden charges.</p>
          
          <hr class="mb-4">

          <form action="{{ route('booking.store') }}" method="POST">
            @csrf
            <input type="hidden" name="tour_package_id" value="{{ $package->id }}">

            <div class="mb-3">
              <label class="form-label small fw-bold">Select Travel Date *</label>
              <input type="date" name="travel_date" class="form-control" required min="{{ date('Y-m-d') }}">
            </div>

            <div class="row g-2 mb-3">
              <div class="col-6">
                <label class="form-label small fw-bold">Adults (12+ yrs)</label>
                <select name="adults_count" class="form-select" required>
                  <option value="1">1 Adult</option>
                  <option value="2" selected>2 Adults</option>
                  <option value="3">3 Adults</option>
                  <option value="4">4 Adults</option>
                  <option value="5">5+ Adults</option>
                </select>
              </div>
              <div class="col-6">
                <label class="form-label small fw-bold">Children (2-11 yrs)</label>
                <select name="children_count" class="form-select">
                  <option value="0" selected>0 Children</option>
                  <option value="1">1 Child</option>
                  <option value="2">2 Children</option>
                </select>
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label small fw-bold">Full Name *</label>
              <input type="text" name="customer_name" class="form-control" value="{{ auth()->check() ? auth()->user()->name : '' }}" required placeholder="Enter your full name">
            </div>

            <div class="mb-3">
              <label class="form-label small fw-bold">Phone / WhatsApp *</label>
              <input type="text" name="customer_phone" class="form-control" value="{{ auth()->check() ? auth()->user()->phone : '' }}" required placeholder="+880 1712-XXXXXX">
            </div>

            <div class="mb-3">
              <label class="form-label small fw-bold">Email Address *</label>
              <input type="email" name="customer_email" class="form-control" value="{{ auth()->check() ? auth()->user()->email : '' }}" required placeholder="you@example.com">
            </div>

            <div class="mb-3">
              <label class="form-label small fw-bold">Passport Number (Optional)</label>
              <input type="text" name="passport_number" class="form-control" placeholder="e.g. A01234567">
            </div>

            <div class="mb-3">
              <label class="form-label small fw-bold">Select Payment Method *</label>
              <select name="payment_method" class="form-select" required>
                <option value="bKash" selected>bKash Mobile Banking</option>
                <option value="Nagad">Nagad Mobile Banking</option>
                <option value="SSLCommerz">Online Bank Card / SSLCommerz</option>
                <option value="Bank Transfer">Bank Wire Transfer</option>
                <option value="Cash">Cash at Gulshan Office</option>
              </select>
            </div>

            <div class="mb-4">
              <label class="form-label small fw-bold">Special Requests</label>
              <textarea name="special_requests" class="form-control" rows="2" placeholder="Bed preference, meal requirements..."></textarea>
            </div>

            <button type="submit" class="btn btn-primary-custom w-100 py-3 font-weight-bold fs-6 mb-3">
              <i class="bi bi-shield-lock-fill me-2"></i> Submit Booking & Confirm
            </button>
          </form>

          <a href="https://wa.me/8801712345678?text=Hello,%20I%20want%20to%20know%20more%20about%20{{ urlencode($package->title) }}" target="_blank" class="btn btn-outline-success w-100 py-2 font-weight-bold">
            <i class="bi bi-whatsapp me-2"></i> Ask Query on WhatsApp
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
