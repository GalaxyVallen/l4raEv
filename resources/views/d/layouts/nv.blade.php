<nav class="navbar sticky-top navbar-expand-lg bg-dark border-bottom border-bottom-dark" data-bs-theme="dark">
  <div class="container container-lg">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : ''; }}" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('new') ? 'active' : ''; }}" href="/new">New</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('*/posts') ? 'active' : ''; }}" href="/{{ Str::lower(Auth::user()->username) }}/posts">Posts</a>
        </li>
      </ul>

      <ul class="navbar-nav ms-auto">     
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome {{ Auth::user()->username }}
          </a>
          <ul class="dropdown-menu">
            @can('admin')                
            <li><a class="dropdown-item" href="/dashboard">Settings</a></li>
            <li><a class="dropdown-item" href="/dashboard/categories">Category</a></li>
            <li><a class="dropdown-item" href="/dashboard/roles">Role</a></li>
            @endcan
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="dropdown-item text-bg-danger">Logout</button>
              </form>
            </li>
          </ul>
        </li>
        @endauth
        </ul>

    </div>
  </div>
</nav>