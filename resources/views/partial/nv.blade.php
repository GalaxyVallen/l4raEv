<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark" data-bs-theme="dark">
  <div class="container container-lg ">
    <a class="navbar-brand" href="/">Gss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'active' : ''; }}" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('about') ? 'active' : ''; }}" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is(['blog','posts*']) ? 'active' : ''; }}" href="/blog">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('category') ? 'active' : ''; }}" href="/category">Category</a>
        </li>
      </ul>

      <ul class="navbar-nav ms-auto">     
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="dropdown-item text-bg-danger">Logout</button>
              </form>
            </li>
          </ul>
        </li>
        @else
          <li class="nav-item">
            <a href="/login" class="nav-link btn btn-danger bg-body-tertiary">Sign In</a>
          </li>
        @endauth
        </ul>

    </div>
  </div>
</nav>