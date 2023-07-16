<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
  <div class="offcanvas-lg offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="sidebarMenuLabel">Gss</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard') ? 'text-bg-dark link-light' : 'link-dark' }}" aria-current="page" href="/dashboard">
            <i class="bi bi-house-door-fill mb-1"></i>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/posts*') ? 'text-bg-dark link-light' : 'link-dark' }}" href="/dashboard/posts">
            <i class="bi bi-textarea mb-1"></i>Manage Post
          </a>
        </li>
      </ul>
      <hr class="my-3">
      <ul class="nav flex-column mb-auto">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-2 text-body-secondary text-uppercase">
          <span>Quick jump</span>
        </h6>
        <li class="nav-item">
          <a class="nav-link link-dark d-flex align-items-center gap-2" href="/blog">
            <i class="bi bi-exclude mb-1"></i>Blog
          </a>
        </li>
      </ul>
      @can('admin')          
      <hr class="my-3">
      <ul class="nav flex-column mb-auto">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-2 text-body-secondary text-uppercase">
          <span>Admin only <i class="bi bi-headset-vr mb-1"></i></span>
        </h6>
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/categories*') ? 'text-bg-dark link-light' : 'link-dark' }}" href="/dashboard/categories">
            <i class="bi bi-app-indicator mb-1"></i>All category
          </a>
        </li>
      </ul>
      @endcan
      <hr class="my-3">
      <ul class="nav flex-column mb-auto">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-2 text-body-secondary text-uppercase">
          <span>Advanced</span>
        </h6>
        <li class="nav-item">
          <a class="nav-link link-dark d-flex align-items-center gap-2" href="#">
            <i class="bi bi-gear-fill mb-1"></i>Settings
          </a>
        </li>
        <li class="nav-item text-bg-danger mt-2">
          <form action="/logout" class="d-flex text-white nav-link align-items-center gap-2" method="POST">
            @csrf
            <svg fill="white" class="bi"><use xlink:href="#door-closed"/></svg>
            <button type="submit" class="dropdown-item">Logout</button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</div>