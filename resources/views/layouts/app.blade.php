<!DOCTYPE html>
<html lang="bn">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'GoTravel Bangladesh — Tour & Travel Agency')</title>
  <meta name="description" content="@yield('meta_description', 'GoTravel Bangladesh is a premier tour & travel agency providing flight booking, hotel reservation, tour packages, Hajj & Umrah, and visa processing services.')">
  <meta name="keywords" content="@yield('meta_keywords', 'travel agency bangladesh, tour package, air ticket, hotel booking, visa processing, hajj umrah package, dubai tour, thailand tour, sajek valley tour')">
  <link rel="canonical" href="{{ url()->current() }}">

  <!-- Open Graph -->
  <meta property="og:title" content="@yield('title', 'GoTravel Bangladesh')">
  <meta property="og:description" content="@yield('meta_description', 'Your trusted travel partner in Bangladesh')">
  <meta property="og:image" content="@yield('og_image', asset('images/gotravel-og.jpg'))">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:type" content="website">

  <!-- Bootstrap 5.3 CSS & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  @stack('styles')
</head>
<body>

  <!-- TOPBAR -->
  <div class="topbar d-none d-lg-block">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex gap-4 align-items-center">
          <span><i class="bi bi-geo-alt-fill text-success me-1"></i> Gulshan 2, Dhaka-1212, Bangladesh</span>
          <a href="tel:+8801712345678"><i class="bi bi-telephone-fill text-success me-1"></i> +880 1712-345678</a>
          <a href="mailto:info@gotravel.com.bd"><i class="bi bi-envelope-fill text-success me-1"></i> info@gotravel.com.bd</a>
        </div>
        <div class="d-flex gap-3 align-items-center">
          <span><i class="bi bi-currency-exchange me-1"></i> BDT (৳)</span>
          <span class="text-white-50">|</span>
          <a href="https://facebook.com" target="_blank"><i class="bi bi-facebook"></i></a>
          <a href="https://instagram.com" target="_blank"><i class="bi bi-instagram"></i></a>
          <a href="https://youtube.com" target="_blank"><i class="bi bi-youtube"></i></a>
          <a href="https://tiktok.com" target="_blank"><i class="bi bi-tiktok"></i></a>
        </div>
      </div>
    </div>
  </div>

  <!-- MAIN NAVIGATION -->
  <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
        <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center fw-bold" style="width: 42px; height: 42px; font-size: 1.3rem;">GT</div>
        <span class="brand-text">Go<span>Travel</span></span>
      </a>

      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="mainNavbar">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
          </li>

          <!-- Tour Packages Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ request()->routeIs('packages.*') ? 'active' : '' }}" href="{{ route('packages.index') }}" data-bs-toggle="dropdown">
              Tour Packages
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('packages.index', ['category' => 'domestic-tours']) }}"><i class="bi bi-geo-alt me-2 text-success"></i> Domestic Tours</a></li>
              <li><a class="dropdown-item" href="{{ route('packages.index', ['category' => 'international-tours']) }}"><i class="bi bi-airplane me-2 text-primary"></i> International Tours</a></li>
              <li><a class="dropdown-item" href="{{ route('packages.index', ['category' => 'honeymoon-packages']) }}"><i class="bi bi-heart me-2 text-danger"></i> Honeymoon Packages</a></li>
              <li><a class="dropdown-item" href="{{ route('packages.index', ['category' => 'family-tours']) }}"><i class="bi bi-people me-2 text-warning"></i> Family Tours</a></li>
              <li><a class="dropdown-item" href="{{ route('packages.index', ['category' => 'group-tours']) }}"><i class="bi bi-person-lines-fill me-2 text-info"></i> Group Tours</a></li>
              <li><a class="dropdown-item" href="{{ route('packages.index', ['category' => 'corporate-tours']) }}"><i class="bi bi-briefcase me-2 text-secondary"></i> Corporate Tours</a></li>
              <li><a class="dropdown-item" href="{{ route('packages.index', ['category' => 'adventure-tours']) }}"><i class="bi bi-compass me-2 text-success"></i> Adventure Tours</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-success fw-bold" href="{{ route('packages.index', ['category' => 'hajj-umrah']) }}"><i class="bi bi-moon-stars me-2"></i> Hajj & Umrah</a></li>
            </ul>
          </li>

          <!-- Destinations Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ request()->routeIs('destinations.*') ? 'active' : '' }}" href="{{ route('destinations.index') }}" data-bs-toggle="dropdown">
              Destinations
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('destinations.show', 'bangladesh') }}">🇧🇩 Bangladesh</a></li>
              <li><a class="dropdown-item" href="{{ route('destinations.show', 'india') }}">🇮🇳 India</a></li>
              <li><a class="dropdown-item" href="{{ route('destinations.show', 'dubai') }}">🇦🇪 Dubai (UAE)</a></li>
              <li><a class="dropdown-item" href="{{ route('destinations.show', 'thailand') }}">🇹🇭 Thailand</a></li>
              <li><a class="dropdown-item" href="{{ route('destinations.show', 'malaysia') }}">🇲🇾 Malaysia</a></li>
              <li><a class="dropdown-item" href="{{ route('destinations.show', 'singapore') }}">🇸🇬 Singapore</a></li>
              <li><a class="dropdown-item" href="{{ route('destinations.show', 'maldives') }}">🇲🇻 Maldives</a></li>
              <li><a class="dropdown-item" href="{{ route('destinations.show', 'saudi-arabia') }}">🇸🇦 Saudi Arabia</a></li>
              <li><a class="dropdown-item" href="{{ route('destinations.show', 'europe') }}">🇪🇺 Europe</a></li>
            </ul>
          </li>

          <!-- Visa Services Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ request()->routeIs('visa.*') ? 'active' : '' }}" href="{{ route('visa.index') }}" data-bs-toggle="dropdown">
              Visa Services
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('visa.index') }}">Tourist Visa</a></li>
              <li><a class="dropdown-item" href="{{ route('visa.index') }}">Business Visa</a></li>
              <li><a class="dropdown-item" href="{{ route('visa.index') }}">Student Visa</a></li>
              <li><a class="dropdown-item" href="{{ route('visa.index') }}">Visa Processing</a></li>
              <li><a class="dropdown-item" href="{{ route('visa.index') }}">Visa Consultancy</a></li>
            </ul>
          </li>

          <!-- Flight Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ request()->routeIs('flights.*') ? 'active' : '' }}" href="{{ route('flights.index') }}" data-bs-toggle="dropdown">
              Flight
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('flights.index') }}">Flight Booking</a></li>
              <li><a class="dropdown-item" href="{{ route('flights.index') }}">Flight Schedule</a></li>
              <li><a class="dropdown-item" href="{{ route('flights.index') }}">Booking Request</a></li>
            </ul>
          </li>

          <!-- Hotels Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ request()->routeIs('hotels.*') ? 'active' : '' }}" href="{{ route('hotels.index') }}" data-bs-toggle="dropdown">
              Hotels
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('hotels.index') }}">Hotel Booking</a></li>
              <li><a class="dropdown-item" href="{{ route('hotels.index') }}">Hotel Deals</a></li>
            </ul>
          </li>

          <!-- Services Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ request()->routeIs('services.*') ? 'active' : '' }}" href="{{ route('services.index') }}" data-bs-toggle="dropdown">
              Services
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('services.index') }}">Air Ticketing</a></li>
              <li><a class="dropdown-item" href="{{ route('services.index') }}">Hotel Booking</a></li>
              <li><a class="dropdown-item" href="{{ route('services.index') }}">Tour Packages</a></li>
              <li><a class="dropdown-item" href="{{ route('services.index') }}">Visa Processing</a></li>
              <li><a class="dropdown-item" href="{{ route('services.index') }}">Airport Transfer</a></li>
              <li><a class="dropdown-item" href="{{ route('services.index') }}">Travel Insurance</a></li>
              <li><a class="dropdown-item" href="{{ route('services.index') }}">Car Rental</a></li>
            </ul>
          </li>

          <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}" href="{{ route('blog.index') }}">Blog</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
        </ul>

        <div class="d-flex align-items-center gap-2">
          @auth
            @if(auth()->user()->role === 'admin')
              <a href="{{ route('admin.dashboard') }}" class="btn btn-navy-custom py-2 px-3 fs-6">Admin Panel</a>
            @else
              <a href="{{ route('customer.dashboard') }}" class="btn btn-navy-custom py-2 px-3 fs-6"><i class="bi bi-person-circle me-1"></i> Dashboard</a>
            @endif
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
              @csrf
              <button type="submit" class="btn btn-outline-secondary py-2 px-3"><i class="bi bi-box-arrow-right"></i></button>
            </form>
          @else
            <a href="{{ route('login') }}" class="btn btn-outline-custom py-2 px-3 me-1">Login</a>
            <a href="{{ route('packages.index') }}" class="btn btn-primary-custom py-2 px-4">Book Now</a>
          @endauth
        </div>
      </div>
    </div>
  </nav>

  <!-- FLASH MESSAGES -->
  @if(session('success'))
    <div class="container mt-3">
      <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm border-0 d-flex align-items-center" role="alert">
        <i class="bi bi-check-circle-fill me-2 fs-4"></i>
        <div>{{ session('success') }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    </div>
  @endif

  @if($errors->any())
    <div class="container mt-3">
      <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm border-0" role="alert">
        <ul class="mb-0">
          @foreach($errors->all() as $err)
            <li>{{ $err }}</li>
          @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    </div>
  @endif

  <!-- PAGE CONTENT -->
  <main>
    @yield('content')
  </main>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="container">
      <div class="row g-4">
        <!-- Col 1 -->
        <div class="col-lg-4">
          <div class="d-flex align-items-center gap-2 mb-3">
            <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center fw-bold" style="width: 40px; height: 40px;">GT</div>
            <span class="fs-4 fw-bold text-white">Go<span class="text-success">Travel</span></span>
          </div>
          <p class="mb-4 text-white-50">GoTravel Bangladesh is a Govt. approved leading tour operator & travel agency based in Dhaka. We specialize in international & domestic tour packages, air ticketing, hotel reservations, Umrah packages and instant visa processing.</p>
          <div class="d-flex gap-3 text-white fs-5">
            <a href="https://facebook.com" class="text-white-50 hover-text-success"><i class="bi bi-facebook"></i></a>
            <a href="https://instagram.com" class="text-white-50 hover-text-success"><i class="bi bi-instagram"></i></a>
            <a href="https://youtube.com" class="text-white-50 hover-text-success"><i class="bi bi-youtube"></i></a>
            <a href="https://tiktok.com" class="text-white-50 hover-text-success"><i class="bi bi-tiktok"></i></a>
          </div>
        </div>

        <!-- Col 2 -->
        <div class="col-lg-2 col-md-4">
          <h5 class="footer-title">Company</h5>
          <ul class="footer-links">
            <li><a href="{{ route('about') }}">About Us</a></li>
            <li><a href="{{ route('contact') }}">Contact Us</a></li>
            <li><a href="{{ route('blog.index') }}">Careers</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms & Conditions</a></li>
          </ul>
        </div>

        <!-- Col 3 -->
        <div class="col-lg-3 col-md-4">
          <h5 class="footer-title">Travel Services</h5>
          <ul class="footer-links">
            <li><a href="{{ route('packages.index') }}">Tour Packages</a></li>
            <li><a href="{{ route('destinations.index') }}">Destinations</a></li>
            <li><a href="{{ route('visa.index') }}">Visa Processing</a></li>
            <li><a href="{{ route('flights.index') }}">Flight Booking</a></li>
            <li><a href="{{ route('hotels.index') }}">Hotel Booking</a></li>
            <li><a href="{{ route('packages.index', ['category' => 'hajj-umrah']) }}">Hajj & Umrah</a></li>
          </ul>
        </div>

        <!-- Col 4 -->
        <div class="col-lg-3 col-md-4">
          <h5 class="footer-title">Contact Office</h5>
          <p class="mb-2"><i class="bi bi-geo-alt-fill text-success me-2"></i> House 45, Road 11, Block D, Gulshan 2, Dhaka-1212, Bangladesh</p>
          <p class="mb-2"><i class="bi bi-telephone-fill text-success me-2"></i> +880 1712-345678, +880 1812-345678</p>
          <p class="mb-2"><i class="bi bi-whatsapp text-success me-2"></i> +880 1712-345678 (WhatsApp)</p>
          <p class="mb-0"><i class="bi bi-envelope-fill text-success me-2"></i> support@gotravel.com.bd</p>
        </div>
      </div>

      <div class="footer-bottom text-center">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
          <p class="mb-0">&copy; {{ date('Y') }} GoTravel Bangladesh. All Rights Reserved.</p>
          <div class="d-flex gap-3 align-items-center">
            <span class="badge bg-secondary p-2">bKash Verified</span>
            <span class="badge bg-secondary p-2">Nagad Merchant</span>
            <span class="badge bg-secondary p-2">SSLCommerz Secured</span>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- FLOATING WHATSAPP BUTTON -->
  <a href="https://wa.me/8801712345678?text=Hello%20GoTravel,%20I%20want%20to%20know%20about%20tour%20packages" target="_blank" class="floating-whatsapp" title="Chat on WhatsApp">
    <i class="bi bi-whatsapp"></i>
  </a>

  <!-- MOBILE BOTTOM CTA -->
  <div class="mobile-bottom-bar">
    <a href="tel:+8801712345678" class="btn btn-outline-dark btn-sm flex-fill me-1"><i class="bi bi-telephone-fill"></i> Call Now</a>
    <a href="https://wa.me/8801712345678" target="_blank" class="btn btn-success btn-sm flex-fill me-1"><i class="bi bi-whatsapp"></i> WhatsApp</a>
    <a href="{{ route('packages.index') }}" class="btn btn-primary-custom btn-sm flex-fill">Book Trip</a>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @stack('scripts')
</body>
</html>
