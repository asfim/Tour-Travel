@extends('layouts.admin')

@section('title', 'Add New Package — Admin')
@section('page_title', 'Create Tour Package')

@section('content')
<div class="card card-stat p-4 bg-white">
  <form action="{{ route('admin.packages.store') }}" method="POST">
    @csrf
    <div class="row g-3">
      <div class="col-md-8">
        <label class="form-label fw-bold">Package Title *</label>
        <input type="text" name="title" class="form-control" required placeholder="e.g. Dubai 5 Days Luxury Desert Tour">
      </div>

      <div class="col-md-4">
        <label class="form-label fw-bold">Destination *</label>
        <select name="destination_id" class="form-select" required>
          @foreach($destinations as $d)
            <option value="{{ $d->id }}">{{ $d->name }} ({{ $d->country }})</option>
          @endforeach
        </select>
      </div>

      <div class="col-md-4">
        <label class="form-label fw-bold">Category</label>
        <select name="category_id" class="form-select">
          <option value="">None</option>
          @foreach($categories as $c)
            <option value="{{ $c->id }}">{{ $c->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="col-md-2">
        <label class="form-label fw-bold">Days</label>
        <input type="number" name="duration_days" class="form-control" value="4" required>
      </div>

      <div class="col-md-2">
        <label class="form-label fw-bold">Nights</label>
        <input type="number" name="duration_nights" class="form-control" value="3" required>
      </div>

      <div class="col-md-2">
        <label class="form-label fw-bold">Starting Price (৳)</label>
        <input type="number" name="starting_price" class="form-control" required placeholder="45000">
      </div>

      <div class="col-md-2">
        <label class="form-label fw-bold">Original Price (৳)</label>
        <input type="number" name="original_price" class="form-control" placeholder="52000">
      </div>

      <div class="col-md-12">
        <label class="form-label fw-bold">Cover Image URL *</label>
        <input type="url" name="cover_image" class="form-control" required value="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&w=800&q=80">
      </div>

      <div class="col-md-12">
        <label class="form-label fw-bold">Short Description *</label>
        <textarea name="short_description" class="form-control" rows="2" required placeholder="Brief summary..."></textarea>
      </div>

      <div class="col-md-12">
        <label class="form-label fw-bold">Overview *</label>
        <textarea name="overview" class="form-control" rows="4" required placeholder="Full package details..."></textarea>
      </div>

      <div class="col-md-12 mt-4">
        <button type="submit" class="btn btn-success px-4 py-2 fw-bold">Create Package</button>
        <a href="{{ route('admin.packages') }}" class="btn btn-outline-secondary px-4 py-2">Cancel</a>
      </div>
    </div>
  </form>
</div>
@endsection
