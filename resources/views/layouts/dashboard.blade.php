<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- <meta name="description" content="">
	<meta name="author" content=""> -->
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="icon" href="{{ asset('dashboard-assets/images/favicon.ico')}}">
  {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
  <title>Kostaria @yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('dashboard-assets/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Icons -->
    <link href="{{ asset('dashboard-assets/css/font-awesome.css')}}" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{ asset('dashboard-assets/css/style.css')}}" rel="stylesheet">
    @yield('stylesheets')
</head>
<body>
	<div class="container-fluid" id="wrapper">
		<div class="row">
			<nav class="sidebar col-xs-12 col-sm-4 col-lg-3 col-xl-2">
				<h1 class="site-title"><a href="{{ url('/') }}"><em class="fa fa-rocket"></em> {{ 'Kostaria' }}</a></h1>

				<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><em class="fa fa-bars"></em></a>
				<ul class="nav nav-pills flex-column sidebar-nav">
          @yield('panel')
				</ul>
				<!-- <a href="login.html" class="logout-button"><em class="fa fa-power-off"></em> Signout</a> -->
			</nav>

			<main class="col-xs-12 col-sm-8 col-lg-9 col-xl-10 pt-3 pl-4 ml-auto">
				<header class="page-header row justify-center">
					<div class="col-md-6 col-lg-8" >
						<h1 class="float-left text-center text-md-left">Dashboard</h1>
					</div>

					<div class="dropdown user-dropdown col-md-6 col-lg-4 text-center text-md-right">
						<a class="btn btn-stripped dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						@guest
	          @if (Route::has('register'))
	          @endif
	          @else
						<img src="{{ url('dashboard-assets/images/profile-pic.jpg')}}" alt="profile photo" class="circle float-left profile-photo" width="50" height="auto">
						<div class="username mt-1">
							<h4 class="mb-1">{{ Auth::user()->name }}</h4>
							<h6 class="text-muted">{{ Auth::user()->email }}</h6>
						</div>
						@endguest
						</a>
						<div class="dropdown-menu dropdown-menu-right" style="margin-right: 1.5rem;" aria-labelledby="dropdownMenuLink">
							<a class="dropdown-item" href="#"><em class="fa fa-user-circle mr-1"></em> View Profile</a>
						  <a class="dropdown-item" href="#"><em class="fa fa-sliders mr-1"></em> Preferences</a>
							@auth('admin')
								<a class="dropdown-item" href="{{ route('admin.logout') }}"><em class="fa fa-power-off mr-1"></em> Logout Admin</a>
							@endauth
							@auth('kostariateam')
								<a class="dropdown-item" href="{{ route('kostariateam.logout') }}"><em class="fa fa-power-off mr-1"></em> Logout</a>
							@endauth
						</div>
					</div>
					<div class="clear"></div>

				</header>
				<section class="row">
							@yield('content')
				</section>
			</main>
		</div>
	</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="{{ asset('dashboard-assets/dist/js/bootstrap.min.js')}}"></script>

    <script src="{{ asset('dashboard-assets/js/chart.min.js')}}"></script>
    <script src="{{ asset('dashboard-assets/js/chart-data.js')}}"></script>
    <script src="{{ asset('dashboard-assets/js/easypiechart.js')}}"></script>
    <script src="{{ asset('dashboard-assets/js/easypiechart-data.js')}}"></script>
    <script src="{{ asset('dashboard-assets/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{ asset('dashboard-assets/js/custom.js')}}"></script>

    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    <script>
	    var startCharts = function () {
	                var chart1 = document.getElementById("line-chart").getContext("2d");
	                window.myLine = new Chart(chart1).Line(lineChartData, {
	                responsive: true,
	                scaleLineColor: "rgba(0,0,0,.2)",
	                scaleGridLineColor: "rgba(0,0,0,.05)",
	                scaleFontColor: "#c5c7cc "
	                });
	            };
	        window.setTimeout(startCharts(), 1000);
	</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    @yield('scripts')
	</body>
</html>
