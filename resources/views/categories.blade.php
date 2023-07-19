
@extends('layouts.body')

@section('main')
    
<h1 class="text-center fw-semibold">All Category</h1>
<p class="text-body-secondary text-center">Showing all {{ $categories->count() }} category</p>

<div class="mt-5">  
@foreach ($categories as $c)
  <button class="btn btn-dark text-capitalize border-0 text-start rounded fw-semibold" ><a href="/posts?c={{ $c->slug }}" class="text-decoration-none fs-5 link-light">{{ $c->name}}</a> <span class="d-block text-start text-light text-opacity-75 border-top order border-secondary">{{ $c->posts->count() }} Posts</span></button>
  @endforeach
</div>
@endsection