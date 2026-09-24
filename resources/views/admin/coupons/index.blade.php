@extends('layouts.admin')

@section('title', 'Coupons — Admin')
@section('page_title', 'Discount Coupons Management')

@section('content')
<div class="card card-stat p-4 bg-white">
  <div class="table-responsive">
    <table class="table table-hover align-middle">
      <thead class="table-light">
        <tr>
          <th>Code</th>
          <th>Type</th>
          <th>Discount Value</th>
          <th>Expires At</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach($coupons as $cp)
          <tr>
            <td class="fw-bold font-monospace text-primary fs-5">{{ $cp->code }}</td>
            <td><span class="badge bg-secondary">{{ strtoupper($cp->discount_type) }}</span></td>
            <td class="fw-bold text-success">{{ $cp->discount_type === 'percent' ? $cp->discount_value . '%' : '৳' . number_format($cp->discount_value) }}</td>
            <td>{{ $cp->expires_at ? \Carbon\Carbon::parse($cp->expires_at)->format('M d, Y') : 'Never' }}</td>
            <td>@if($cp->status)<span class="badge bg-success">Active</span>@else<span class="badge bg-danger">Expired</span>@endif</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
