@extends('layouts.admin')

@section('title', 'Flight Requests — Admin')
@section('page_title', 'Flight Booking Requests')

@section('content')
<div class="card card-stat p-4 bg-white">
  <div class="table-responsive">
    <table class="table table-hover align-middle">
      <thead class="table-light">
        <tr>
          <th>From</th>
          <th>To</th>
          <th>Departure</th>
          <th>Passenger</th>
          <th>Phone</th>
          <th>Class</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach($flights as $f)
          <tr>
            <td class="fw-bold">{{ $f->from_location }}</td>
            <td class="fw-bold text-success">{{ $f->to_location }}</td>
            <td>{{ \Carbon\Carbon::parse($f->departure_date)->format('M d, Y') }}</td>
            <td>{{ $f->passenger_name }}</td>
            <td>{{ $f->passenger_phone }}</td>
            <td><span class="badge bg-secondary">{{ $f->cabin_class }}</span></td>
            <td><span class="badge bg-warning text-dark">{{ $f->status }}</span></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
