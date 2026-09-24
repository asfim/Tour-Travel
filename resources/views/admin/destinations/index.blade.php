@extends('layouts.admin')

@section('title', 'Destinations — Admin')
@section('page_title', 'Destinations Management')

@section('content')
<div class="card card-stat p-4 bg-white">
  <div class="table-responsive">
    <table class="table table-hover align-middle">
      <thead class="table-light">
        <tr>
          <th>Destination</th>
          <th>Country</th>
          <th>Popular</th>
          <th>Featured</th>
          <th>Packages Count</th>
        </tr>
      </thead>
      <tbody>
        @foreach($destinations as $d)
          <tr>
            <td>
              <div class="d-flex align-items-center gap-2">
                <img src="{{ $d->image_url }}" alt="{{ $d->name }}" class="rounded-2 object-fit-cover" style="width: 44px; height: 44px;">
                <strong>{{ $d->name }}</strong>
              </div>
            </td>
            <td>{{ $d->country }}</td>
            <td>@if($d->is_popular)<span class="badge bg-success">Yes</span>@else<span class="badge bg-secondary">No</span>@endif</td>
            <td>@if($d->is_featured)<span class="badge bg-primary">Yes</span>@else<span class="badge bg-secondary">No</span>@endif</td>
            <td><span class="badge bg-light text-dark border">{{ $d->packages_count ?? 0 }} Packages</span></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
