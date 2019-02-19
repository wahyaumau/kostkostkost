<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" href="assets/img/core-img/logo.png">

    <!-- Core Stylesheet -->
    <link href="assets/style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="assets/css/responsive/responsive.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="form-assets/css/montserrat-font.css">
  	<link rel="stylesheet" type="text/css" href="form-assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
  	<!-- Main Style Css -->
      <link rel="stylesheet" href="form-assets/css/style.css"/>

</head>
<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="dorne-load"></div>
    </div>

    <!-- ***** Search Form Area ***** -->
    <div class="dorne-search-form d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-close-btn" id="closeBtn">
                        <i class="pe-7s-close-circle" aria-hidden="true"></i>
                    </div>
                    <form action="#" method="get">
                        <input type="search" name="caviarSearch" id="search" placeholder="Cari nama kost atau alamat ...">
                        <input type="submit" class="d-none" value="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header_area" id="header">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <nav class="h-100 navbar navbar-expand-lg">
                        <a class="navbar-brand" href="index.html"><img src="assets/img/core-img/logo.png" alt=""></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#dorneNav" aria-controls="dorneNav" aria-expanded="false" aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
                        <!-- Nav -->
                        <div class="collapse navbar-collapse" id="dorneNav">
                            <ul class="navbar-nav mr-auto" id="dorneMenu">
                                <li class="nav-item active">
                                    <a class="nav-link" href="/">Beranda <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mahasiswa <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/beasiswa">Beasiswa</a>
                                        <a class="dropdown-item" href="/lomba">Lomba</a>
                                        <a class="dropdown-item" href="/event">Event</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Safari <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                        <a class="dropdown-item" href="/safari">Safari Kost</a>
                                        <a class="dropdown-item" href="#">Tag</a>
                                        <a class="dropdown-item" href="#">Book</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/contact">Contact</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/about">About</a>
                                </li>
                            </ul>
                            <!-- Search btn -->
                            <!-- <div class="dorne-search-btn">
                                <a id="search-btn" href="#"><i class="fa fa-search" aria-hidden="true"></i> Cari</a>
                            </div> -->
                            <!-- Signin btn -->
                            <div class="dorne-signin-btn">
                                <a href="#"><b>Sign in</b>  /  Register</a>
                            </div>
                            <!-- Add listings btn -->
                            <!-- <div class="dorne-add-listings-btn">
                                <a href="#" class="btn dorne-btn">Sing In</a>
                            </div> -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    @yield('content')

    <!-- ****** Footer Area Start ****** -->
    <footer class="dorne-footer-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-md-flex align-items-center justify-content-between">
                    <div class="footer-text">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                    <div class="footer-social-btns">
                        <a href="https://kostaria.id/url/ig"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href="https://kostaria.id/url/wa"><i class="fa fa-whatsapp" aria-haspopup="true"></i></a>
                        <a href="https://kostaria.id/url/line"><i class="fa fa-line" aria-haspopup="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ****** Footer Area End ****** -->

    <!-- jQuery-2.2.4 js -->
    <script src="assets/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="assets/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap-4 js -->
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="assets/js/others/plugins.js"></script>
    <!-- Active JS -->
    <script src="assets/js/active.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDk9KNSL1jTv4MY9Pza6w8DJkpI_nHyCnk"></script>
    <script src="assets/js/google-map/map-active.js"></script>
</body>

</html>
