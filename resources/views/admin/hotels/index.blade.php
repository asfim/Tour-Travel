@extends('layouts.admin')

@section('title', 'Hotels — Admin')
@section('page_title', 'Hotels Management')

@section('content')
<div class="card card-stat p-4 bg-white">
  <div class="table-responsive">
    <table class="table table-hover align-middle">
      <thead class="table-light">
        <tr>
          <th>Hotel</th>
          <th>Location</th>
          <th>Rating</th>
          <th>Price / Night</th>
          <th>Featured</th>
        </tr>
      </thead>
      <tbody>
        @foreach($hotels as $h)
          <tr>
            <td>
              <div class="d-flex align-items-center gap-2">
                <img src="{{ $h->cover_image }}" alt="{{ $h->name }}" class="rounded-2 object-fit-cover" style="width: 44px; height: 44px;">
                <strong>{{ $h->name }}</strong>
              </div>
            </td>
            <td>{{ $h->location }}</td>
            <td><i class="bi bi-star-fill text-warning"></i> {{ $h->rating }}</td>
            <td class="fw-bold text-success">৳{{ number_format($h->price_per_night) }}</td>
            <td>@if($h->is_featured)<span class="badge bg-success">Yes</span>@else<span class="badge bg-secondary">No</span>@endif</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
