@extends('d.layouts.body')

@section('main')

@if (session()->has('success'))
<div class="row mt-3 ms-1 justify-content-end">
<div class="alert mb-0 col-md-5 alert-success alert-dismissible fade show" role="alert">
  <p class="mb-0">{{ session('success') }}</p>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
</div>
@endif

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <div class="mt-4 container">
    <div class="card pb-3">
      <div class="bg-body-secondary" style="min-height: 250px; background-image:url(https://placehold.co/1200x400?text={{ Auth::user()->name }}); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
      <div class="card-body py-0">
          <div class="d-sm-flex align-items-center text-center text-sm-start">
              <div style="margin-top: -35px; width: 125px;height: 125px;" class="mx-md-0 mb-3 mb-md-0 mx-auto">
                @if (Auth::user()->avatar)
                <img class="border border-3 border-light rounded-circle img-fluid bg-dark " style="height: 100% !important;object-fit: cover" src="{{ asset('storage/' . $user->avatar) }}" alt="{{ Auth::user()->name }}">
                @else  
                <img class="border border-3 border-light rounded-circle img-fluid bg-dark " style="height: 100% !important;object-fit: cover" src="{{ asset('img/avatar.png') }}" alt="{{ Auth::user()->name }}">
                @endif
              </div>
              <div class="ms-md-3 ms-sm-0"> 
                  <h1 class="fs-4 fw-semibold mb-0">{{ Auth::user()->name }}</h1>
                  <p class="mb-0 text-muted"><span>@</span>{{ Auth::user()->username }}</p>
              </div>
              <div style="margin-top: 20px; margin-left: auto;">
                  <a href="/profile/{{ Str::lower(Auth::user()->username) }}/edit" class="btn btn-dark"><i class="bi bi-pencil-fill" style="padding-right: 0.25rem;"></i> Edit profile</a>
              </div>
          </div>
          <ul class="list-inline mb-0 text-center text-sm-start mt-3">
              <li class="list-inline-item">Email: {{ Auth::user()->email }}</li>|
              <li class="list-inline-item ms-1 text-capitalize">Role: {{ Auth::user()->role_id }}</li>|
              <li class="list-inline-item ms-1">Joined on {{ Auth::user()->created_at->diffForHumans() }}</li>
          </ul>
      </div>
    </div>
  </div>
</div>  
</div>
@endsection