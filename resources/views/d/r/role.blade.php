@extends('d.layouts.body')

@section('main')


@if (session()->has('success'))
<div class="row mb-3 ms-1">
<div class="alert mb-0 col-md-5 alert-success alert-dismissible fade show" role="alert">
  <p class="mb-0">{{ session('success') }}</p>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
</div>
@endif

<!-- Form untuk Menambahkan Role pada User -->
<div class="container mt-5">
  <h2>Tambahkan Role pada Pengguna</h2>
  <span class="text-muted">{{ Auth::user()->role_id }}</span>
  <form method="POST" action="/dashboard/roles">
    @csrf
    <div class="mb-3">
      <label for="searchUser" class="form-label">Cari Pengguna:</label>
      <input type="text" class="form-control" name="user_id" id="searchUser" placeholder="Masukkan nama pengguna" onkeyup="searchUser()" required>
    </div>
    <div id="searchResult"></div> <!-- Tempat menampilkan hasil pencarian -->

    <div class="mb-3">
      <label for="role" class="form-label">Role:</label>
      <select class="form-select" id="role" name="role" required>
        <option value="">Pilih Role</option>
        <option value="admin">Admin</option>
        <option value="editor">Editor</option>
        <option value="author">Author</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Tambahkan Role</button>
  </form>
</div>

<script>
  // Fungsi untuk melakukan pencarian pengguna secara live
  function searchUser() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById('searchUser');
    filter = input.value.toUpperCase();
    ul = document.getElementById('searchResult');
    li = ul.getElementsByTagName('li');

    // Mengirim permintaan pencarian pengguna ke server
    fetch('/dashboard/users/search?keyword=' + filter)
      .then(response => response.json())
      .then(data => {
        // Menghapus semua elemen daftar pengguna sebelum memperbarui dengan hasil pencarian terbaru
        while (ul.firstChild) {
          ul.removeChild(ul.firstChild);
        }

        // Membuat elemen daftar pengguna berdasarkan hasil pencarian
        data.forEach(user => {
          var li = document.createElement('li');
          var a = document.createElement('a');
          a.href = '#';
          a.innerText = user.name;
          li.appendChild(a);
          ul.appendChild(li);
        });
      });
  }
</script>

<!-- Menampilkan Daftar Pengguna -->
<ul>
  @foreach ($users as $user)
  <li>
    <a href="#">{{ $user->name }} > {{ $user->role_id }}</a>
  </li>
  @endforeach
</ul>

@endsection