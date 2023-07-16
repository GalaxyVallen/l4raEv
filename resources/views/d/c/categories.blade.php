@extends('d.layouts.body')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Welcome {{ Auth::user()->name }} <small class="text-muted">({{ Auth::user()->username }})</small></h1>
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
  <a href="/dashboard/posts/new" class="btn btn-dark mb-3"><i class="bi bi-plus-lg me-1"></i>Add new category</a>

  <div class="row w-100">

@foreach ($categories as $c)
    {{ $c }}
@endforeach
    
  </div>
</div>
@endsection