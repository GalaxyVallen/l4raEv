<nav class="navbar d-md-block d-lg-none navbar-expand-lg bg-body-tertiary">
  <div class="container-lg">
    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse border-bottom pb-2" id="navbarNavDropdown">
      <ul class="navbar-nav mt-2">
        <li class="nav-item">
          <a class="nav-link p-2 d-flex rounded align-items-center gap-2 {{ Request::is('dashboard') ? 'text-bg-dark link-light' : 'link-dark' }}" aria-current="page" href="/dashboard">
            <i class="bi bi-house-door-fill mb-2"></i>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link p-2 rounded d-flex align-items-center gap-2 {{ Request::is('dashboard/posts*') ? 'text-bg-dark link-light' : 'link-dark' }}" href="/dashboard/posts">
            <i class="bi bi-textarea mb-2"></i>Manage Post
          </a>
        </li>
        <h6 class="sidebar-heading my-2 mt-3 text-body-secondary text-uppercase">
          <span>Quick jump</span>
        </h6>
        <li class="nav-item">
          <a class="nav-link p-2 rounded link-dark d-flex align-items-center gap-2" href="/blog">
            <i class="bi bi-exclude mb-1"></i>Blog
          </a>
        </li>
        @can('admin')          
        <hr class="my-2">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span>Admin only <i class="bi bi-headset-vr mb-1"></i></span>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item  {{ Request::is('dashboard/categories*') ? 'text-bg-dark link-light' : 'link-dark' }}" href="/dashboard/categories">All category</a></li>
          </ul>
        </li>
        @endcan
      </ul>
    </div>
  </div>
</nav>