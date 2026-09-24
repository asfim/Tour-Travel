@extends('layouts.app')

@section('title', 'GoTravel Bangladesh — Tour & Travel Agency | Tour Packages, Air Tickets & Visa Processing')

@section('content')

<!-- 1. HERO SECTION -->
<section class="hero-section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <span class="badge bg-success text-white px-3 py-2 fs-6 rounded-pill mb-3">
          <i class="bi bi-shield-check me-1"></i> Govt. Approved Travel Agency Bangladesh
        </span>
        <h1 class="hero-title">আপনার পরবর্তী ভ্রমণ হোক আরও সহজ, নিরাপদ ও স্মরণীয়</h1>
        <p class="hero-subtitle">Tour Package, Air Ticket, Hotel Booking & Visa Processing — সবকিছু এক জায়গায়।</p>
        <div class="d-flex flex-wrap gap-3">
          <a href="{{ route('packages.index') }}" class="btn btn-primary-custom btn-lg"><i class="bi bi-compass me-2"></i> Explore Packages</a>
          <a href="#quickSearchBox" class="btn btn-outline-light btn-lg rounded-3 fw-bold px-4"><i class="bi bi-calendar-check me-2"></i> Book Your Trip</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- TRAVEL SEARCH BOX (OVERLAPPING HERO) -->
<div class="container" id="quickSearchBox">
  <div class="hero-search-box">
    <form action="{{ route('packages.index') }}" method="GET">
      <div class="row g-3 align-items-end">
        <div class="col-lg-3 col-md-6">
          <label class="search-label"><i class="bi bi-geo-alt-fill text-success me-1"></i> Where do you want to go?</label>
          <select name="destination" class="form-select search-control">
            <option value="">All Destinations</option>
            @foreach($popularDestinations as $dest)
              <option value="{{ $dest->slug }}">{{ $dest->name }} ({{ $dest->country }})</option>
            @endforeach
          </select>
        </div>
        <div class="col-lg-2 col-md-6">
          <label class="search-label"><i class="bi bi-calendar-event text-success me-1"></i> Travel Date</label>
          <input type="date" name="travel_date" class="form-control search-control" min="{{ date('Y-m-d') }}">
        </div>
        <div class="col-lg-2 col-md-6">
          <label class="search-label"><i class="bi bi-calendar-range text-success me-1"></i> Return Date</label>
          <input type="date" name="return_date" class="form-control search-control" min="{{ date('Y-m-d') }}">
        </div>
        <div class="col-lg-2 col-md-6">
          <label class="search-label"><i class="bi bi-people-fill text-success me-1"></i> Travelers</label>
          <select name="travelers" class="form-select search-control">
            <option value="1">1 Person</option>
            <option value="2" selected>2 Persons</option>
            <option value="3">3-5 Persons</option>
            <option value="6">Group (6+)</option>
          </select>
        </div>
        <div class="col-lg-3 col-md-12">
          <button type="submit" class="btn btn-primary-custom w-100 py-3 text-uppercase tracking-wider fw-bold">
            <i class="bi bi-search me-2"></i> Search Packages
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- 2. QUICK SERVICES -->
<section class="py-5 my-4">
  <div class="container">
    <div class="text-center mb-5">
      <span class="section-tag">Our Services</span>
      <h2 class="section-title">সবধরনের ট্রাভেল সেবা এক ছাদের নিচে</h2>
      <p class="section-desc">বিশ্বমানের আন্তর্জাতিক ও অভ্যন্তরীণ ভ্রমণ সেবায় আপনার বিশ্বস্ত সঙ্গী।</p>
    </div>

    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <a href="{{ route('flights.index') }}" class="text-decoration-none">
          <div class="service-card">
            <div class="service-icon"><i class="bi bi-airplane-engines-fill"></i></div>
            <h5 class="fw-bold text-dark">Flight Booking</h5>
            <p class="text-muted small">দেশি ও বিদেশি যেকোনো এয়ারলাইন্সের টিকেট বুক করুন সর্বনিম্ন মূল্যে।</p>
            <span class="text-success fw-bold small">Explore Flight <i class="bi bi-arrow-right ms-1"></i></span>
          </div>
        </a>
      </div>

      <div class="col-lg-4 col-md-6">
        <a href="{{ route('hotels.index') }}" class="text-decoration-none">
          <div class="service-card">
            <div class="service-icon"><i class="bi bi-building"></i></div>
            <h5 class="fw-bold text-dark">Hotel Booking</h5>
            <p class="text-muted small">৩-স্টার থেকে ৫-স্টার লাক্সারি হোটেল বুকিং স্পেশাল ব্যাংক ছাড়সহ।</p>
            <span class="text-success fw-bold small">Explore Hotels <i class="bi bi-arrow-right ms-1"></i></span>
          </div>
        </a>
      </div>

      <div class="col-lg-4 col-md-6">
        <a href="{{ route('packages.index') }}" class="text-decoration-none">
          <div class="service-card">
            <div class="service-icon"><i class="bi bi-compass"></i></div>
            <h5 class="fw-bold text-dark">Tour Packages</h5>
            <p class="text-muted small">কক্সবাজার, সাজেক, দুবাই, থাইল্যান্ড ও মালদ্বীপের অল-ইনক্লুসিভ ট্যুর প্যাকেজ।</p>
            <span class="text-success fw-bold small">Explore Packages <i class="bi bi-arrow-right ms-1"></i></span>
          </div>
        </a>
      </div>

      <div class="col-lg-4 col-md-6">
        <a href="{{ route('visa.index') }}" class="text-decoration-none">
          <div class="service-card">
            <div class="service-icon"><i class="bi bi-passport"></i></div>
            <h5 class="fw-bold text-dark">Visa Processing</h5>
            <p class="text-muted small">ভারত, দুবাই, থাইল্যান্ড ও মালয়েশিয়া ভিসার দ্রুত ও ১০০% নির্ভুল প্রসেসিং।</p>
            <span class="text-success fw-bold small">Apply Visa <i class="bi bi-arrow-right ms-1"></i></span>
          </div>
        </a>
      </div>

      <div class="col-lg-4 col-md-6">
        <a href="{{ route('services.index') }}" class="text-decoration-none">
          <div class="service-card">
            <div class="service-icon"><i class="bi bi-car-front-fill"></i></div>
            <h5 class="fw-bold text-dark">Airport Transfer</h5>
            <p class="text-muted small">আন্তর্জাতিক বিমানবন্দরসমূহে নিরাপদ প্রাভেট এসি কার ও বাস ট্রান্সফার।</p>
            <span class="text-success fw-bold small">Book Transfer <i class="bi bi-arrow-right ms-1"></i></span>
          </div>
        </a>
      </div>

      <div class="col-lg-4 col-md-6">
        <a href="{{ route('packages.index', ['category' => 'hajj-umrah']) }}" class="text-decoration-none">
          <div class="service-card">
            <div class="service-icon"><i class="bi bi-moon-stars-fill"></i></div>
            <h5 class="fw-bold text-dark">Hajj & Umrah</h5>
            <p class="text-muted small">মক্কা ও মদিনার ৫-স্টার হোটেল সংলগ্ন প্রিমিয়াম ও ইকোনমি উমরাহ প্যাকেজ।</p>
            <span class="text-success fw-bold small">View Packages <i class="bi bi-arrow-right ms-1"></i></span>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- 3. POPULAR TOUR PACKAGES -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-5">
      <div>
        <span class="section-tag">Best Selling</span>
        <h2 class="section-title mb-0">Popular Tour Packages</h2>
      </div>
      <a href="{{ route('packages.index') }}" class="btn btn-outline-custom mt-3 mt-md-0">View All Packages <i class="bi bi-arrow-right ms-1"></i></a>
    </div>

    <div class="row g-4">
      @foreach($popularPackages as $pkg)
        <div class="col-lg-4 col-md-6">
          <div class="card-custom">
            <div class="card-img-wrapper">
              <img src="{{ $pkg->cover_image }}" alt="{{ $pkg->title }}" loading="lazy">
              <span class="card-badge"><i class="bi bi-geo-alt-fill me-1"></i> {{ $pkg->destination->name }}</span>
              <span class="card-price-badge">Starting <span>৳{{ number_format($pkg->starting_price) }}</span></span>
            </div>
            <div class="card-body-custom">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="badge bg-success-subtle text-success font-weight-bold px-2 py-1"><i class="bi bi-clock me-1"></i> {{ $pkg->duration_days }} Days / {{ $pkg->duration_nights }} Nights</span>
                <span class="text-warning fw-bold small"><i class="bi bi-star-fill me-1"></i> {{ $pkg->rating }} ({{ $pkg->reviews_count }})</span>
              </div>
              <h5 class="card-title-custom"><a href="{{ route('packages.show', $pkg->slug) }}">{{ $pkg->title }}</a></h5>
              <p class="text-muted small mb-3">{{ Str::limit($pkg->short_description, 90) }}</p>
              <div class="d-flex gap-2">
                <a href="{{ route('packages.show', $pkg->slug) }}" class="btn btn-outline-secondary btn-sm flex-fill fw-bold">View Details</a>
                <a href="{{ route('packages.show', $pkg->slug) }}#booking-form" class="btn btn-primary-custom btn-sm flex-fill">Book Now</a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- 4. POPULAR DESTINATIONS -->
<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <span class="section-tag">Top Locations</span>
      <h2 class="section-title">Popular Destinations</h2>
      <p class="section-desc">ঘুরে আসুন দেশ ও বিদেশের শীর্ষ ভ্রমণ গন্তব্যসমূহ থেকে।</p>
    </div>

    <div class="row g-4">
      @foreach($popularDestinations as $dest)
        <div class="col-lg-3 col-md-6">
          <a href="{{ route('destinations.show', $dest->slug) }}" class="text-decoration-none">
            <div class="dest-card">
              <img src="{{ $dest->image_url }}" alt="{{ $dest->name }}" loading="lazy">
              <div class="dest-overlay">
                <h4 class="dest-name">{{ $dest->name }}</h4>
                <div class="d-flex justify-content-between align-items-center mt-1">
                  <span class="dest-country">{{ $dest->country }}</span>
                  <span class="badge bg-success rounded-pill px-3 py-1">Explore <i class="bi bi-arrow-right"></i></span>
                </div>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- 5. SPECIAL OFFERS -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="promo-banner">
      <div class="row align-items-center">
        <div class="col-lg-7">
          <span class="badge bg-warning text-dark fw-bold px-3 py-2 mb-3 fs-6"><i class="bi bi-gift-fill me-1"></i> Special Eid Discount Deal</span>
          <h2 class="text-white display-6 fw-bold mb-3">Plan Your Dream Vacation With Exclusive Deals</h2>
          <p class="lead text-white-50 mb-4">bKash বা ক্রেডিট কার্ডে বুকিং করলে পাচ্ছেন সর্বনিম্ন ৳৫,০০০ পর্যন্ত ফ্ল্যাট ছাড়! অফারটি সীমিত সময়ের জন্য প্রযোজ্য।</p>
          <div class="d-flex flex-wrap gap-3">
            <a href="{{ route('packages.index') }}" class="btn btn-primary-custom btn-lg"><i class="bi bi-ticket-perforated me-2"></i> Claim Promo Offer</a>
            <a href="https://wa.me/8801712345678" target="_blank" class="btn btn-outline-light btn-lg"><i class="bi bi-whatsapp me-2"></i> Ask On WhatsApp</a>
          </div>
        </div>
        <div class="col-lg-5 text-center mt-4 mt-lg-0">
          <img src="https://images.unsplash.com/photo-1514282401047-d79a71a590e8?auto=format&fit=crop&w=600&q=80" alt="Special Deal" class="img-fluid rounded-4 shadow-lg" style="max-height: 280px; object-fit: cover;">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 6. WHY CHOOSE US -->
<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <span class="section-tag">Why GoTravel</span>
      <h2 class="section-title">কেন আমাদের বেছে নেবেন?</h2>
      <p class="section-desc">১০ বছরের অভিজ্ঞতা এবং ৫০,০০০+ সন্তুষ্ট পর্যটকের আস্থা।</p>
    </div>

    <div class="row g-4">
      <div class="col-lg-3 col-md-6">
        <div class="feature-box">
          <div class="feature-icon"><i class="bi bi-award-fill"></i></div>
          <div>
            <h6 class="fw-bold mb-1">Experienced Team</h6>
            <p class="text-muted small mb-0">অভিজ্ঞ ট্রাভেল কনসালটেন্ট ও দক্ষ গাইডের সরাসরি তত্ত্বাবধান।</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="feature-box">
          <div class="feature-icon"><i class="bi bi-cash-coin"></i></div>
          <div>
            <h6 class="fw-bold mb-1">Affordable Packages</h6>
            <p class="text-muted small mb-0">কোনো হিডেন চার্জ ছাড়া বাজারে সেরা মূল্যের নিশ্চয়তা।</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="feature-box">
          <div class="feature-icon"><i class="bi bi-sliders"></i></div>
          <div>
            <h6 class="fw-bold mb-1">Customized Planning</h6>
            <p class="text-muted small mb-0">আপনার সময় ও বাজেট অনুযায়ী কাস্টমাইজড প্ল্যান।</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="feature-box">
          <div class="feature-icon"><i class="bi bi-passport"></i></div>
          <div>
            <h6 class="fw-bold mb-1">Visa Assistance</h6>
            <p class="text-muted small mb-0">৯৯% সফলতা সহ দ্রুত ও নির্ভুল ভিসা আবেদন সেবা।</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="feature-box">
          <div class="feature-icon"><i class="bi bi-headset"></i></div>
          <div>
            <h6 class="fw-bold mb-1">24/7 Customer Support</h6>
            <p class="text-muted small mb-0">ভ্রমণ চলাকালীন সার্বক্ষণিক জরুরি ফোন ও হোয়াটসঅ্যাপ সাপোর্ট।</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="feature-box">
          <div class="feature-icon"><i class="bi bi-shield-lock-fill"></i></div>
          <div>
            <h6 class="fw-bold mb-1">Secure Booking</h6>
            <p class="text-muted small mb-0">বিকাশ, নগদ ও ব্যাংক কার্ডের মাধ্যমে ১০০% নিরাপদ পেমেন্ট।</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="feature-box">
          <div class="feature-icon"><i class="bi bi-check-circle-fill"></i></div>
          <div>
            <h6 class="fw-bold mb-1">Transparent Pricing</h6>
            <p class="text-muted small mb-0">বুকিংয়ের পূর্বে ইনক্লুশন ও এক্সক্লুশন স্পষ্ট উল্লেখ।</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="feature-box">
          <div class="feature-icon"><i class="bi bi-heart-fill"></i></div>
          <div>
            <h6 class="fw-bold mb-1">Trusted Travel Service</h6>
            <p class="text-muted small mb-0">সরকারি বেসামরিক বিমান চলাচল ও পর্যটন মন্ত্রণালয় অনুমোদিত।</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 7. TOUR CATEGORIES -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <span class="section-tag">Explore By Category</span>
      <h2 class="section-title">Tour Categories</h2>
    </div>

    <div class="row g-4">
      @foreach($categories as $cat)
        <div class="col-lg-3 col-md-6">
          <a href="{{ route('packages.index', ['category' => $cat->slug]) }}" class="text-decoration-none">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 text-center p-3 transition-hover">
              <div class="rounded-4 overflow-hidden mb-3" style="height: 140px;">
                <img src="{{ $cat->image_url }}" alt="{{ $cat->name }}" class="w-100 h-100 object-fit-cover">
              </div>
              <div class="fs-3 text-success mb-1"><i class="bi {{ $cat->icon_class }}"></i></div>
              <h6 class="fw-bold text-dark mb-0">{{ $cat->name }}</h6>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- 8. INTERNATIONAL TOUR PACKAGES -->
<section class="py-5">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <span class="section-tag">Abroad Journeys</span>
        <h2 class="section-title mb-0">International Tour Packages</h2>
      </div>
      <a href="{{ route('packages.index', ['type' => 'international']) }}" class="btn btn-outline-custom">View All Overseas <i class="bi bi-arrow-right"></i></a>
    </div>

    <div class="row g-4">
      @foreach($internationalPackages as $pkg)
        <div class="col-lg-4 col-md-6">
          <div class="card-custom">
            <div class="card-img-wrapper">
              <img src="{{ $pkg->cover_image }}" alt="{{ $pkg->title }}" loading="lazy">
              <span class="card-badge"><i class="bi bi-globe me-1"></i> {{ $pkg->destination->name }}</span>
              <span class="card-price-badge">৳{{ number_format($pkg->starting_price) }}</span>
            </div>
            <div class="card-body-custom">
              <h5 class="card-title-custom"><a href="{{ route('packages.show', $pkg->slug) }}">{{ $pkg->title }}</a></h5>
              <div class="card-meta">
                <span><i class="bi bi-clock me-1 text-success"></i> {{ $pkg->duration_days }}D / {{ $pkg->duration_nights }}N</span>
                <span><i class="bi bi-star-fill me-1 text-warning"></i> {{ $pkg->rating }}</span>
              </div>
              <a href="{{ route('packages.show', $pkg->slug) }}" class="btn btn-navy-custom w-100 btn-sm">View Package</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- 9. DOMESTIC TOUR PACKAGES -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <span class="section-tag">Explore Bangladesh</span>
        <h2 class="section-title mb-0">Domestic Tour Packages</h2>
      </div>
      <a href="{{ route('packages.index', ['type' => 'domestic']) }}" class="btn btn-outline-custom">Explore BD Tours <i class="bi bi-arrow-right"></i></a>
    </div>

    <div class="row g-4">
      @foreach($domesticPackages as $pkg)
        <div class="col-lg-4 col-md-6">
          <div class="card-custom">
            <div class="card-img-wrapper">
              <img src="{{ $pkg->cover_image }}" alt="{{ $pkg->title }}" loading="lazy">
              <span class="card-badge bg-success"><i class="bi bi-geo-alt-fill me-1"></i> {{ $pkg->destination->name }}</span>
              <span class="card-price-badge">৳{{ number_format($pkg->starting_price) }}</span>
            </div>
            <div class="card-body-custom">
              <h5 class="card-title-custom"><a href="{{ route('packages.show', $pkg->slug) }}">{{ $pkg->title }}</a></h5>
              <div class="card-meta">
                <span><i class="bi bi-clock me-1 text-success"></i> {{ $pkg->duration_days }} Days / {{ $pkg->duration_nights }} Nights</span>
                <span><i class="bi bi-star-fill me-1 text-warning"></i> {{ $pkg->rating }}</span>
              </div>
              <a href="{{ route('packages.show', $pkg->slug) }}" class="btn btn-primary-custom w-100 btn-sm">View Details</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- 10. HAJJ & UMRAH -->
<section class="py-5">
  <div class="container">
    <div class="bg-success-subtle p-5 rounded-4 border border-success-subtle">
      <div class="text-center mb-5">
        <span class="badge bg-success text-white px-3 py-2 fs-6 rounded-pill mb-2"><i class="bi bi-moon-stars-fill me-1"></i> Sacred Journey</span>
        <h2 class="section-title">Hajj & Umrah Packages</h2>
        <p class="section-desc">পবিত্র মক্কা ও মদিনা শরীফে সুষ্ঠু ও আরামদায়ক ইবাদতের জন্য সেরা উমরাহ প্যাকেজসমূহ।</p>
      </div>

      <div class="row g-4">
        @foreach($hajjUmrahPackages as $pkg)
          <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden p-4 bg-white h-100">
              <div class="row align-items-center">
                <div class="col-md-5 mb-3 mb-md-0">
                  <img src="{{ $pkg->cover_image }}" alt="{{ $pkg->title }}" class="img-fluid rounded-3 w-100 object-fit-cover" style="height: 180px;">
                </div>
                <div class="col-md-7">
                  <span class="badge bg-warning text-dark fw-bold mb-2"><i class="bi bi-star-fill me-1"></i> Premium 5-Star Hotel</span>
                  <h5 class="fw-bold mb-2">{{ $pkg->title }}</h5>
                  <p class="text-muted small mb-2"><i class="bi bi-clock me-1 text-success"></i> {{ $pkg->duration_days }} Days / {{ $pkg->duration_nights }} Nights Stay</p>
                  <h4 class="text-success fw-bold mb-3">৳{{ number_format($pkg->starting_price) }} <small class="text-muted fs-6">/ person</small></h4>
                  <a href="{{ route('packages.show', $pkg->slug) }}" class="btn btn-success btn-sm px-4 rounded-pill fw-bold">View Details & Book</a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

<!-- 11. VISA SERVICES -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <span class="section-tag">Visa Assistance</span>
      <h2 class="section-title">Visa Services</h2>
      <p class="section-desc">ঝামেলামুক্ত ভিসা আবেদনের জন্য আমরা দিচ্ছি শতভাগ নির্ভরযোগ্য ও দ্রুত সার্ভিস।</p>
    </div>

    <div class="row g-4">
      @foreach($visas as $visa)
        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100 d-flex flex-column justify-content-between">
            <div>
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold mb-0"><span class="fs-4 me-2">🌐</span> {{ $visa->country }}</h5>
                <span class="badge bg-success-subtle text-success fw-bold px-3 py-2">{{ $visa->visa_type }}</span>
              </div>
              <p class="text-muted small mb-2"><i class="bi bi-lightning-charge-fill text-warning me-1"></i> Processing Time: <strong>{{ $visa->processing_time }}</strong></p>
              <p class="text-muted small mb-3"><i class="bi bi-calendar-check me-1 text-primary"></i> Validity: {{ $visa->validity }}</p>
              <h4 class="text-primary fw-bold mb-3">৳{{ number_format($visa->price) }} <small class="text-muted fs-6">Fee</small></h4>
            </div>
            <a href="{{ route('visa.show', $visa->slug) }}" class="btn btn-outline-custom w-100">Apply Now</a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- 12. HOW IT WORKS -->
<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <span class="section-tag">Easy Process</span>
      <h2 class="section-title">How It Works</h2>
      <p class="section-desc">মাত্র ৪টি সহজ ধাপে আপনার কাঙ্ক্ষিত ভ্রমণ কনফার্ম করুন।</p>
    </div>

    <div class="row g-4 text-center">
      <div class="col-lg-3 col-md-6">
        <div class="p-4 bg-light rounded-4 h-100">
          <div class="rounded-circle bg-success text-white mx-auto d-flex align-items-center justify-content-center fw-bold fs-4 mb-3" style="width: 60px; height: 60px;">01</div>
          <h5 class="fw-bold">Choose Package</h5>
          <p class="text-muted small mb-0">আমাদের ওয়েবসাইট থেকে পছন্দনীয় ট্যুর প্যাকেজ বা গন্তব্য সিলেক্ট করুন।</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="p-4 bg-light rounded-4 h-100">
          <div class="rounded-circle bg-primary text-white mx-auto d-flex align-items-center justify-content-center fw-bold fs-4 mb-3" style="width: 60px; height: 60px;">02</div>
          <h5 class="fw-bold">Send Booking Request</h5>
          <p class="text-muted small mb-0">বুকিং ফর্মে ভ্রমণের তারিখ ও যাত্রীদের তথ্য দিন।</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="p-4 bg-light rounded-4 h-100">
          <div class="rounded-circle bg-warning text-dark mx-auto d-flex align-items-center justify-content-center fw-bold fs-4 mb-3" style="width: 60px; height: 60px;">03</div>
          <h5 class="fw-bold">Confirm Booking</h5>
          <p class="text-muted small mb-0">বিকাশ/নগদ বা ব্যাংকের মাধ্যমে নিরাপদ অ্যাডভান্স পেমেন্ট সম্পন্ন করুন।</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="p-4 bg-light rounded-4 h-100">
          <div class="rounded-circle bg-info text-white mx-auto d-flex align-items-center justify-content-center fw-bold fs-4 mb-3" style="width: 60px; height: 60px;">04</div>
          <h5 class="fw-bold">Enjoy Your Journey</h5>
          <p class="text-muted small mb-0">আপনার টিকেট ও ভাউচার বুঝে নিন এবং ভ্রমণ উপভোগ করুন!</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 13. CUSTOM TOUR SECTION -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="bg-navy p-5 rounded-4 text-white shadow-lg" style="background: var(--primary-color);">
      <div class="row align-items-center">
        <div class="col-lg-7">
          <span class="badge bg-success mb-2 px-3 py-2">Custom Planning</span>
          <h2 class="text-white fw-bold display-6 mb-3">আপনার পছন্দমতো Custom Tour তৈরি করুন</h2>
          <p class="text-white-50 leading-relaxed mb-4">আপনার destination, hotel, transport, duration এবং budget অনুযায়ী customized travel plan তৈরি করুন। আমাদের ট্রাভেল টিম ২৪ ঘণ্টার মধ্যে সেরা কোটেশন পাঠিয়ে দেবে।</p>
        </div>
        <div class="col-lg-5 text-lg-end">
          <button type="button" class="btn btn-primary-custom btn-lg py-3 px-4" data-bs-toggle="modal" data-bs-target="#customTourModal">
            <i class="bi bi-pencil-square me-2"></i> Request Custom Tour
          </button>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal for Custom Tour -->
<div class="modal fade" id="customTourModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content rounded-4 border-0">
      <div class="modal-header bg-success text-white rounded-top-4">
        <h5 class="modal-title fw-bold"><i class="bi bi-sliders me-2"></i> Custom Tour Plan Request</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <form action="{{ route('custom-tour.request') }}" method="POST">
        @csrf
        <div class="modal-body p-4">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label fw-bold">Destination Name *</label>
              <input type="text" name="destination" class="form-control" placeholder="e.g. Switzerland / Kashmir / Cox's Bazar" required>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-bold">Tentative Travel Date</label>
              <input type="date" name="travel_date" class="form-control">
            </div>
            <div class="col-md-4">
              <label class="form-label fw-bold">Duration (Days)</label>
              <input type="number" name="duration_days" class="form-control" value="5" min="1">
            </div>
            <div class="col-md-4">
              <label class="form-label fw-bold">Number of Travelers</label>
              <input type="number" name="travelers_count" class="form-control" value="2" min="1">
            </div>
            <div class="col-md-4">
              <label class="form-label fw-bold">Hotel Category</label>
              <select name="hotel_category" class="form-select">
                <option value="3-Star">3-Star Hotel</option>
                <option value="4-Star" selected>4-Star Hotel</option>
                <option value="5-Star">5-Star Luxury Resort</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-bold">Your Full Name *</label>
              <input type="text" name="customer_name" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-bold">Mobile Phone *</label>
              <input type="text" name="customer_phone" class="form-control" required>
            </div>
            <div class="col-md-12">
              <label class="form-label fw-bold">Email Address *</label>
              <input type="email" name="customer_email" class="form-control" required>
            </div>
            <div class="col-md-12">
              <label class="form-label fw-bold">Additional Preferences / Requirements</label>
              <textarea name="details" class="form-control" rows="3" placeholder="Tell us specific sightseeing places, food preferences, flight requirements..."></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer bg-light rounded-bottom-4">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary-custom px-4">Submit Plan Request</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- 14. FLIGHT BOOKING -->
<section class="py-5">
  <div class="container">
    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
      <div class="row align-items-center">
        <div class="col-lg-5 mb-4 mb-lg-0">
          <span class="section-tag">Direct Airlines Ticketing</span>
          <h2 class="section-title">Book Flights at Guaranteed Best Fares</h2>
          <p class="text-muted mb-4">Biman Bangladesh, US-Bangla, Emirates, Qatar Airways, Saudia, AirAsia, Singapore Airlines সহ বিশ্বের যেকোনো এয়ারলাইন্সের টিকিট তাৎক্ষণিক ইস্যু করুন।</p>
          <div class="d-flex gap-3">
            <span class="badge bg-light text-dark p-3 rounded-3 border"><i class="bi bi-shield-check text-success me-1"></i> Instant E-ticket</span>
            <span class="badge bg-light text-dark p-3 rounded-3 border"><i class="bi bi-tag-fill text-warning me-1"></i> Student Discount</span>
          </div>
        </div>
        <div class="col-lg-7">
          <form action="{{ route('flights.request') }}" method="POST" class="bg-light p-4 rounded-4 border">
            @csrf
            <h5 class="fw-bold mb-3 text-dark"><i class="bi bi-search me-2 text-success"></i> Search Flight Fares</h5>
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label small fw-bold">From (City / Airport)</label>
                <input type="text" name="from_location" class="form-control" placeholder="Dhaka (DAC)" required>
              </div>
              <div class="col-md-6">
                <label class="form-label small fw-bold">To (Destination Airport)</label>
                <input type="text" name="to_location" class="form-control" placeholder="Dubai (DXB) / Bangkok (BKK)" required>
              </div>
              <div class="col-md-6">
                <label class="form-label small fw-bold">Departure Date</label>
                <input type="date" name="departure_date" class="form-control" required min="{{ date('Y-m-d') }}">
              </div>
              <div class="col-md-6">
                <label class="form-label small fw-bold">Return Date (Optional)</label>
                <input type="date" name="return_date" class="form-control" min="{{ date('Y-m-d') }}">
              </div>
              <div class="col-md-6">
                <label class="form-label small fw-bold">Passenger Name</label>
                <input type="text" name="passenger_name" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label small fw-bold">Mobile Number</label>
                <input type="text" name="passenger_phone" class="form-control" required>
              </div>
              <input type="hidden" name="trip_type" value="round_trip">
              <input type="hidden" name="passengers_count" value="1">
              <input type="hidden" name="cabin_class" value="Economy">
              <input type="hidden" name="passenger_email" value="flight@gotravel.com.bd">
              <div class="col-md-12">
                <button type="submit" class="btn btn-navy-custom w-100 py-3 fw-bold"><i class="bi bi-send-fill me-2"></i> Request Flight Fare Quote</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 15. HOTEL BOOKING -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <span class="section-tag">Luxury Stays</span>
        <h2 class="section-title mb-0">Featured Hotels & Resorts</h2>
      </div>
      <a href="{{ route('hotels.index') }}" class="btn btn-outline-custom">View All Hotels <i class="bi bi-arrow-right"></i></a>
    </div>

    <div class="row g-4">
      @foreach($hotels as $hotel)
        <div class="col-lg-3 col-md-6">
          <div class="card-custom">
            <div class="card-img-wrapper" style="height: 180px;">
              <img src="{{ $hotel->cover_image }}" alt="{{ $hotel->name }}" loading="lazy">
              <span class="card-badge"><i class="bi bi-star-fill text-warning me-1"></i> {{ $hotel->rating }}</span>
            </div>
            <div class="card-body-custom">
              <h6 class="fw-bold mb-1"><a href="{{ route('hotels.show', $hotel->slug) }}">{{ $hotel->name }}</a></h6>
              <p class="text-muted small mb-2"><i class="bi bi-geo-alt text-danger me-1"></i> {{ $hotel->location }}</p>
              <h5 class="text-success fw-bold mb-3">৳{{ number_format($hotel->price_per_night) }} <small class="text-muted fs-6">/ night</small></h5>
              <a href="{{ route('hotels.show', $hotel->slug) }}" class="btn btn-outline-secondary btn-sm w-100">View Hotel</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- 16. CUSTOMER TESTIMONIALS -->
<section class="py-5 bg-light-subtle">
  <div class="container">
    <div class="text-center mb-5">
      <span class="section-tag">Real Traveler Reviews</span>
      <h2 class="section-title">আমাদের সন্তুষ্ট গ্রাহকদের মতামত</h2>
      <p class="section-desc">৫০,০০০+ ভ্রমণপ্রেমী কেন GoTravel বেছে নেন?</p>
    </div>

    <div class="row g-4">
      @foreach($reviews as $rev)
        <div class="col-lg-4 col-md-6">
          <div class="testimonial-card">
            <span class="testimonial-quote-bg">“</span>
            <div>
              <div class="rating-badge">
                @for($i=0; $i<$rev->rating; $i++)
                  <i class="bi bi-star-fill"></i>
                @endfor
                <span class="ms-1">{{ number_format($rev->rating, 1) }} Star Verified</span>
              </div>
              <p class="testimonial-text">"{{ $rev->review_text }}"</p>
            </div>
            <div class="testimonial-user">
              <img src="{{ $rev->customer_photo }}" alt="{{ $rev->customer_name }}" class="testimonial-avatar">
              <div>
                <h6 class="testimonial-name">{{ $rev->customer_name }}</h6>
                <span class="testimonial-dest-badge"><i class="bi bi-patch-check-fill"></i> {{ $rev->destination }}</span>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- 17. TRAVEL BLOG -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <span class="section-tag">Travel Guide & Insights</span>
        <h2 class="section-title mb-0">Latest Travel Articles</h2>
      </div>
      <a href="{{ route('blog.index') }}" class="btn btn-outline-custom">View All Blogs <i class="bi bi-arrow-right"></i></a>
    </div>

    <div class="row g-4">
      @foreach($blogs as $post)
        <div class="col-lg-4 col-md-6">
          <div class="card-custom">
            <div class="card-img-wrapper" style="height: 200px;">
              <img src="{{ $post->cover_image }}" alt="{{ $post->title }}" loading="lazy">
              <span class="card-badge bg-primary">{{ $post->category }}</span>
            </div>
            <div class="card-body-custom">
              <small class="text-muted d-block mb-2"><i class="bi bi-calendar3 me-1"></i> {{ $post->created_at->format('M d, Y') }}</small>
              <h5 class="card-title-custom"><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h5>
              <p class="text-muted small mb-3">{{ Str::limit($post->excerpt, 90) }}</p>
              <a href="{{ route('blog.show', $post->slug) }}" class="text-success fw-bold small">Read Full Guide <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- 18. TRAVEL GALLERY -->
<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <span class="section-tag">Moments Captured</span>
      <h2 class="section-title">Travel Gallery</h2>
    </div>

    <div class="row g-3">
      @foreach($gallery as $g)
        <div class="col-lg-4 col-md-6">
          <div class="rounded-4 overflow-hidden shadow-sm position-relative group-hover" style="height: 220px;">
            <img src="{{ $g->image_url }}" alt="{{ $g->title }}" class="w-100 h-100 object-fit-cover">
            <div class="position-absolute bottom-0 start-0 end-0 p-3 bg-dark bg-opacity-75 text-white">
              <span class="badge bg-success mb-1">{{ $g->category }}</span>
              <h6 class="mb-0 fw-bold fs-6 text-white">{{ $g->title }}</h6>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- 19. TRAVEL VIDEO SECTION -->
<section class="py-5 bg-light text-center">
  <div class="container">
    <span class="section-tag">Watch Experience</span>
    <h2 class="section-title mb-4">Explore Our Travel Stories</h2>

    <div class="position-relative mx-auto rounded-4 overflow-hidden shadow-lg" style="max-width: 900px; height: 420px; background: url('https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&w=1200&q=80') center center/cover;">
      <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex flex-column align-items-center justify-content-center text-white p-4">
        <button type="button" class="btn btn-success rounded-circle mb-3 shadow-lg d-flex align-items-center justify-content-center border-0" data-bs-toggle="modal" data-bs-target="#videoModal" style="width: 76px; height: 76px; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
          <i class="bi bi-play-fill fs-1 ms-1 text-white"></i>
        </button>
        <h4 class="fw-bold text-white mb-2">Watch Experience: Dubai Luxury Desert & City Tour</h4>
        <p class="text-white-50 mb-0">GoTravel Official Tour Video Highlights</p>
      </div>
    </div>
  </div>
</section>

<!-- Video Modal -->
<div class="modal fade" id="videoModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content bg-dark">
      <div class="modal-header border-0">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body p-0 text-center">
        <div class="ratio ratio-16x9">
          <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Travel Video" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- 20. FAQ SECTION -->
<section class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="text-center mb-5">
          <span class="section-tag">Frequently Asked Questions</span>
          <h2 class="section-title">সাধারণত জিজ্ঞাসিত প্রশ্নাবলী</h2>
        </div>

        <div class="accordion accordion-custom" id="homeFaqAccordion">
          @foreach($faqs as $index => $faq)
            <div class="accordion-item border-0 mb-3 shadow-sm rounded-3 overflow-hidden">
              <h2 class="accordion-header">
                <button class="accordion-button fw-bold {{ $index !== 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#faq-{{ $faq->id }}">
                  <i class="bi bi-question-circle-fill text-success me-2"></i> {{ $faq->question }}
                </button>
              </h2>
              <div id="faq-{{ $faq->id }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#homeFaqAccordion">
                <div class="accordion-body text-muted leading-relaxed">
                  {{ $faq->answer }}
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 21. NEWSLETTER / LEAD SECTION -->
<section class="newsletter-section">
  <div class="container">
    <div class="newsletter-card">
      <h2 class="newsletter-title">Join The Newsletter</h2>
      <p class="newsletter-subtitle">To receive our best monthly deals</p>
      
      <div class="newsletter-form-wrapper">
        <form action="{{ route('subscribe') }}" method="POST" class="newsletter-form">
          @csrf
          <input type="email" name="email" class="newsletter-input" placeholder="Enter Your Email..." required>
          <button type="submit" class="newsletter-btn" title="Subscribe">
            <i class="bi bi-arrow-right"></i>
          </button>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- 22. FINAL CTA BANNER -->
<section class="py-5 text-center bg-navy text-white" style="background: var(--dark-navy);">
  <div class="container">
    <h2 class="text-white display-5 fw-bold mb-3">Ready for Your Next Adventure?</h2>
    <p class="lead text-white-50 mb-4">আজই আপনার পরবর্তী ভ্রমণ পরিকল্পনা করুন। আমাদের ট্রাভেল টিম আপনাকে সহযোগিতায় প্রস্তুত।</p>
    <div class="d-flex justify-content-center gap-3">
      <a href="{{ route('packages.index') }}" class="btn btn-primary-custom btn-lg"><i class="bi bi-calendar-check me-2"></i> Book Your Trip</a>
      <a href="https://wa.me/8801712345678" target="_blank" class="btn btn-success btn-lg rounded-3 fw-bold"><i class="bi bi-whatsapp me-2"></i> WhatsApp Us</a>
    </div>
  </div>
</section>

@endsection
