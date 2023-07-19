@extends('d.layouts.body')

@section('main')
<div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Create new post</h1>
</div>

@if (session()->has('succss'))
<div class="row justify-content-center">
<div class="alert mb-0 col-md-4 alert-success alert-dismissible fade show" role="alert">
  <p class="mb-0">{{ session('succss') }}</p>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
</div>
@endif


<div class="row justify-content-center">
  <div class="col-lg-7">
    <form method="POST" action="/dashboard/posts" enctype="multipart/form-data" class="mb-5"> 
      @csrf
      <div class="mb-3">
        <label for="titl" class="form-label">Title</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" autofocus id="title" value="{{ old('title') }}" required aria-describedby="Create new" onkeyup="generateSlug()">
        <div id="titl" class="form-text">Need insipration?</div>
        @error('title')
          <p class="text-danger mb-0">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" value="{{ old('slug') }}" aria-describedby="This is slug">
        @error('slug')
          <p class="text-danger mb-0">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select class="form-select @error('category') border-danger @enderror" name="category_id" required aria-label="Default select example">
          {{-- looping table category --}}
          @foreach ($categories as $c)
            @if (old('category_id') == $c->id)
            <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
            @else
            <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endif
          @endforeach
        </select>
        @error('category')
          <p class="text-danger mb-0">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-3 border rounded p-1 shadow-sm col-sm-9">
        <img src="" alt="" class="img-fluid rounded img-preview">
      </div>
      <div class="mb-3">
        <label for="thumbnail" class="form-label">Select Thumbnail</label>
        <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" accept="image/*" name="thumbnail" id="thumbnail" onchange="previewImage()">
        @error('thumbnail')
          <p class="text-danger mb-0">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        @error('content')
          <p class="text-danger mb-1">{{ $message }}</p>
        @enderror
        <input id="content" type="hidden" name="content" value="{{ old('content') }}">
        <trix-editor input="content"></trix-editor>
      </div>
      <button type="submit" class="btn btn-dark">Create</button>
    </form>
  </div>
</div>
<style>
  button[data-trix-action="attachFiles"]{
    display: none
  }
</style>
<script>
  document.addEventListener('trix-file-accept',function(e) {
    e.preventDefault();
  })
  function generateSlug() {
        var title = document.getElementById('title').value;
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

    function previewImage() {
    const image = document.querySelector('#thumbnail');
    const imgPreview = document.querySelector('.img-preview')

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }

</script>
@endsection