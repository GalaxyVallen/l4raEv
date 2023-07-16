@extends('d.layouts.body')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Welcome {{ Auth::user()->name }} <small class="text-muted">({{ Auth::user()->username }})</small></h1>
</div>
@endsection