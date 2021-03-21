<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
      <div class="sidebar-search-results">
        <div class="list-group"><a href="#" class="list-group-item">
            <div class="search-title">
              <b class="text-light"></b>N<b class="text-light"></b>o<b class="text-light"></b> <b class="text-light"></b>e<b class="text-light"></b>l<b class="text-light"></b>e<b class="text-light"></b>m<b class="text-light"></b>e<b class="text-light"></b>n<b class="text-light"></b>t<b class="text-light"></b> <b class="text-light"></b>f<b class="text-light"></b>o<b class="text-light"></b>u<b class="text-light"></b>n<b class="text-light"></b>d<b class="text-light"></b>!<b class="text-light"></b>
            </div>
            <div class="search-path">

            </div>
          </a></div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-compact nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="#" class="nav-link {{ request()->routeIs('admin') ? 'active' : ''}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('posts.index') }}" class="nav-link {{ request()->routeIs('posts.*') ? 'active' : ''}}">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Bài viết
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('categories.index') }}" class="nav-link {{ request()->routeIs('categories.*') ? 'active' : ''}}">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <p>
              Category
              <span class="badge badge-info right">2</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('pages.index') }}" class="nav-link {{ request()->routeIs('pages.*') ? 'active' : ''}}">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Pages
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('menus.index') }}" class="nav-link {{ request()->routeIs('menus.*') ? 'active' : ''}}">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Menu
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('configs.index') }}" class="nav-link {{ request()->routeIs('configs.*') ? 'active' : ''}}">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Config
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('slides.index') }}" class="nav-link {{ request()->routeIs('slides.*') ? 'active' : ''}}">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Slides
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('advertises.index') }}" class="nav-link {{ request()->routeIs('advertises.*') ? 'active' : ''}}">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Advertises
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('group_users.index') }}" class="nav-link {{ request()->routeIs('group_users.*') ? 'active' : ''}}">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Group User
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.*') ? 'active' : ''}}">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Users
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>