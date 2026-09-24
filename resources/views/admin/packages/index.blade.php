@extends('layouts.admin')

@section('title', 'Tour Packages Management — Admin')
@section('page_title', 'Tour Packages Management')

@section('content')
<div class="card card-stat p-4 bg-white">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h6 class="fw-bold mb-0">Package Inventory</h6>
    <a href="{{ route('admin.packages.create') }}" class="btn btn-success btn-sm"><i class="bi bi-plus-lg me-1"></i> Add New Package</a>
  </div>

  <div class="table-responsive">
    <table class="table table-hover align-middle">
      <thead class="table-light">
        <tr>
          <th>Package</th>
          <th>Destination</th>
          <th>Duration</th>
          <th>Starting Price</th>
          <th>Flags</th>
          <th>Rating</th>
        </tr>
      </thead>
      <tbody>
        @foreach($packages as $p)
          <tr>
            <td>
              <div class="d-flex align-items-center gap-2">
                <img src="{{ $p->cover_image }}" alt="{{ $p->title }}" class="rounded-2 object-fit-cover" style="width: 44px; height: 44px;">
                <strong>{{ $p->title }}</strong>
              </div>
            </td>
            <td>{{ $p->destination->name }}</td>
            <td>{{ $p->duration_days }}D / {{ $p->duration_nights }}N</td>
            <td class="fw-bold text-success">৳{{ number_format($p->starting_price) }}</td>
            <td>
              @if($p->is_featured)<span class="badge bg-primary">Featured</span>@endif
              @if($p->is_popular)<span class="badge bg-danger">Popular</span>@endif
              @if($p->is_hajj_umrah)<span class="badge bg-success">Hajj/Umrah</span>@endif
            </td>
            <td><i class="bi bi-star-fill text-warning"></i> {{ $p->rating }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
