@extends('layouts.body')

@section('main')

<h3>{{ Auth::user()->name ?? 'Guest' }}</h3>
<img src="{{ $avatar }}" width="200" class="img-thumbnail rounded-circle" alt="image of {{ Auth::user()->name ?? 'Guest' }}">
    
@endsection