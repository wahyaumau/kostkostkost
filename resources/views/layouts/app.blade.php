<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="keyphrases" content="Info Kost, Cari Kost, Sewa Kost, Kost Murah, Aplikasi Kost, Aplikasi Pencarian Kost, Aplikasi Info Kost, Aplikasi Cari Kost, Kost, Kostaria, Kamar Kost, Kamar Kos, Kostan, Kos, Rumah Kost, Rumah Kos">
    <meta name="classification" content="Business, Rent House, Sewa Kost, Property, Rent Room, Info Kost, Information, Kost, Room, Cari Kost, Kost Murah, Kost Bebas, Application, Mobile Application, Kamar Kost, Kamar Kos, Kostan, Kos, Rumah Kost, Rumah Kos">
    <meta name="keywords" content="kostaria, Info Kost, Cari kost, kost, Kamar Kost, Kamar Kos, Kostan, Kos, Rumah Kost, Rumah Kos">

    <title>Kostaria @yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('dashboard/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

    <!-- Custom styles for this template-->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js"></script>
    <!-- <link rel="stylesheet" href="{{asset('asset/')}}"> -->
    <!-- <link href="{{asset('dashboard/css/sb-admin-2.min.css')}}" rel="stylesheet"> -->

    <style media="screen">
      *{
        font-family: 'Raleway', sans-serif;
      }

      .home-jumbotron{
          background: url("{{asset('img/jumbotron.png')}}") no-repeat center bottom;
          -webkit-background-size: 100%;
          -moz-background-size: 100%;
          -o-background-size: 100%;
          background-size: 100%;
      }

      .items{
        box-shadow: 0 1px 2px rgba(0,0,0,0.15);
        transition: all 0.3s ease-in-out;
      }

      .items:hover {
        border: 1px solid #5e3eb8;
        -webkit-box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        -moz-box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        transform: scale(1.01, 1.01);
        transition: all 0.3s ease-in-out;
      }

      .bg-purple{
        background-color: #49308E;
      }

      .two-col {
        columns: 2;
        -webkit-columns: 2;
        -moz-columns: 2;
      }

      .three-col {
        columns: 3;
        -webkit-columns: 3;
        -moz-columns: 3;
      }

      .btn-purple {
        /* #49308E */
        background-color: #50349d;
        color: white;
      }

      .btn-purple:hover {
        background-color: #342266;
        color: white;
      }
    </style>


    <!-- Other Scripts -->
    @yield('stylesheets')

</head>

<body id="page-top" class="bg-purple">
    <!-- Page Wrapper -->
    <div id="wrapper" >

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-purple">
                  <a class="navbar-brand" href="{{url('/')}}">
                    <b>KOSTARIA.ID</b>
                  </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mr-3">
                      <li class="nav-item">
                        <div class="container d-lg-none d-block">
                          <div class="row">
                            <a class="nav-link active" href="{{url('/')}}"><i class="fab fa-line fa-2x mr-2"></i></a>
                            <a class="nav-link active" href="{{url('/')}}"><i class="fab fa-facebook-square fa-2x mr-2"></i></a>
                            <a class="nav-link active" href="{{url('/')}}"><i class="fab fa-instagram fa-2x mr-2"></i></a>
                          </div>
                        </div>
                        <div class="container d-lg-block d-none">
                          <div class="row">
                            <a class="nav-link active" href="{{url('/')}}"><i class="fab fa-line mr-0"></i></a>
                            <a class="nav-link active" href="{{url('/')}}"><i class="fab fa-facebook-square mr-0"></i></a>
                            <a class="nav-link active" href="{{url('/')}}"><i class="fab fa-instagram mr-0"></i></a>
                            <a class="nav-link active">|</a>
                          </div>
                        </div>
                      </li>
                      <li class="nav-item">
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{url('/')}}">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="{{url('/about')}}">About</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ Request::is('blogs') ? 'active' : '' }}" href="{{route('blogs.index')}}">Blogs</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Beasiswa
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="https://indbeasiswa.com/beasiswa-diploma" target="_blank" >Beasiswa Diploma</a>
                          <a class="dropdown-item" href="https://indbeasiswa.com/beasiswa-s1" target="_blank" >Beasiswa Sarjana</a>
                          <a class="dropdown-item" href="https://indbeasiswa.com/beasiswa-s2" target="_blank" >Beasiswa Master</a>
                          <a class="dropdown-item" href="https://indbeasiswa.com/beasiswa-s3" target="_blank" >Beasiswa Doktor</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="https://www.google.com/search?q=beasiswa+kuliah" target="_blank" >Cari Info Lainnya</a>
                        </div>
                      </li>
                    </ul>
                    <ul class="navbar-nav navbar-right">
                      <!-- Example single danger button -->
                      @auth
                      @else
                      @if (Route::has('login'))
                      <li class="">
                        <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Login
                        </button>
                        <div class="dropdown-menu  dropdown-menu-right">
                          <a class="dropdown-item" href="{{ route('login') }}">Login as User</a>
                          <a class="dropdown-item" href="{{route('kostariateam.login')}}">Login as Admin</a>
                          <div class="dropdown-divider"></div>
                          @if (Route::has('register'))
                          <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                          @endif
                        </div>
                      </li>
                      @endif
                      @endauth
                  </ul>
                  </div>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->

                @if(Request::is('/'))
                <div class="jumbotron jumbotron-fluid mb-0 text-white home-jumbotron bg-purple" >
                  <div class="container">
                    <h1 class="display-4">Selamat Datang</h1>
                    <p class="lead">Sleep tight and start the day!</p>
                  </div>
                </div>
                @endif

                <div class="container-fluid p-5">

                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-purple mt-4">
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

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('dashboard/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('dashboard/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    @yield('scripts')
</body>

</html>
