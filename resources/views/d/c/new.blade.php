@extends('d.layouts.body')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Create new category</h1>
</div>

@if (session()->has('succss'))
<div class="row justify-content-center">
<div class="alert mb-0 col-md-4 alert-success alert-dismissible fade show" role="alert">
  <p class="mb-0">{{ session('succss') }}</p>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
</div>
@endif


<div class="row">
  <div class="col-lg-7">
    <form method="POST" action="/dashboard/categories" class="mb-5"> 
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" autofocus id="name" value="{{ old('name') }}" required aria-describedby="Create new"  onkeyup="generateSlug()">
        <div id="name" class="form-text">Need inspiration?</div>
        @error('name')
          <p class="text-danger mb-0">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" value="{{ old('slug') }}" aria-describedby="This is slug">
      </div>
      <button type="submit" class="btn btn-dark">Create</button>
    </form>
  </div>
</div>

<script>
  function generateSlug() {
        var title = document.getElementById('name').value;
        var slug = slugify(title);
        document.getElementById('slug').value = slug;
    }

    function slugify(text) {
        return text.toString().toLowerCase()
            .replace(/\s+/g, '-')        // Replace spaces with -
            .replace(/[^\w\-]+/g, '')   // Remove all non-word chars
            .replace(/\-\-+/g, '-')      // Replace multiple - with single -
            .replace(/^-+/, '')          // Trim - from start of text
            .replace(/-+$/, '');         // Trim - from end of text
    }

</script>
@endsection
