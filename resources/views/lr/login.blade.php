
@extends('layouts.body')

@section('main')
@if (session()->has('err'))
<div class="row justify-content-center">
<div class="alert mb-0 col-md-4 alert-danger alert-dismissible fade show" role="alert">
  <p class="mb-0">{{ session('err') }}</p>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
</div>
@endif

<div class="mt-5 row justify-content-center">
  <div class="col-md-4 border text-bg-dark  rounded">
    <main class="form-signin w-100 m-auto py-3 pb-2">
      <h3 class="h3 mb-5 fw-normal text-center display-6">Sign in</h3>
      <form action="/login" method="POST">
        @csrf
        <div class="form-floating">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" autofocus required>
          <label class="text-dark" for="email">Email address</label>
          @error('email')
          <p class="invalid-feedback text-bg-danger rounded ps-1 mb-0">{{ $message }}</p>
          @enderror
        </div>
        <div class="form-floating mt-2">
          <input type="password" name="password" class="form-control @error('pass') is-invalid @enderror" id="pass" placeholder="Password" required >
          <label class="text-dark" for="pass">Password</label>
          @error('password')
          <p class="invalid-feedback text-bg-danger rounded ps-1 mb-0">{{ $message }}</p>
          @enderror
        </div>
        <div class="mt-1 form-check">
          <input type="checkbox" class="form-check-input" onclick="sa()" id="c">
          <label class="form-check-label" for="c">Check me out</label>
        </div>
      
        <button class="btn btn-outline-light mt-2 w-100 py-2" type="submit">Sign in</button>
        <p class="mt-3 mb-3 pt-3 text-center border-top"><a class="link-light link-underline" href="/register">Sign Up here!</a></p>
      </form>
    </main>
  </div>
</div>

<script>
  function sa() {
    const c = document.getElementById('pass');
    if (c.type == 'password') {
      c.type = 'text'
    } else {
      c.type='password'
    }
  }
</script>

@endsection