@extends('layouts.app')

@section('title', 'About Us — GoTravel Bangladesh')

@section('content')
<div class="bg-navy text-white py-5" style="background: linear-gradient(rgba(10, 25, 47, 0.85), rgba(10, 25, 47, 0.95)), url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1600&q=80') center center/cover;">
  <div class="container text-center py-4">
    <span class="badge bg-success px-3 py-2 fs-6 rounded-pill mb-2">Who We Are</span>
    <h1 class="display-5 fw-bold text-white mb-2">About GoTravel Bangladesh</h1>
    <p class="lead text-white-50">আপনার বিশ্বস্ত ও অভিজ্ঞ ট্রাভেল পার্টনার</p>
  </div>
</div>

<div class="py-5 bg-light">
  <div class="container">
    <div class="row align-items-center g-5 mb-5">
      <div class="col-lg-6">
        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=800&q=80" alt="About Office" class="img-fluid rounded-4 shadow-lg">
      </div>
      <div class="col-lg-6">
        <span class="section-tag">Established 2015</span>
        <h2 class="section-title">বাংলাদেশের শীর্ষস্থানীয় ট্যুর এন্ড ট্রাভেল এজেন্সি</h2>
        <p class="text-muted leading-relaxed mb-3">GoTravel Bangladesh হলো বেসামরিক বিমান চলাচল ও পর্যটন মন্ত্রণালয় কর্তৃক লাইসেন্সপ্রাপ্ত (লাইসেন্স নং ১২৯০/২০২০) একটি বিশ্বস্ত ট্যুর অপারেটর। গত ১০ বছর ধরে আমরা সফলতার সাথে ৫০,০০০+ ভ্রমণপ্রেমীকে দেশি ও বিদেশি ট্যুর প্যাকেজ, এয়ার টিকেট, হোটেল বুকিং এবং উমরাহ ও ভিসা সেবা প্রদান করে আসছি।</p>
        <p class="text-muted leading-relaxed mb-4">আমাদের লক্ষ্য হলো বাংলাদেশের ভ্রমণকারীদের জন্য বিশ্বমানের ও নিরাপদ ভ্রমণ সুবিধা প্রদান করা, যাতে প্রতিটি ভ্রমণ হয়ে ওঠে চিরস্মরণীয়।</p>

        <div class="row g-3 text-center">
          <div class="col-4">
            <div class="p-3 bg-white rounded-3 shadow-sm">
              <h3 class="fw-bold text-success mb-0">50K+</h3>
              <small class="text-muted fw-semibold">Happy Clients</small>
            </div>
          </div>
          <div class="col-4">
            <div class="p-3 bg-white rounded-3 shadow-sm">
              <h3 class="fw-bold text-primary mb-0">30+</h3>
              <small class="text-muted fw-semibold">Destinations</small>
            </div>
          </div>
          <div class="col-4">
            <div class="p-3 bg-white rounded-3 shadow-sm">
              <h3 class="fw-bold text-warning mb-0">99.8%</h3>
              <small class="text-muted fw-semibold">Visa Success</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
