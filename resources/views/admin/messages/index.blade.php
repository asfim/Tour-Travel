@extends('layouts.admin')

@section('title', 'Contact Messages — Admin')
@section('page_title', 'Contact Messages')

@section('content')
<div class="card card-stat p-4 bg-white">
  <div class="table-responsive">
    <table class="table table-hover align-middle">
      <thead class="table-light">
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Subject</th>
          <th>Message</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        @foreach($messages as $m)
          <tr>
            <td class="fw-bold">{{ $m->name }}</td>
            <td>{{ $m->email }}</td>
            <td>{{ $m->phone }}</td>
            <td>{{ $m->subject }}</td>
            <td>{{ Str::limit($m->message, 40) }}</td>
            <td>{{ $m->created_at->format('M d, Y') }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
