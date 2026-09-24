@extends('layouts.app')

@section('title', 'Register — GoTravel Bangladesh')

@section('content')
<div class="py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card border-0 shadow-lg rounded-4 p-4 p-md-5 bg-white">
          <div class="text-center mb-4">
            <h3 class="fw-bold">নতুন অ্যাকাউন্ট তৈরি করুন</h3>
            <p class="text-muted small">সহজ বুকিং ও আকর্ষণীয় ট্রাভেল ডিসকাউন্ট পেতে রেজিস্ট্রেশন করুন</p>
          </div>

          <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label fw-bold">Full Name *</label>
              <input type="text" name="name" class="form-control" required placeholder="Full Name">
            </div>

            <div class="mb-3">
              <label class="form-label fw-bold">Email Address *</label>
              <input type="email" name="email" class="form-control" required placeholder="you@example.com">
            </div>

            <div class="mb-3">
              <label class="form-label fw-bold">Mobile Phone Number *</label>
              <input type="text" name="phone" class="form-control" required placeholder="+880 1712-XXXXXX">
            </div>

            <div class="row g-2 mb-4">
              <div class="col-6">
                <label class="form-label fw-bold">Password *</label>
                <input type="password" name="password" class="form-control" required minlength="6">
              </div>
              <div class="col-6">
                <label class="form-label fw-bold">Confirm Password *</label>
                <input type="password" name="password_confirmation" class="form-control" required minlength="6">
              </div>
            </div>

            <button type="submit" class="btn btn-primary-custom w-100 py-3 fw-bold mb-3">Register Account</button>
          </form>

          <div class="text-center pt-3 border-top">
            <p class="small text-muted mb-0">ইতিমধ্যে অ্যাকাউন্ট আছে? <a href="{{ route('login') }}" class="text-success fw-bold">লগইন করুন</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
