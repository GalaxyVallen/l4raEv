@extends('layouts.body')

@section('main')

<h3>{{ Auth::user()->name ?? 'Guest' }}</h3>
@auth
    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" style="width: 200px;height: 200px !important;" class="img-thumbnail object-fit-cover rounded-circle" alt="image of {{ Auth::user()->name ?? 'Guest' }}">
@else
<img src="{{ $avatar }}" width="200" class="img-thumbnail rounded-circle" alt="image of {{ Auth::user()->name ?? 'Guest' }}">
@endauth
@endsection