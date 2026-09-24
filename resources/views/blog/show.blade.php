@extends('layouts.app')

@section('title', $post->title . ' — GoTravel Blog')

@section('content')
<div class="py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white mb-4">
          <span class="badge bg-primary px-3 py-1 font-weight-bold fs-6 mb-2 d-inline-block">{{ $post->category }}</span>
          <h1 class="fw-bold display-6 mb-3">{{ $post->title }}</h1>
          
          <div class="d-flex align-items-center gap-3 text-muted small mb-4 pb-3 border-bottom">
            <span><i class="bi bi-person-fill text-success me-1"></i> {{ $post->author_name }}</span>
            <span><i class="bi bi-calendar3 me-1"></i> {{ $post->created_at->format('F d, Y') }}</span>
          </div>

          <div class="rounded-4 overflow-hidden mb-4" style="height: 380px;">
            <img src="{{ $post->cover_image }}" alt="{{ $post->title }}" class="w-100 h-100 object-fit-cover">
          </div>

          <p class="lead text-dark fw-semibold mb-4">{{ $post->excerpt }}</p>

          <div class="text-muted leading-relaxed mb-4">
            {!! nl2br(e($post->content)) !!}
          </div>

          <hr class="my-4">

          <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('blog.index') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left me-1"></i> Back to Blog List</a>
            <a href="{{ route('packages.index') }}" class="btn btn-primary-custom">Explore Tour Packages</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
