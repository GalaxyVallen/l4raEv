@extends('d.layouts.body')

@section('main')
<div class="card pb-3 mt-5">
  <div class="card-body py-0">
    <form class="row g-3 mt-1" method="POST" action="/profile/edit" enctype="multipart/form-data">
      @method('put')
      @csrf
      <div class="col-md-6 order-3 order-lg-1 order-md-4">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" name="name" class="form-control" id="name" value="{{ old('name' , Auth::user()->name) }}" required>
        </div>
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <div class="input-group">
            <span class="input-group-text">@</span>
            <input type="text" class="form-control" id="username" name="username" value="{{ old('name' , Auth::user()->username) }}" required>
          </div>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <div class="input-group">
            <input type="text" class="form-control" id="email" name="email" value="{{ old('email' , Auth::user()->email) }}" required>
          </div>
        </div>
        <div class="mb-3">
          <label for="formFile" class="form-label">Avatar</label>
          <input class="form-control" type="file" accept="image/*" id="avatar" name="avatar" onchange="previewImage()">
          @error('avatar')
            <p class="text-danger ms-1 mt-1 mb-0">{{ $message }}</p>
          @enderror
        </div>
        <hr class="mt-2">
      </div>
      <div class="col-md-3 order-2 order-lg-2 mx-auto">
        @if (Auth::user()->avatar)
        <img src="{{ asset('storage/' . Auth::user()->avatar )}}" alt="" class="img-thumbnail mx-auto img-preview shadow-sm rounded-circle border-dark d-block"  style="max-width: 300px;min-height: 300px;object-fit: cover"  >
        @else
        <img src="{{ asset('img/avatar.png') }}" alt="" class="img-thumbnail mx-auto img-preview shadow-sm rounded-circle border-dark d-block"  style="max-width: 300px;min-height: 300px;object-fit: cover"  >
        @endif
      </div>
      
      <div class="col-12 col-lg-4 order-3 order-sm-2">
        <button class="btn btn-dark w-100" type="submit">Update</button>
      </div>
    </form>
    <form action="/profile/{{ Auth::user()->id }}" method="POST">
      @method('delete')
      @csrf
      <button type="submit" class="col-12 col-lg-3 btn mt-3 btn-danger" onclick="return confirm('Delete this ?')">Delete avatar</button>
    </form>  
  </div>
</div>


<script> 
 function previewImage() {
  const image = document.querySelector('#avatar');
  const imgPreview = document.querySelector('.img-preview')

  imgPreview.style.display =  'block';
  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);
  oFReader.onload = function(oFREvent) {
    imgPreview.src = oFREvent.target.result;
  }
}</script>
@endsection