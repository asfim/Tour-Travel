@extends('layouts.customer')

@section('title', 'Profile Settings — GoTravel Bangladesh')

@section('customer_content')
<div class="row g-4">
  <!-- Profile Update -->
  <div class="col-md-7">
    <div class="card border-0 shadow-sm rounded-4 bg-white p-4">
      <h5 class="fw-bold mb-3"><i class="bi bi-person-gear text-success me-2"></i> Profile Information</h5>

      <form action="{{ route('customer.profile.update') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label class="form-label small fw-bold">Full Name *</label>
          <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="mb-3">
          <label class="form-label small fw-bold">Email Address (Read Only)</label>
          <input type="email" class="form-control bg-light" value="{{ $user->email }}" readonly>
        </div>

        <div class="mb-3">
          <label class="form-label small fw-bold">Mobile Phone *</label>
          <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" required>
        </div>

        <div class="mb-3">
          <label class="form-label small fw-bold">Present Address</label>
          <input type="text" name="address" class="form-control" value="{{ $user->address }}" placeholder="e.g. Dhanmondi, Dhaka">
        </div>

        <div class="mb-4">
          <label class="form-label small fw-bold">Passport Number</label>
          <input type="text" name="passport_number" class="form-control" value="{{ $user->passport_number }}" placeholder="e.g. B01234567">
        </div>

        <button type="submit" class="btn btn-primary-custom">Save Profile Changes</button>
      </form>
    </div>
  </div>

  <!-- Password Change -->
  <div class="col-md-5">
    <div class="card border-0 shadow-sm rounded-4 bg-white p-4">
      <h5 class="fw-bold mb-3"><i class="bi bi-shield-lock text-danger me-2"></i> Change Password</h5>

      <form action="{{ route('customer.password.change') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label class="form-label small fw-bold">Current Password *</label>
          <input type="password" name="current_password" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label small fw-bold">New Password *</label>
          <input type="password" name="password" class="form-control" required minlength="6">
        </div>

        <div class="mb-4">
          <label class="form-label small fw-bold">Confirm New Password *</label>
          <input type="password" name="password_confirmation" class="form-control" required minlength="6">
        </div>

        <button type="submit" class="btn btn-navy-custom w-100">Update Password</button>
      </form>
    </div>
  </div>
</div>
@endsection
