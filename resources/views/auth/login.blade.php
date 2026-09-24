@extends('layouts.app')

@section('title', 'Login — GoTravel Bangladesh')

@section('content')
<div class="py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="card border-0 shadow-lg rounded-4 p-4 p-md-5 bg-white">
          <div class="text-center mb-4">
            <div class="rounded-circle bg-success text-white mx-auto d-flex align-items-center justify-content-center fw-bold fs-3 mb-2" style="width: 50px; height: 50px;">GT</div>
            <h3 class="fw-bold">GoTravel এ লগইন করুন</h3>
            <p class="text-muted small">আপনার বুকিং ট্র্যাক করতে ও সার্ভিস প্যানেলে প্রবেশ করুন</p>
          </div>

          <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label fw-bold">Email Address</label>
              <input type="email" name="email" class="form-control" required value="user@gotravel.com" placeholder="you@example.com">
            </div>
            
            <div class="mb-3">
              <label class="form-label fw-bold">Password</label>
              <input type="password" name="password" class="form-control" required value="password" placeholder="••••••••">
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
              <div class="form-check">
                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                <label class="form-check-label small" for="remember">Remember me</label>
              </div>
              <a href="#" class="small text-success fw-bold">Forgot password?</a>
            </div>

            <button type="submit" class="btn btn-primary-custom w-100 py-3 fw-bold mb-3">Login to Account</button>
          </form>

          <div class="text-center pt-3 border-top">
            <p class="small text-muted mb-0">অ্যাকাউন্ট নেই? <a href="{{ route('register') }}" class="text-success fw-bold">নতুন রেজিস্ট্রেশন করুন</a></p>
            <hr>
            <p class="small text-muted mb-0">Demo Admin: <code>admin@gotravel.com</code> / <code>password</code></p>
            <p class="small text-muted mb-0">Demo User: <code>user@gotravel.com</code> / <code>password</code></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
