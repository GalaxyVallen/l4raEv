
@extends('layouts.body')

@section('main')

<div class="row justify-content-center">
  {{-- {{ dd($post) }} --}}
  <div class="col-md-8">
  <h3 class="display-6 text-capitalize">{{ $post->title }}</h3>
  <div class="text-body-secondary fs-6 mb-1">By <a  href="/posts?a={{ $post->author->username }}"  class="link-offset-2  link-underline link-underline-opacity-0 link-underline-opacity-50-hover text-capitalize fw-semibold">{{ $post->author->username ?? 'Rei' }}</a href=""> in <a href="/posts?c={{ $post->category->slug }}" class="link-offset-2  link-underline link-underline-opacity-0 link-underline-opacity-50-hover">{{ $post->category->name }}</a></div>
  @if ($post->thumbnail)
    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="By {{ $post->author->name }}" class="rounded my-2 img-fluid">
  @else      
    <img src="https://placehold.co/1200x400?text={{ $post->category->name }}" alt="{{ $post->category->name }}" class="rounded my-2 img-fluid">
  @endif
  <div class="lead mb-3 mt-2 lh-sm">
    {!! $post->content !!}
  </div>
  <a class="link-offset-2  link-underline link-underline-opacity-0 link-underline-opacity-50-hover" href="/blog">Back</a>
  </div>
</div>

@endsection