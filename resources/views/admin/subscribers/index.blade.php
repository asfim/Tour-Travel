@extends('layouts.admin')

@section('title', 'Newsletter Subscribers — Admin')
@section('page_title', 'Newsletter Subscribers')

@section('content')
<div class="card card-stat p-4 bg-white">
  <div class="table-responsive">
    <table class="table table-hover align-middle">
      <thead class="table-light">
        <tr>
          <th>ID</th>
          <th>Subscriber Email</th>
          <th>Subscribed Date</th>
        </tr>
      </thead>
      <tbody>
        @foreach($subscribers as $s)
          <tr>
            <td>#{{ $s->id }}</td>
            <td class="fw-bold text-success">{{ $s->email }}</td>
            <td>{{ $s->created_at->format('M d, Y H:i') }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
