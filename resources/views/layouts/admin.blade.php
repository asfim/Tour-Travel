<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin Panel — GoTravel Bangladesh')</title>

  <!-- Bootstrap 5.3 & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  
  <style>
    body {
      font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
      background-color: #F1F5F9;
    }
    .admin-sidebar {
      width: 260px;
      min-height: 100vh;
      background: #0B192C;
      color: #94A3B8;
      position: fixed;
      top: 0;
      left: 0;
      z-index: 1000;
    }
    .admin-main {
      margin-left: 260px;
      padding: 30px;
    }
    .admin-nav-item {
      color: #94A3B8;
      padding: 12px 20px;
      display: flex;
      align-items: center;
      gap: 12px;
      font-weight: 500;
      text-decoration: none;
      transition: all 0.2s;
    }
    .admin-nav-item:hover, .admin-nav-item.active {
      color: #FFFFFF;
      background: rgba(0, 183, 121, 0.15);
      border-left: 4px solid #00B779;
    }
    .card-stat {
      border: none;
      border-radius: 14px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.03);
    }
  </style>
  @stack('styles')
</head>
<body>

  <!-- ADMIN SIDEBAR -->
  <aside class="admin-sidebar">
    <div class="p-4 border-bottom border-secondary border-opacity-25 d-flex align-items-center gap-2">
      <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center fw-bold" style="width: 38px; height: 38px;">GT</div>
      <div>
        <h6 class="mb-0 text-white fw-bold">GoTravel Admin</h6>
        <small class="text-white-50">Agency Management</small>
      </div>
    </div>

    <div class="py-3">
      <a href="{{ route('admin.dashboard') }}" class="admin-nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="bi bi-speedometer2"></i> Dashboard
      </a>
      <a href="{{ route('admin.bookings') }}" class="admin-nav-item {{ request()->routeIs('admin.bookings*') ? 'active' : '' }}">
        <i class="bi bi-journal-check"></i> Bookings Management
      </a>
      <a href="{{ route('admin.packages') }}" class="admin-nav-item {{ request()->routeIs('admin.packages*') ? 'active' : '' }}">
        <i class="bi bi-compass"></i> Tour Packages
      </a>
      <a href="{{ route('admin.destinations') }}" class="admin-nav-item {{ request()->routeIs('admin.destinations*') ? 'active' : '' }}">
        <i class="bi bi-map"></i> Destinations
      </a>
      <a href="{{ route('admin.visas') }}" class="admin-nav-item {{ request()->routeIs('admin.visas*') ? 'active' : '' }}">
        <i class="bi bi-card-heading"></i> Visa Services
      </a>
      <a href="{{ route('admin.flights') }}" class="admin-nav-item {{ request()->routeIs('admin.flights*') ? 'active' : '' }}">
        <i class="bi bi-airplane"></i> Flight Requests
      </a>
      <a href="{{ route('admin.hotels') }}" class="admin-nav-item {{ request()->routeIs('admin.hotels*') ? 'active' : '' }}">
        <i class="bi bi-building"></i> Hotels Management
      </a>
      <a href="{{ route('admin.customers') }}" class="admin-nav-item {{ request()->routeIs('admin.customers*') ? 'active' : '' }}">
        <i class="bi bi-people"></i> Customer Management
      </a>
      <a href="{{ route('admin.coupons') }}" class="admin-nav-item {{ request()->routeIs('admin.coupons*') ? 'active' : '' }}">
        <i class="bi bi-ticket-perforated"></i> Coupons & Discounts
      </a>
      <a href="{{ route('admin.messages') }}" class="admin-nav-item {{ request()->routeIs('admin.messages*') ? 'active' : '' }}">
        <i class="bi bi-chat-dots"></i> Contact Messages
      </a>
      <a href="{{ route('admin.subscribers') }}" class="admin-nav-item {{ request()->routeIs('admin.subscribers*') ? 'active' : '' }}">
        <i class="bi bi-envelope-check"></i> Subscribers
      </a>
      <a href="{{ route('admin.settings') }}" class="admin-nav-item {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
        <i class="bi bi-gear"></i> Website Settings
      </a>
      
      <div class="px-3 pt-4">
        <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-light w-100 btn-sm"><i class="bi bi-globe me-1"></i> Visit Public Site</a>
      </div>
    </div>
  </aside>

  <!-- ADMIN MAIN CONTENT AREA -->
  <main class="admin-main">
    <div class="d-flex justify-content-between align-items-center mb-4 bg-white p-3 rounded-4 shadow-sm">
      <div>
        <h5 class="mb-0 fw-bold">@yield('page_title', 'Admin Dashboard')</h5>
        <small class="text-muted">Travel Agency Operations & Control Center</small>
      </div>
      <div class="d-flex align-items-center gap-3">
        <span class="badge bg-success p-2"><i class="bi bi-circle-fill fs-6 me-1"></i> System Online</span>
        <div class="dropdown">
          <button class="btn btn-light dropdown-toggle font-weight-bold" type="button" data-bs-toggle="dropdown">
            <i class="bi bi-person-circle me-1"></i> {{ auth()->user()->name }}
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="{{ route('home') }}">View Website</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item text-danger">Logout</button>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </div>

    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4" role="alert">
        <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

    @yield('content')
  </main>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @stack('scripts')
</body>
</html>
