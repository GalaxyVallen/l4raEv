
@extends('layouts.body')

@section('main')
    
<h1 class="text-center mt-5 text-capitalize fw-semibold">{{ $title }}</h1>
<div class="row my-4 justify-content-center">
  <div class="col-md-4">
    <form class="d-flex" action="/posts" method="GET" role="search">
      @if (request('c'))
          <input type="hidden" name="c" value="{{ request('c') }}">
      @endif
      @if (request('a'))
          <input type="hidden" name="a" value="{{ request('a') }}">
      @endif
    <input class="form-control me-1" type="text" placeholder="Search" autofocus="true" name="s" value="{{ request('s') }}" aria-label="Search">
    <button class="btn btn-dark" type="submit">Search</button>
    </form>
  </div>@if ($posts->count() != 0)
  <p class="text-body-secondary mt-2 text-center">There's total of {{ $posts->total() }} post</p>
  @endif  
</div>


@if ($posts->count())    
<div class="card mt-3 mb-3">
  @if ($posts[0]->thumbnail)
  <img src="{{ asset('storage/' . $posts[0]->thumbnail) }}" alt="By {{ $posts[0]->author->name }}" class="card-img-top">
  @else      
  <img src="https://placehold.co/1200x400?text={{ $posts[0]->category->name }}" alt="{{ $posts[0]->category->name }}" class="card-img-top">
  @endif
  <div class="card-body">
    <h3 class="card-title display-5">{{ $posts[0]->title }}</h3>
    <div class="text-body-secondary fs-5">By <a href="/posts?a={{ $posts[0]->author->username }}" class="link-offset-2  link-underline link-underline-opacity-0 link-underline-opacity-50-hover fw-semibold text-capitalize">{{ $posts[0]->author->username ?? 'Rei' }}</a href=""><span class="badge ms-2 text-bg-dark p-2  "><a href="/posts?c={{ $posts[0]->category->slug }}" class="link-light link-underline link-underline-opacity-0">{{ $posts[0]->category->name }}</a></span>  
    </div>
    <p class="card-text fs-5"><small class="text-body-secondary">Published {{ $posts[0]->created_at->diffForHumans() }}</small></p>
    <p class="card-text fs-5 border-bottom mb-2 pb-2">{{ $posts[0]->excrpt }}</p>
    <a class="link-offset-2 link-underline link-underline-opacity-0 link-underline-opacity-50-hover" href="/posts/{{ $posts[0]->slug }}">Detail</a>
  </div>
</div>


<div class="row">
  @foreach ($posts->skip(1) as $post)
  <div class="col-sm-12 mb-3 col-md-3">
    <div class="card">
      <div class="card-body">
        @if ($post->thumbnail)
          <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="By {{ $post->author->name }}" class="rounded my-2 img-fluid">
        @else      
          <img src="https://placehold.co/500x300?text={{ $post->category->name }}" alt="{{ $post->category->name }}" class="rounded my-2 img-fluid">
        @endif
        <h5 class="card-title mt-3">{{ $post->title}}</h5>
        <p class="card-subtitle  text-body-secondary fs-5"><small class="text-body-secondary">By <a href="/posts?a={{ $post->author->username }}" class="link-offset-2  link-underline link-underline-opacity-0 link-underline-opacity-50-hover fw-semibold text-capitalize">{{ $post->author->username }}</a></small></p>
        <p class="card-text fs-5 mb-2"><small class="text-body-secondary">{{ $post->created_at->diffForHumans() }}</small></p>
        <span class="badge text-bg-dark mb-3 p-2 mt-0"><a href="/posts?c={{ $post->category->slug }}" class="link-light link-underline link-underline-opacity-0">{{ $post->category->name }}</a></span>  
        <p class="card-text border-bottom mb-2 pb-2">{{ $post->excrpt}}</p>
        <a class="link-offset-2 link-underline link-underline-opacity-0 link-underline-opacity-50-hover" href="/posts/{{ $post->slug }}">Detail</a>
      </div>
    </div>
  </div>
  @endforeach
</div>

@else
<p class="text-danger text-center">No post found</p>
@endif

{{ $posts->links() }}

@endsection