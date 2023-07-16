
@extends('layouts.body')

@section('main')

<div class="mt-5 row justify-content-center">
  <div class="col-lg-4 border text-bg-dark  rounded">
    <main class="form-signup w-100 m-auto py-3 pb-2">
      <form action="/register" method="POST">
        @csrf

        <h3 class="h3 mb-5 fw-normal text-center display-6">Sign Up</h3>
    
        <div class="form-floating">
          <input type="text" name="name" class="form-control border-0 @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" placeholder="..." required>
          <label class="text-dark" for="name">Your name</label>
          @error('name')
          <p class="invalid-feedback mb-0 text-bg-danger rounded ps-1">{{ $message }}</p>
          @enderror
        </div>
    
        <div class="form-floating mt-2 border-0">
          <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" id="username" placeholder="..." required>
          <label class="text-dark" for="username">Your username</label>
          @error('username')
          <p class="invalid-feedback text-bg-danger rounded ps-1 mb-0">{{ $message }}</p>
          @enderror
        </div>

        <div class="form-floating mt-2 border-0">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" placeholder="..." required>
          <label class="text-dark" for="email">Your email</label>
          @error('email')
          <p class="invalid-feedback text-bg-danger rounded ps-1 mb-0">{{ $message }}</p>
          @enderror
        </div>

        <div class="form-floating mt-2 border-0">
          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="pass" placeholder="Password" required>
          <label class="text-dark" for="pass">Password</label>
          @error('password')
          <p class="invalid-feedback text-bg-danger rounded ps-1 mb-0">{{ $message }}</p>
          @enderror          
        </div>
    
        <button class="btn btn-outline-light mt-4 w-100 py-2" type="submit">Create Acc</button>
        <p class="mt-3 mb-3 pt-3 text-center border-top"><a class="link-light link-underline" href="/login  ">Sign In here!</a></p>
      </form>
    </main>
  </div>
</div>

@endsection