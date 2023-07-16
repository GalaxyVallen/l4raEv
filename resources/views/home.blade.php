
@extends('layouts.body')

@section('main')
    
<h1 class="text-center">Welcome {{ Auth::user()->name ?? 'Guest' }}</h1>


@endsection