@extends('layouts.app')

@section('title', 'Contact Us — GoTravel Bangladesh')

@section('content')
<div class="bg-navy text-white py-5" style="background: linear-gradient(rgba(10, 25, 47, 0.85), rgba(10, 25, 47, 0.95)), url('https://images.unsplash.com/photo-1423666639041-f56000c27a9a?auto=format&fit=crop&w=1600&q=80') center center/cover;">
  <div class="container text-center py-4">
    <span class="badge bg-success px-3 py-2 fs-6 rounded-pill mb-2">Get In Touch</span>
    <h1 class="display-5 fw-bold text-white mb-2">Contact GoTravel Team</h1>
    <p class="lead text-white-50">যেকোনো প্রশ্ন বা পরামর্শের জন্য আমাদের সাথে যোগাযোগ করুন</p>
  </div>
</div>

<div class="py-5 bg-light">
  <div class="container">
    <div class="row g-4 mb-5">
      <div class="col-lg-4">
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
          <div class="fs-2 text-success mb-2"><i class="bi bi-geo-alt-fill"></i></div>
          <h5 class="fw-bold mb-2">Dhaka Head Office</h5>
          <p class="text-muted small mb-0">House 45, Road 11, Block D, Gulshan 2, Dhaka-1212, Bangladesh</p>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
          <div class="fs-2 text-primary mb-2"><i class="bi bi-telephone-fill"></i></div>
          <h5 class="fw-bold mb-2">Phone & WhatsApp</h5>
          <p class="text-muted small mb-1">+880 1712-345678 (Hotline 24/7)</p>
          <p class="text-muted small mb-0">+880 1812-345678 (WhatsApp Support)</p>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
          <div class="fs-2 text-warning mb-2"><i class="bi bi-envelope-fill"></i></div>
          <h5 class="fw-bold mb-2">Email Desk</h5>
          <p class="text-muted small mb-1">info@gotravel.com.bd</p>
          <p class="text-muted small mb-0">support@gotravel.com.bd</p>
        </div>
      </div>
    </div>

    <!-- Contact Form & Map -->
    <div class="row g-4">
      <div class="col-lg-6">
        <div class="card border-0 shadow-lg rounded-4 p-4 p-md-5 bg-white">
          <h4 class="fw-bold mb-3"><i class="bi bi-envelope-paper-fill text-success me-2"></i> Send Us Message</h4>

          <form action="{{ route('contact.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label small fw-bold">Your Name *</label>
              <input type="text" name="name" class="form-control" required placeholder="Full Name">
            </div>

            <div class="row g-2 mb-3">
              <div class="col-6">
                <label class="form-label small fw-bold">Email *</label>
                <input type="email" name="email" class="form-control" required placeholder="you@example.com">
              </div>
              <div class="col-6">
                <label class="form-label small fw-bold">Phone Number</label>
                <input type="text" name="phone" class="form-control" placeholder="+880 1712-XXXXXX">
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label small fw-bold">Subject</label>
              <input type="text" name="subject" class="form-control" placeholder="e.g. Dubai Tour Package Inquiry">
            </div>

            <div class="mb-4">
              <label class="form-label small fw-bold">Message Details *</label>
              <textarea name="message" class="form-control" rows="4" required placeholder="Write your message here..."></textarea>
            </div>

            <button type="submit" class="btn btn-primary-custom w-100 py-3 fw-bold">Submit Message</button>
          </form>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14602.70031201991!2d90.4125!3d23.7925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7a0f7000001%3A0x280549c719ef7960!2sGulshan%202%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1710000000000!5m2!1sen!2sbd" width="100%" height="100%" style="border:0; min-height: 400px;" allowfullscreen="" loading="lazy"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
