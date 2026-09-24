@extends('layouts.app')

@section('title', 'Tour Packages — GoTravel Bangladesh')

@section('content')
<!-- HEADER BANNER -->
<div class="bg-navy text-white py-5" style="background: linear-gradient(rgba(10, 25, 47, 0.8), rgba(10, 25, 47, 0.9)), url('https://images.unsplash.com/photo-1506665531195-3566af294817?auto=format&fit=crop&w=1600&q=80') center center/cover;">
  <div class="container text-center py-4">
    <span class="badge bg-success px-3 py-2 fs-6 rounded-pill mb-2">Explore the World</span>
    <h1 class="display-5 fw-bold text-white mb-2">All Tour Packages</h1>
    <p class="lead text-white-50">দেশ ও বিদেশের সেরা ভ্রমণ স্থানসমূহ ঘুরে আসার আকর্ষণীয় প্যাকেজ</p>
  </div>
</div>

<div class="py-5 bg-light">
  <div class="container">
    <div class="row g-4">
      <!-- Left Filter Sidebar -->
      <div class="col-lg-3">
        <div class="card border-0 shadow-sm rounded-4 p-4 sticky-top" style="top: 100px;">
          <h5 class="fw-bold mb-3"><i class="bi bi-funnel-fill text-success me-2"></i> Filter Packages</h5>
          
          <form action="{{ route('packages.index') }}" method="GET">
            <!-- Search Keyword -->
            <div class="mb-3">
              <label class="form-label small fw-bold">Search Keyword</label>
              <input type="text" name="keyword" class="form-control" value="{{ request('keyword') }}" placeholder="Dubai, Sajek, Beach...">
            </div>

            <!-- Destination -->
            <div class="mb-3">
              <label class="form-label small fw-bold">Destination</label>
              <select name="destination" class="form-select">
                <option value="">All Destinations</option>
                @foreach($destinations as $d)
                  <option value="{{ $d->slug }}" {{ request('destination') == $d->slug ? 'selected' : '' }}>{{ $d->name }}</option>
                @endforeach
              </select>
            </div>

            <!-- Category -->
            <div class="mb-3">
              <label class="form-label small fw-bold">Category</label>
              <select name="category" class="form-select">
                <option value="">All Categories</option>
                <option value="domestic-tours" {{ request('category') == 'domestic-tours' ? 'selected' : '' }}>Domestic Tours</option>
                <option value="international-tours" {{ request('category') == 'international-tours' ? 'selected' : '' }}>International Tours</option>
                <option value="honeymoon-packages" {{ request('category') == 'honeymoon-packages' ? 'selected' : '' }}>Honeymoon Packages</option>
                <option value="family-tours" {{ request('category') == 'family-tours' ? 'selected' : '' }}>Family Tours</option>
                <option value="hajj-umrah" {{ request('category') == 'hajj-umrah' ? 'selected' : '' }}>Hajj & Umrah</option>
              </select>
            </div>

            <!-- Sort By -->
            <div class="mb-4">
              <label class="form-label small fw-bold">Sort By</label>
              <select name="sort" class="form-select">
                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest Packages</option>
                <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Highest Rating</option>
              </select>
            </div>

            <button type="submit" class="btn btn-primary-custom w-100 mb-2">Apply Filters</button>
            <a href="{{ route('packages.index') }}" class="btn btn-outline-secondary w-100 btn-sm">Reset Filters</a>
          </form>
        </div>
      </div>

      <!-- Right Packages Grid -->
      <div class="col-lg-9">
        @if($packages->count() > 0)
          <div class="row g-4">
            @foreach($packages as $pkg)
              <div class="col-md-6 col-lg-4">
                <div class="card-custom">
                  <div class="card-img-wrapper">
                    <img src="{{ $pkg->cover_image }}" alt="{{ $pkg->title }}" loading="lazy">
                    <span class="card-badge"><i class="bi bi-geo-alt-fill me-1"></i> {{ $pkg->destination->name }}</span>
                    <span class="card-price-badge">৳{{ number_format($pkg->starting_price) }}</span>
                  </div>
                  <div class="card-body-custom">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                      <span class="badge bg-light text-dark border"><i class="bi bi-clock me-1 text-success"></i> {{ $pkg->duration_days }}D / {{ $pkg->duration_nights }}N</span>
                      <span class="text-warning fw-bold small"><i class="bi bi-star-fill me-1"></i> {{ $pkg->rating }}</span>
                    </div>
                    <h5 class="card-title-custom"><a href="{{ route('packages.show', $pkg->slug) }}">{{ $pkg->title }}</a></h5>
                    <p class="text-muted small mb-3">{{ Str::limit($pkg->short_description, 85) }}</p>
                    <a href="{{ route('packages.show', $pkg->slug) }}" class="btn btn-primary-custom btn-sm w-100">View Details & Book</a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>

          <div class="mt-5 d-flex justify-content-center">
            {{ $packages->links('pagination::bootstrap-5') }}
          </div>
        @else
          <div class="text-center py-5 bg-white rounded-4 shadow-sm">
            <i class="bi bi-search display-1 text-muted"></i>
            <h4 class="fw-bold mt-3">No Packages Found</h4>
            <p class="text-muted">আপনার খোঁজা ফিল্টারের সাথে মিলে এমন কোনো প্যাকেজ পাওয়া যায়নি। অন্য কিওয়ার্ড চেষ্টা করুন।</p>
            <a href="{{ route('packages.index') }}" class="btn btn-primary-custom">View All Packages</a>
          </div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection
