@extends('layouts.app')

@section('content')
<div class="bg-light py-5">
  <div class="container">

    <!-- Header Greeting -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center bg-white p-4 rounded-4 shadow-sm mb-4 border">
      <div class="d-flex align-items-center gap-3">
        <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center fw-bold fs-3" style="width: 56px; height: 56px;">
          {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </div>
        <div>
          <h4 class="mb-1 fw-bold">স্বাগতম, {{ auth()->user()->name }}!</h4>
          <p class="text-muted mb-0 small"><i class="bi bi-envelope me-1"></i> {{ auth()->user()->email }} | <i class="bi bi-telephone me-1"></i> {{ auth()->user()->phone ?? 'N/A' }}</p>
        </div>
      </div>
      <div class="mt-3 mt-md-0">
        <span class="badge bg-success-subtle text-success fs-6 px-3 py-2 border border-success-subtle"><i class="bi bi-shield-check me-1"></i> Verified Traveler</span>
      </div>
    </div>

    <div class="row g-4">
      <!-- Dashboard Sidebar -->
      <div class="col-lg-3">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
          <div class="list-group list-group-flush">
            <a href="{{ route('customer.dashboard') }}" class="list-group-item list-group-item-action py-3 px-4 fw-semibold {{ request()->routeIs('customer.dashboard') ? 'active bg-success border-success' : '' }}">
              <i class="bi bi-grid-1x2-fill me-3"></i> Dashboard
            </a>
            <a href="{{ route('customer.bookings') }}" class="list-group-item list-group-item-action py-3 px-4 fw-semibold {{ request()->routeIs('customer.bookings') ? 'active bg-success border-success' : '' }}">
              <i class="bi bi-journal-check me-3"></i> My Bookings
            </a>
            <a href="{{ route('customer.payments') }}" class="list-group-item list-group-item-action py-3 px-4 fw-semibold {{ request()->routeIs('customer.payments') ? 'active bg-success border-success' : '' }}">
              <i class="bi bi-credit-card-2-front me-3"></i> Payment History
            </a>
            <a href="{{ route('customer.invoices') }}" class="list-group-item list-group-item-action py-3 px-4 fw-semibold {{ request()->routeIs('customer.invoices') ? 'active bg-success border-success' : '' }}">
              <i class="bi bi-receipt me-3"></i> Invoices
            </a>
            <a href="{{ route('customer.documents') }}" class="list-group-item list-group-item-action py-3 px-4 fw-semibold {{ request()->routeIs('customer.documents') ? 'active bg-success border-success' : '' }}">
              <i class="bi bi-file-earmark-text me-3"></i> Travel Documents
            </a>
            <a href="{{ route('customer.profile') }}" class="list-group-item list-group-item-action py-3 px-4 fw-semibold {{ request()->routeIs('customer.profile') ? 'active bg-success border-success' : '' }}">
              <i class="bi bi-person-gear me-3"></i> Profile Settings
            </a>
            <a href="{{ route('customer.support') }}" class="list-group-item list-group-item-action py-3 px-4 fw-semibold {{ request()->routeIs('customer.support') ? 'active bg-success border-success' : '' }}">
              <i class="bi bi-headset me-3"></i> Customer Support
            </a>
            <form action="{{ route('logout') }}" method="POST" class="w-100">
              @csrf
              <button type="submit" class="list-group-item list-group-item-action py-3 px-4 fw-semibold text-danger border-top">
                <i class="bi bi-box-arrow-right me-3"></i> Logout
              </button>
            </form>
          </div>
        </div>
      </div>

      <!-- Main Customer Section Content -->
      <div class="col-lg-9">
        @yield('customer_content')
      </div>
    </div>
  </div>
</div>
@endsection
