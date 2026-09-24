@extends('layouts.app')

@section('title', 'Our Services — GoTravel Bangladesh')

@section('content')
<div class="bg-navy text-white py-5" style="background: linear-gradient(rgba(10, 25, 47, 0.85), rgba(10, 25, 47, 0.95)), url('https://images.unsplash.com/photo-1488646953014-85cb44e25828?auto=format&fit=crop&w=1600&q=80') center center/cover;">
  <div class="container text-center py-4">
    <span class="badge bg-success px-3 py-2 fs-6 rounded-pill mb-2">Comprehensive Solutions</span>
    <h1 class="display-5 fw-bold text-white mb-2">Complete Travel Services</h1>
    <p class="lead text-white-50">এয়ার টিকিট, হোটেল বুকিং, ট্যুর প্যাকেজ, ভিসা প্রসেসিং ও ট্রান্সফার সার্ভিস</p>
  </div>
</div>

<div class="py-5 bg-light">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
          <div class="fs-1 text-primary mb-3"><i class="bi bi-airplane-engines-fill"></i></div>
          <h4 class="fw-bold mb-2">1. Air Ticketing</h4>
          <p class="text-muted leading-relaxed">দেশি ও বিদেশি যেকোনো এয়ারলাইন্সের টিকেট বুক করুন সর্বনিম্ন মূল্যে। স্পেশাল স্টুডেন্ট ও গ্রুপ ডিসকাউন্ট সুবিধা।</p>
          <a href="{{ route('flights.index') }}" class="btn btn-outline-primary btn-sm mt-auto fw-bold">Book Flight <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
          <div class="fs-1 text-success mb-3"><i class="bi bi-building-check"></i></div>
          <h4 class="fw-bold mb-2">2. Hotel Booking</h4>
          <p class="text-muted leading-relaxed">৩-স্টার থেকে ৫-স্টার লাক্সারি রিসোর্ট ও হোটেল বুকিং স্পেশাল ছাড়সহ। মক্কা ও মদিনা হারাম শরীফের কাছে থাকার সুব্যবস্থা।</p>
          <a href="{{ route('hotels.index') }}" class="btn btn-outline-success btn-sm mt-auto fw-bold">Explore Hotels <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
          <div class="fs-1 text-warning mb-3"><i class="bi bi-compass-fill"></i></div>
          <h4 class="fw-bold mb-2">3. Tour Packages</h4>
          <p class="text-muted leading-relaxed">কক্সবাজার, সাজেক, দুবাই, থাইল্যান্ড, কাশ্মীর ও মালদ্বীপের অল-ইনক্লুসিভ ফ্যামিলি ও হানিমুন ট্যুর প্যাকেজ।</p>
          <a href="{{ route('packages.index') }}" class="btn btn-outline-warning btn-sm mt-auto fw-bold">View Packages <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
          <div class="fs-1 text-danger mb-3"><i class="bi bi-passport"></i></div>
          <h4 class="fw-bold mb-2">4. Visa Processing</h4>
          <p class="text-muted leading-relaxed">ভারত, দুবাই, থাইল্যান্ড, মালয়েশিয়া ও সিঙ্গাপুর ভিসার দ্রুত ও ১০০% নির্ভুল আবেদন প্রসেসিং।</p>
          <a href="{{ route('visa.index') }}" class="btn btn-outline-danger btn-sm mt-auto fw-bold">Apply Visa <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
          <div class="fs-1 text-info mb-3"><i class="bi bi-car-front-fill"></i></div>
          <h4 class="fw-bold mb-2">5. Airport Transfer</h4>
          <p class="text-muted leading-relaxed">আন্তর্জাতিক বিমানবন্দরসমূহে সময়মতো পিকআপ ও ড্রপ-অফের জন্য প্রাভেট এসি কার ও লাক্সারি মাইক্রোবাস সার্ভিস।</p>
          <a href="{{ route('contact') }}" class="btn btn-outline-info btn-sm mt-auto fw-bold">Book Transfer <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
          <div class="fs-1 text-secondary mb-3"><i class="bi bi-shield-check"></i></div>
          <h4 class="fw-bold mb-2">6. Travel Insurance</h4>
          <p class="text-muted leading-relaxed">বিদেশে চিকিৎসা খরচ ও জরুরি মেডিকেল কভারেজসহ আন্তর্জাতিক ট্রাভেল ইন্স্যুরেন্স পলিসি।</p>
          <a href="{{ route('contact') }}" class="btn btn-outline-secondary btn-sm mt-auto fw-bold">Get Insurance <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
