@extends('layouts.customer')

@section('title', 'Customer Support — GoTravel Bangladesh')

@section('customer_content')
<div class="card border-0 shadow-sm rounded-4 bg-white p-4">
  <h4 class="fw-bold mb-4"><i class="bi bi-headset text-success me-2"></i> Customer Support & Assistance</h4>

  <div class="row g-4">
    <div class="col-md-6">
      <div class="p-4 bg-light rounded-4 border h-100">
        <h5 class="fw-bold text-success mb-2"><i class="bi bi-telephone-fill me-2"></i> 24/7 Hotline Numbers</h5>
        <p class="mb-1 fw-bold fs-5 text-dark">+880 1712-345678</p>
        <p class="mb-3 fw-bold fs-5 text-dark">+880 1812-345678</p>
        <p class="text-muted small mb-0">ভ্রমণ চলাকালীন যেকোনো জরুরি প্রয়োজনে সরাসরি ফোন করুন।</p>
      </div>
    </div>

    <div class="col-md-6">
      <div class="p-4 bg-light rounded-4 border h-100">
        <h5 class="fw-bold text-success mb-2"><i class="bi bi-whatsapp me-2"></i> WhatsApp Support</h5>
        <p class="text-muted small mb-3">মেসেজে তাৎক্ষণিক রেসপন্স পেতে আমাদের অফিশিয়াল ওয়াটসঅ্যাপে সংযুক্ত হন।</p>
        <a href="https://wa.me/8801712345678" target="_blank" class="btn btn-success fw-bold"><i class="bi bi-whatsapp me-1"></i> Open WhatsApp Chat</a>
      </div>
    </div>
  </div>
</div>
@endsection
