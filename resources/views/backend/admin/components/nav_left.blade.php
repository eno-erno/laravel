  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{url('backend')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('backend')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{url('admin/dashboard/')}}" class="nav-link {{ (request()->segment(2) == 'dashboard') ? 'active' : '' }} ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/widgets/')}}" class="nav-link {{ (request()->segment(2) == 'widgets') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>

{{-- produk  --}}
          @if(request()->segment(2) == 'product' || request()->segment(2) == 'brand' || request()->segment(2) == 'kategori-produk')
              <?php 
                $active = "active";
                $menu_open = "menu-open";
              ?>
          @else
              <?php 
                $active = "";
                $menu_open = "";
              ?>
          @endif

            <li class="nav-item has-treeview {{$menu_open}}">
            <a href="#" class="nav-link {{$active}}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Produk
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/product/')}}" class="nav-link {{ (request()->segment(2) == 'product') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Semua Produk</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('admin/brand/')}}" class="nav-link {{ (request()->segment(2) == 'brand') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brand Produk</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('admin/kategori-produk/')}}" class="nav-link {{ (request()->segment(2) == 'kategori-produk') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori Produk</p>
                </a>
              </li>
            </ul>
          </li>
{{-- order  --}}
         @if(request()->segment(2) == 'order')
              <?php 
                $active = "active";
                $menu_open = "menu-open";
              ?>
          @else
              <?php 
                $active = "";
                $menu_open = "";
              ?>
          @endif

          <li class="nav-item has-treeview {{$menu_open}}">
            <a href="#" class="nav-link {{$active}}">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Penjualan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/order/')}}" class="nav-link {{ (request()->segment(2) == 'order') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Semua Penjualan</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Pesanan Customer
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/pesanan-baru')}}" class="nav-link {{ (request()->segment(2) == 'pesanan-baru') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Baru</p> <span class="badge badge-info right">6</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/konfirmasi-pesanan')}}" class="nav-link {{ (request()->segment(2) == 'konfirmasi-pesanan') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Diterima/Tolak</p> <span class="badge badge-info right">6</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/pesanan-siap-proses')}}" class="nav-link {{ (request()->segment(2) == 'pesanan-siap-proses') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Siap Proses</p> <span class="badge badge-info right">6</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/pesanan-transfer')}}" class="nav-link {{ (request()->segment(2) == 'pesanan-transfer') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sudah Transfer</p> <span class="badge badge-info right">6</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/pesanan-resi')}}" class="nav-link {{ (request()->segment(2) == 'pesanan-resi') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Resi Pesanan</p> <span class="badge badge-info right">6</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/pesanan-siap-kirim')}}" class="nav-link {{ (request()->segment(2) == 'pesanan-siap-kirim') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Siap kirim</p> <span class="badge badge-info right">6</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/pesanan-selesai')}}" class="nav-link {{ (request()->segment(2) == 'pesanan-selesai') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pesanan Selesai</p> <span class="badge badge-info right">6</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/pesanan-komplain')}}" class="nav-link {{ (request()->segment(2) == 'pesanan-komplain') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Komplain</p> <span class="badge badge-info right">6</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/laporan-penjualan')}}" class="nav-link {{ (request()->segment(2) == 'laporan-penjualan') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penjualan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Google Analytics</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Google Trends</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">COMPONENTS</li>
          <li class="nav-item">
            <a href="{{url('admin/about')}}" class="nav-link {{ (request()->segment(2) == 'about') ? 'active' : '' }}">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Logo
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{url('admin/about')}}" class="nav-link {{ (request()->segment(2) == 'about') ? 'active' : '' }}">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Testimoni
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{url('admin/about')}}" class="nav-link {{ (request()->segment(2) == 'about') ? 'active' : '' }}">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                About
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/contact')}}" class="nav-link {{ (request()->segment(2) == 'contact') ? 'active' : '' }}">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Contact
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="starter.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Backgound</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="starter.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pop UP</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="starter.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Media Sosial</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">AUTHENTICATION</li>
         
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Auth
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('akun')}}" class="nav-link {{ (request()->segment(2) == 'akun') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Akun</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('rubah-password')}}" class="nav-link {{ (request()->segment(2) == 'rubah-password') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rubah Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="starter.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Keluar</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>