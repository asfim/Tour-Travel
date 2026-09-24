@extends('layouts.admin')

@section('title', 'Visa Services — Admin')
@section('page_title', 'Visa Services Management')

@section('content')
<div class="card card-stat p-4 bg-white">
  <div class="table-responsive">
    <table class="table table-hover align-middle">
      <thead class="table-light">
        <tr>
          <th>Country</th>
          <th>Visa Type</th>
          <th>Fee (৳)</th>
          <th>Processing Time</th>
          <th>Validity</th>
        </tr>
      </thead>
      <tbody>
        @foreach($visas as $v)
          <tr>
            <td class="fw-bold">{{ $v->country }}</td>
            <td><span class="badge bg-primary">{{ $v->visa_type }}</span></td>
            <td class="fw-bold text-success">৳{{ number_format($v->price) }}</td>
            <td>{{ $v->processing_time }}</td>
            <td>{{ $v->validity }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
