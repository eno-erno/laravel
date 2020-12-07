@include('backend/admin/components.head')
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    @include('backend/admin/components.nav')

    @include('backend/admin/components.nav_left')

  <!-- Content Wrapper. Contains page content -->
        @yield('content-pages')
  <!-- /.content-wrapper -->


  @include('backend/admin/components.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@include('backend/admin/components.js')
