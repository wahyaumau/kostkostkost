<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kostaria @yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('dashboard/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Other Scripts -->
    @yield('stylesheets')

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper" >

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand-lg navbar-light bg-white shadow mb-4">
                  <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{asset('img/kostaria.png')}}" width="70" height="70" class="d-inline-block align-top" alt="">
                  </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item">
                        <a class="nav-link" href="#">KWM</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Beasiswa
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="https://indbeasiswa.com/beasiswa-diploma" target="_blank">Beasiswa Diploma</a>
                          <a class="dropdown-item" href="https://indbeasiswa.com/beasiswa-s1" target="_blank">Beasiswa Sarjana</a>
                          <a class="dropdown-item" href="https://indbeasiswa.com/beasiswa-s2" target="_blank">Beasiswa Master</a>
                          <a class="dropdown-item" href="https://indbeasiswa.com/beasiswa-s3" target="_blank">Beasiswa Doktor</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="https://www.google.com/search?q=beasiswa+kuliah" target="_blank">Cari Info Lainnya</a>
                        </div>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{route('kostariateam.login')}}">Kostaria Teams</a>
                      </li>
                    </ul>
                    <ul class="navbar-nav navbar-right">
                    @if (Route::has('login'))

                    @auth
                    @else
                    <li class="nav-item">
                      <a class="btn btn-outline-primary m-1 mb-2" href="{{ route('login') }}">Login</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                      <a class="btn btn-primary m-1 mb-2" href="{{ route('register') }}">Register</a>
                    </li>
                    @endif
                    @endauth

                    @endif
                  </ul>
                    <!-- <form class="form-inline my-2 my-lg-0">
                      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success my-2 my-sm-0">Search</button>
                    </form> -->
                  </div>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white mt-4">
                <div class="container mx-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; KOSTARIA.ID 2019</span>
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
    <!-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pastikan tidak ada tugas yang terlewat dan tekan tombol 'Logout' untuk keluar. Terima kasih.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('dashboard/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('dashboard/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('dashboard/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('dashboard/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('dashboard/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('dashboard/js/demo/chart-pie-demo.js')}}"></script>

    @yield('scripts')
</body>

</html>
