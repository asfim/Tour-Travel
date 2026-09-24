@extends('layouts.app')

@section('title', 'Flight Booking & Schedule — GoTravel Bangladesh')

@section('content')
<div class="bg-navy text-white py-5" style="background: linear-gradient(rgba(10, 25, 47, 0.85), rgba(10, 25, 47, 0.95)), url('https://images.unsplash.com/photo-1436491865332-7a61a109cc05?auto=format&fit=crop&w=1600&q=80') center center/cover;">
  <div class="container text-center py-4">
    <span class="badge bg-success px-3 py-2 fs-6 rounded-pill mb-2">Airlines Ticketing</span>
    <h1 class="display-5 fw-bold text-white mb-2">Domestic & International Flight Booking</h1>
    <p class="lead text-white-50">যেকোনো গন্তব্যের এয়ার টিকেট বুক করুন সর্বনিম্ন মূল্যে</p>
  </div>
</div>

<div class="py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="card border-0 shadow-lg rounded-4 p-4 p-md-5 bg-white">
          <h4 class="fw-bold mb-4 text-primary-color"><i class="bi bi-search me-2 text-success"></i> Flight Search & Booking Request</h4>

          <form action="{{ route('flights.request') }}" method="POST">
            @csrf
            
            <div class="row g-3 mb-3">
              <div class="col-md-4">
                <label class="form-label small fw-bold">Trip Type</label>
                <select name="trip_type" class="form-select">
                  <option value="round_trip" selected>Round Trip</option>
                  <option value="one_way">One Way</option>
                  <option value="multi_city">Multi City</option>
                </select>
              </div>

              <div class="col-md-4">
                <label class="form-label small fw-bold">Passengers</label>
                <select name="passengers_count" class="form-select">
                  <option value="1" selected>1 Passenger</option>
                  <option value="2">2 Passengers</option>
                  <option value="3">3 Passengers</option>
                  <option value="4">4+ Passengers</option>
                </select>
              </div>

              <div class="col-md-4">
                <label class="form-label small fw-bold">Cabin Class</label>
                <select name="cabin_class" class="form-select">
                  <option value="Economy" selected>Economy Class</option>
                  <option value="Premium Economy">Premium Economy</option>
                  <option value="Business">Business Class</option>
                  <option value="First">First Class</option>
                </select>
              </div>

              <div class="col-md-6">
                <label class="form-label small fw-bold">Departure City / Airport *</label>
                <input type="text" name="from_location" class="form-control" placeholder="Dhaka (DAC)" required>
              </div>

              <div class="col-md-6">
                <label class="form-label small fw-bold">Destination City / Airport *</label>
                <input type="text" name="to_location" class="form-control" placeholder="Dubai (DXB) / Bangkok (BKK)" required>
              </div>

              <div class="col-md-6">
                <label class="form-label small fw-bold">Departure Date *</label>
                <input type="date" name="departure_date" class="form-control" required min="{{ date('Y-m-d') }}">
              </div>

              <div class="col-md-6">
                <label class="form-label small fw-bold">Return Date</label>
                <input type="date" name="return_date" class="form-control" min="{{ date('Y-m-d') }}">
              </div>

              <div class="col-md-4">
                <label class="form-label small fw-bold">Passenger Name *</label>
                <input type="text" name="passenger_name" class="form-control" required placeholder="Full Name">
              </div>

              <div class="col-md-4">
                <label class="form-label small fw-bold">Mobile Number *</label>
                <input type="text" name="passenger_phone" class="form-control" required placeholder="+880 1712-XXXXXX">
              </div>

              <div class="col-md-4">
                <label class="form-label small fw-bold">Email Address *</label>
                <input type="email" name="passenger_email" class="form-control" required placeholder="you@example.com">
              </div>

              <div class="col-md-12">
                <label class="form-label small fw-bold">Special Airline Preferences / Notes</label>
                <textarea name="notes" class="form-control" rows="2" placeholder="Preferred airlines (Biman, US-Bangla, Emirates, Saudia), luggage allowance..."></textarea>
              </div>
            </div>

            <button type="submit" class="btn btn-primary-custom w-100 py-3 font-weight-bold fs-6">
              <i class="bi bi-airplane-fill me-2"></i> Submit Flight Booking Request
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
