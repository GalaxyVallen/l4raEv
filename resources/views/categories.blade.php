
@extends('layouts.body')

@section('main')
    
<h1 class="text-center fw-semibold">All Category</h1>
<p class="text-body-secondary text-center">Showing all {{ $categories->count() }} category</p>

<div class="row mt-5 justify-content-center">  
@foreach ($categories as $c)
<div class="col-md-3 col-sm-6">
  <div class="card">
    <div class="card-body p-0">
      <img src="https://placehold.co/200x75?text={{ $c->name }}" class="card-img" alt="{{ $c->name }}">
      <div class="card-img-overlay d-flex justify-content-center align-items-center" >
        <h5 class="card-title px-2 rounded display-5 fw-semibold text-center " style="background: hsla(0, 0%, 0%, 0.243)"><a href="/posts?c={{ $c->slug }}" class="link-underline link-light link-underline-opacity-0">{{ $c->name}}</a></h5>
      </div>
    </div>
  </div>
</div>
@endforeach
</div>
@endsection