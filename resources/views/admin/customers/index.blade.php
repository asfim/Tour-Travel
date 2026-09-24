@extends('layouts.admin')

@section('title', 'Customers — Admin')
@section('page_title', 'Customer Management')

@section('content')
<div class="card card-stat p-4 bg-white">
  <div class="table-responsive">
    <table class="table table-hover align-middle">
      <thead class="table-light">
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Passport #</th>
          <th>Registered Date</th>
        </tr>
      </thead>
      <tbody>
        @foreach($customers as $c)
          <tr>
            <td class="fw-bold">{{ $c->name }}</td>
            <td>{{ $c->email }}</td>
            <td>{{ $c->phone ?? 'N/A' }}</td>
            <td>{{ $c->passport_number ?? 'N/A' }}</td>
            <td>{{ $c->created_at->format('M d, Y') }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
