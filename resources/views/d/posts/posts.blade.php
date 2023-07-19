@extends('d.layouts.body')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ Auth::user()->username }} Posts</h1>
</div>

@if (session()->has('succss'))
<div class="row mb-3 ms-1">
<div class="alert mb-0 col-md-5 alert-success alert-dismissible fade show" role="alert">
  <p class="mb-0">{{ session('succss') }}</p>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
</div>
@endif

<div class="w-100">
  <a href="/new" class="btn btn-dark mb-3"><i class="bi bi-plus-lg me-1"></i>Create new post</a>

  <div class="row w-100">
    @foreach ($posts as $post)
      <div class="col-lg-3 mt-3">
        <div class="card shadow-sm">
          @if ($post->thumbnail)
          <div style="height: 8rem;overflow:" class="d-flex justify-content-center">
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="By {{ $post->author->name }}" class="rounded my-2" style="max-width: 100%; height: 100%; object-fit: cover" >
          </div>
          @else      
          <div style="height: 8rem;overflow:" class="d-flex justify-content-center">
            <img src="https://placehold.co/1200x400?text={{ $post->category->name }}" alt="{{ $post->category->name }}" class="rounded my-2" style="max-width: 100%; height: 100%; object-fit: cover" >
          </div>
          @endif
          <div class="card-body">
            <p class="card-text h6">{{ $post->title }}</p>
            <small class="text-body-secondary">{{ $post->category->name }} {{ $post->thumbnail }}</small>
            <div class="d-flex justify-content-between align-items-center">
              @if ($post->author->id != Auth::user()->id)
              <p class="text-danger fw-bold">403</p>
              @else
              <div class="btn-group mt-3">
                <a href="/{{ Str::lower(Auth::user()->username) }}/posts/{{ $post->slug }}" class="text-decoration-none btn btn-sm btn-outline-info"><i class="bi bi-info-circle"></i> Detail</a>
                <a href="/{{ Str::lower(Auth::user()->username) }}/posts/{{ $post->slug }}/edit" class="text-decoration-none btn btn-sm btn-outline-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                <form action="/{{ Str::lower(Auth::user()->username) }}/posts/{{ $post->slug }}" method="POST" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-outline-danger btn-sm rounded-start-0" onclick="return confirm('Delete it?')"><i class="bi bi-trash3 me-1"></i>Delete</button>
                </form>
              </div>
              @endif
            </div>
            </div>
        </div>
      </div>
    @endforeach
  </div> 
</div>
@endsection