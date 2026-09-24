@extends('layouts.app')

@section('title', 'Travel Blog & Guide — GoTravel Bangladesh')

@section('content')
<div class="bg-navy text-white py-5" style="background: linear-gradient(rgba(10, 25, 47, 0.8), rgba(10, 25, 47, 0.9)), url('https://images.unsplash.com/photo-1488646953014-85cb44e25828?auto=format&fit=crop&w=1600&q=80') center center/cover;">
  <div class="container text-center py-4">
    <span class="badge bg-success px-3 py-2 fs-6 rounded-pill mb-2">Travel Insights</span>
    <h1 class="display-5 fw-bold text-white mb-2">GoTravel Blog & Guide</h1>
    <p class="lead text-white-50">ভ্রমণ টিপস, ভিসা প্রসেসিং গাইড ও গন্তব্যের খবর</p>
  </div>
</div>

<div class="py-5 bg-light">
  <div class="container">
    <div class="row g-4">
      @foreach($posts as $post)
        <div class="col-lg-4 col-md-6">
          <div class="card-custom">
            <div class="card-img-wrapper" style="height: 220px;">
              <img src="{{ $post->cover_image }}" alt="{{ $post->title }}" loading="lazy">
              <span class="card-badge bg-primary">{{ $post->category }}</span>
            </div>
            <div class="card-body-custom">
              <small class="text-muted d-block mb-2"><i class="bi bi-calendar3 me-1"></i> {{ $post->created_at->format('M d, Y') }}</small>
              <h5 class="card-title-custom"><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h5>
              <p class="text-muted small mb-3">{{ Str::limit($post->excerpt, 95) }}</p>
              <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-outline-success btn-sm w-100 fw-bold">Read Article</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
