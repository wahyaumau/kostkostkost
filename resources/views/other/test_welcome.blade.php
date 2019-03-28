@extends('layouts.app')

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Kostaria</title>


  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Fonts -->
  {!! Html::style('https://fonts.googleapis.com/css?family=Nunito:200,600') !!}
  {!! Html::style('https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic') !!}

  <!-- Custom styles for this template -->
  {!! Html::style('css/landing-page.min.css') !!}
  {!! Html::style('vendor/simple-line-icons/css/simple-line-icons.css') !!}
  {!! Html::style('vendor/fontawesome-free/css/all.min.css') !!}
  {!! Html::style('vendor/simple-line-icons/css/simple-line-icons.css') !!}

</head>

<body>
@section('content')
  <!-- <div class="flex-center position-ref full-height">
          @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('kostariateam.login') }}">Team Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            </div>
        </div>-->
  <!-- Navigation -->
  <!-- <nav class='navbar navbar-inverse navbar-fixed-top sticky' role='navigation'>
    <div class="container">
      <a class="navbar-brand" href="/">Kostaria</a>
      <div>
        <a class="btn btn-success" href="{{ route('login') }}">Login</a>
        <a class="btn btn-primary" href="{{ route('kostariateam.login') }}">Team Login</a>
      </div>
    </div>
  </nav> -->

  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">Dapatkan info kost murah, kost harian, kost bebas, dan info kosan lainnya di Kostaria!</h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form>
            <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0">
                <input type="email" class="form-control form-control-lg" placeholder="Kostan dekat ...">
              </div>
              <div class="col-12 col-md-3">
                <button type="submit" class="btn btn-block btn-lg btn-primary">Cari</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>

  <!-- Icons Grid -->
  <!-- <section class="features-icons bg-light text-center">
          <div class="container">
            <div class="row">
              <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                  <div class="features-icons-icon d-flex">
                    <i class="icon-screen-desktop m-auto text-primary"></i>
                  </div>
                  <h3>Fully Responsive</h3>
                  <p class="lead mb-0">This theme will look great on any device, no matter the size!</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                  <div class="features-icons-icon d-flex">
                    <i class="icon-layers m-auto text-primary"></i>
                  </div>
                  <h3>Bootstrap 4 Ready</h3>
                  <p class="lead mb-0">Featuring the latest build of the new Bootstrap 4 framework!</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                  <div class="features-icons-icon d-flex">
                    <i class="icon-check m-auto text-primary"></i>
                  </div>
                  <h3>Easy to Use</h3>
                  <p class="lead mb-0">Ready to use with your own content, or customize the source files!</p>
                </div>
              </div>
            </div>
          </div>
        </section> -->

  <!-- Image Showcases -->
  <!-- <section class="showcase">
          <div class="container-fluid p-0">
            <div class="row no-gutters">

              <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/bg-showcase-1.jpg');"></div>
              <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                <h2>Fully Responsive Design</h2>
                <p class="lead mb-0">When you use a theme created by Start Bootstrap, you know that the theme will look great on any device, whether it's a phone, tablet, or desktop the page will behave responsively!</p>
              </div>
            </div>
            <div class="row no-gutters">
              <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/bg-showcase-2.jpg');"></div>
              <div class="col-lg-6 my-auto showcase-text">
                <h2>Updated For Bootstrap 4</h2>
                <p class="lead mb-0">Newly improved, and full of great utility classes, Bootstrap 4 is leading the way in mobile responsive web development! All of the themes on Start Bootstrap are now using Bootstrap 4!</p>
              </div>
            </div>
            <div class="row no-gutters">
              <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/bg-showcase-3.jpg');"></div>
              <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                <h2>Easy to Use &amp; Customize</h2>
                <p class="lead mb-0">Landing Page is just HTML and CSS with a splash of SCSS for users who demand some deeper customization options. Out of the box, just add your content and images, and your new landing page will be ready to go!</p>
              </div>
            </div>
          </div>
        </section> -->

  <!-- Testimonials -->
  <!-- <section class="testimonials text-center bg-light">
          <div class="container">
            <h2 class="mb-5">What people are saying...</h2>
            <div class="row">
              <div class="col-lg-4">
                <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                  <img class="img-fluid rounded-circle mb-3" src="img/testimonials-1.jpg" alt="">
                  <h5>Margaret E.</h5>
                  <p class="font-weight-light mb-0">"This is fantastic! Thanks so much guys!"</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                  <img class="img-fluid rounded-circle mb-3" src="img/testimonials-2.jpg" alt="">
                  <h5>Fred S.</h5>
                  <p class="font-weight-light mb-0">"Bootstrap is amazing. I've been using it to create lots of super nice landing pages."</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                  <img class="img-fluid rounded-circle mb-3" src="img/testimonials-3.jpg" alt="">
                  <h5>Sarah W.</h5>
                  <p class="font-weight-light mb-0">"Thanks so much for making these free resources available to us!"</p>
                </div>
              </div>
            </div>
          </div>
        </section> -->

  <!-- Call to Action -->
  <!-- <section class="call-to-action text-white text-center">
          <div class="overlay"></div>
          <div class="container">
            <div class="row">
              <div class="col-xl-9 mx-auto">
                <h2 class="mb-4">Ready to get started? Sign up now!</h2>
              </div>
              <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                <form>
                  <div class="form-row">
                    <div class="col-12 col-md-9 mb-2 mb-md-0">
                      <input type="email" class="form-control form-control-lg" placeholder="Enter your email...">
                    </div>
                    <div class="col-12 col-md-3">
                      <button type="submit" class="btn btn-block btn-lg btn-primary">Sign up!</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section> -->

  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="#">About</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Contact</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
          </ul>
          <p class="text-muted small mb-4 mb-lg-0">&copy; kostaria.id 2019. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-whatsapp fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
@endsection

  <!-- Bootstrap core JavaScript -->
  {!! Html::script('vendor/jquery/jquery.min.js') !!}
  {!! Html::script('vendor/bootstrap/js/bootstrap.bundle.min.js') !!}
</body>

</html>
