@extends('d.layouts.body')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ Auth::user()->name }} Posts</h1>
</div>
<nav aria-label="breadcrumb ">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/dashboard/posts">Posts</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
  </ol>
</nav>
<div class="mb-3">
  <a href="/dashboard/posts" class="btn btn-outline-primary">Back</a>
  <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-outline-warning">Edit</a>
  <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
    @method('delete')
    @csrf
    <button class="btn btn-outline-danger" onclick="return confirm('Delete it?')">Delete</button>
  </form>
</div>

<div class="row ">
  {{-- {{ dd($post) }} --}}
  <div class="col-lg-8">
  <h3 class="display-6 text-capitalize">{{ $post->title }}</h3>
  @if ($post->thumbnail)
  <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="By {{ $post->author->name }}" class="rounded my-2 img-fluid">
  @else      
  <img src="https://placehold.co/1200x400?text={{ $post->category->name }}" alt="{{ $post->category->name }}" class="rounded my-2 img-fluid">
  @endif
  <div class="lead mb-3 mt-2 lh-sm">
    {!! $post->content !!}
  </div>
  </div>
</div>


@endsection