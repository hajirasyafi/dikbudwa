  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
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
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('panel')}}" class="nav-link {{ Request::is('panel') ? 'active' : '' }}">
            <i class="material-icons-round align-middle">home</i>
              <p>Beranda</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('panel/sekolah') || Request::is('panel/tambahsekolah') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is('panel/sekolah') || Request::is('panel/tambahsekolah') ? 'active' : '' }}">
            <i class="material-icons-round align-middle">school</i>
            <p>Sekolah
              <i class="fas fa-angle-left right"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('panel/sekolah')}}" class="nav-link {{ Request::is('panel/sekolah') ? 'active' : '' }}">
                  <i class="material-icons-round align-middle">format_list_numbered</i>
                  <p>Daftar Sekolah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('panel/tambahsekolah')}}" class="nav-link {{ Request::is('panel/tambahsekolah') ? 'active' : '' }}">
                  <i class="material-icons-round align-middle">playlist_add</i>
                  <p>Tambah Sekolah</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('panel/daftarberita')}}" class="nav-link {{ Request::is('panel/daftarberita') ? 'active' : '' }}">
            <i class="material-icons-round align-middle">library_books</i>
              <p>Berita</p>
            </a>
          </li>
          <form action="{{route('logout')}}" method="POST">
          @csrf
          <li class="nav-item">
              <a href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault();
                                                this.closest('form').submit();">
              <i class="material-icons-round align-middle">login</i>
                <p>Logout</p>
              </a>
          </li>
          </form>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>