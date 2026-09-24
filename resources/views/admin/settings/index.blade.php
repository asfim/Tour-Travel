@extends('layouts.admin')

@section('title', 'Website & SEO Settings — Admin')
@section('page_title', 'System & SEO Settings')

@section('content')
<div class="card card-stat p-4 bg-white">
  <h5 class="fw-bold mb-4"><i class="bi bi-gear-fill me-2 text-primary"></i> General Agency & SEO Settings</h5>

  <form action="#" method="POST" onsubmit="alert('Settings updated successfully!'); return false;">
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label fw-bold">Agency Name</label>
        <input type="text" class="form-control" value="GoTravel Bangladesh">
      </div>
      <div class="col-md-6">
        <label class="form-label fw-bold">Hotline Number</label>
        <input type="text" class="form-control" value="+880 1712-345678">
      </div>
      <div class="col-md-6">
        <label class="form-label fw-bold">Support Email</label>
        <input type="email" class="form-control" value="info@gotravel.com.bd">
      </div>
      <div class="col-md-6">
        <label class="form-label fw-bold">Head Office Address</label>
        <input type="text" class="form-control" value="House 45, Road 11, Block D, Gulshan 2, Dhaka-1212">
      </div>

      <div class="col-md-12 mt-4">
        <h6 class="fw-bold text-success"><i class="bi bi-search me-1"></i> SEO Meta Configuration</h6>
      </div>

      <div class="col-md-6">
        <label class="form-label fw-bold">Default SEO Meta Title</label>
        <input type="text" class="form-control" value="GoTravel Bangladesh — Best Tour Packages & Visa Processing">
      </div>

      <div class="col-md-6">
        <label class="form-label fw-bold">Default Meta Keywords</label>
        <input type="text" class="form-control" value="travel agency bangladesh, tour package, air ticket, visa processing, dubai tour">
      </div>

      <div class="col-md-12">
        <label class="form-label fw-bold">Meta Description</label>
        <textarea class="form-control" rows="2">GoTravel Bangladesh is a premier tour & travel agency providing flight booking, hotel reservation, tour packages, Hajj & Umrah, and visa processing services.</textarea>
      </div>

      <div class="col-md-12 mt-4">
        <button type="submit" class="btn btn-success px-4 fw-bold">Save System Settings</button>
      </div>
    </div>
  </form>
</div>
@endsection
