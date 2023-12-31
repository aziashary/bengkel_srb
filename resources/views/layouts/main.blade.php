<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom fonts for this template-->
    <link href="{{ asset ('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/css/bootstrap-select.min.css">

    <!-- Custom styles for this template-->
    <link href="{{ asset ('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <style>
      .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #858696;
        line-height: 28px;
        padding-left: 12px !important;
      }

      .select2-selection--single {
        height: 38px !important;
      }

      .select2-container .select2-selection--single {
        padding-top: 4px;
      }

      .select2-selection__arrow {
        padding-top: 4px;
      }

      .select2-container--default .select2-selection--single .select2-selection__arrow {
        top: 4px;
      }
    </style>
  </head>

  <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
       

        <a class="sidebar-brand d-flex align-items-center justify-content-center " href="#">
          <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-wrench"></i>
          </div>
          <div class="sidebar-brand-text mx-3">
            @if( Auth::user()->jabatan == 1 )
              Kepala Bengkel
            @elseif( Auth::user()->jabatan == 2 )
              Sparepart
            @elseif( Auth::user()->jabatan == 3 )
              Management
            @elseif( Auth::user()->jabatan == 4 )
              Kasir
            @endif
          </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        @if( Auth::user()->jabatan == 1 || Auth::user()->jabatan == 2 )
        <!-- Heading -->
        <div class="sidebar-heading text-white" >
          Data Barang
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-newspaper"></i>
              <span>Barang</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('barang.index') }}">Barang</a>
                <a class="collapse-item" href="{{ route('barang.create') }}">Tambah Barang</a>
              </div>
            </div>
          </li>
        
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsekategori" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fab fa-buromobelexperte"></i>
              <span>Kategori</span>
            </a>
            <div id="collapsekategori" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('kategori.index') }}">Kategori</a>
                <a class="collapse-item" href="{{ route('kategori.create') }}">Tambah Kategori</a>
              </div>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsestok" aria-expanded="true" aria-controls="collapseUtilities">
              <i class="fas fa-box"></i>
              <span>Stok</span>
            </a>
            <div id="collapsestok" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('stokmasuk.index')}}">Stok Terbaru</a>
                <a class="collapse-item" href="{{ route('stokmasuk.create')}}">Tambah Stok</a>
              </div>
            </div>
          </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
        @endif
        
        @if( Auth::user()->jabatan == 1 || Auth::user()->jabatan == 2 || Auth::user()->jabatan == 4 )
        <!-- Heading -->
        <div class="sidebar-heading text-white" >
          Transaksi
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseworkorder" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-envelope-open-text"></i>
            <span>Work Order</span>
          </a>
          <div id="collapseworkorder" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="{{ route('workorder.create') }}">Tambah Work Order</a>
              <a class="collapse-item" href="{{ route('workorder.index') }}">Data Work Order</a>
            </div>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseinvoice" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-envelope-open-text"></i>
            <span>Invoice</span>
          </a>
          <div id="collapseinvoice" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="{{ route('invoice.select')}}">Tambah Invoice</a>
              <a class="collapse-item" href="{{ route('invoice.index')}}">Data Invoice</a>
            </div>
          </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
        @endif

        <!-- Heading -->
        <div class="sidebar-heading text-white" >
          Laporan
        </div>
        
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsetransaksi" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-envelope-open-text"></i>
            <span>Transaksi</span>
          </a>
          <div id="collapsetransaksi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="cards.html">Riwayat Work Order</a>
              <a class="collapse-item" href="buttons.html">Riwayat Invoice</a>
            </div>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapselapstok" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-box"></i>
            <span>Stok</span>
          </a>
          <div id="collapselapstok" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="{{ route('stokmasuk.index') }}">Laporan Stok Masuk</a>
              <a class="collapse-item" href="{{ route('stokkeluar.index') }}">Laporan Stok Keluar</a>
            </div>
          </div>
        </li>

        @if( Auth::user()->jabatan != 2 )
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsekeuangan" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-chart-bar"></i>
              <span>Keuangan</span>
            </a>
            <div id="collapsekeuangan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="cards.html">Laporan Keuangan</a>
                <a class="collapse-item" href="buttons.html">Laporan Pajak</a>
              </div>
            </div>
          </li>
        @endif
          
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

      </ul>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->
          
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

              <!-- Nav Item - Search Dropdown (Visible Only XS) -->
              
                <!-- Dropdown - Messages -->
                

              <div class="topbar-divider d-none d-sm-block"></div>
              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                  <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <!-- <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                  </a>
                  <div class="dropdown-divider"></div> -->
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>
                </div>
                </li>

            </ul>

          </nav>
          <!-- End of Topbar -->

          @include('alert.alert')

          <!-- Begin Page Content -->
          @yield('content')
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; PT. Sarana Rezeki Bersama</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">Logout</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
          </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset ('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset ('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset ('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset ('assets/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset ('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset ('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset ('assets/js/demo/datatables-demo.js') }}"></script>

    <!-- Page level url  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <!-- script tambahan -->
    

    <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/js/i18n/defaults-*.min.js"></script>
    
    <!-- script select 2 -->

    @yield('js')

  </body>
</html>
