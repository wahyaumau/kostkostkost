<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Kostaria</title>

    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
<body>
  <!-- Hero(extended) navbar -->
	<!-- <div class="navbar navbar--extended">
		<nav class="nav__mobile"></nav>
		<div class="container">
			<div class="navbar__inner">
				<a href="index.html" class="navbar__logo">Logo</a>
				<nav class="navbar__menu">
					<ul>
						<li><a href="#">Option</a></li>
						<li><a href="#">Option 2</a></li>
					</ul>
				</nav>
				<div class="navbar__menu-mob"><a href="" id='toggle'><svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z" class=""></path></svg></a></div>
			</div>
		</div>
	</div> -->

  <!-- Hero unit -->
<!-- 	<div class="hero">
		<div class="hero__overlay hero__overlay--gradient"></div>
		<div class="hero__mask"></div>
		<div class="hero__inner">
			<div class="container">
				<div class="hero__content">
					<div class="hero__content__inner" id='navConverter'>
						<h1 class="hero__title">A production-ready theme for your projects</h1>
						<p class="hero__text">Evie is an MIT licensed template bundled with a minimal style guide to build websites faster. It is extemely lightweight, customizable and works perfectly on modern browsers.</p>
						<a href="#" class="button button__accent">Download Evie</a>
						<a href="#" class="button hero__button">Learn more</a>
            <form method="POST" action="{{ route('boardinghouses.search') }}">
              @csrf
              <div class="form-group">
                <div class="hero__text">
                  <label for="id_label_single">
                    Pilih Kampus
                  </label>
                  <select class="select2 form-control" name="university">
                    <option>Pilih Kampus</option>
                  </select>
                </div>
                <div class="">
                  <select class="select2 form-control" name="regency">
                    <option value="">Pilih Kota</option>
                  </select>
                </div>
                <div class="col-sm-12 col-md-4">
                  <div class="form-group row mb-0">
                      <div class="col-md-12 pull-right">
                          <button type="submit" class="btn btn-primary">
                          {{ __('Search') }}
                          </button>
                      </div>
                  </div>
                </div>
              </div>
            </form>
					</div>
				</div>
			</div>
		</div>
	</div> -->

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
  <!-- <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
  <div class="card-header">Header</div>
  <div class="card-body">
    <h5 class="card-title">Primary card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div> -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
          @if(isset($listBoardingHouse))
          @foreach($listBoardingHouse as $boardinghouse)
            <div class="card">
              <div class="card-header">{{ $boardinghouse->name }}</div>
                <div class="card-body">
                    <p>deskripsi : {{$boardinghouse->description}}</p>
                    <p>alamat : {{$boardinghouse->address." ".$boardinghouse->village->name. ", ".$boardinghouse->village->district->name . ", " .  $boardinghouse->village->district->regency->name. ", " . $boardinghouse->village->district->regency->province->name}}</p>
                    @php
                      $facilities = str_split($boardinghouse->facility);
                      $facilities_def = array('dapur', 'kompor', 'lpg', 'parkir motor', 'parkir mobil', 'jemuran', 'listrik', 'air', 'layanan kebersihan', 'pajak dan retribusi', 'wi-fi');
                      for ($i=0; $i < count($facilities); $i++) {
                      if ($facilities[$i] == false) {
                        unset($facilities_def[$i]);
                      }
                    }
                    @endphp
                    <p>fasilitas :
                    @foreach($facilities_def as $facility)
                        {{$facility.", "}}
                    @endforeach</p>
                    <p>fasilitas lain : {{$boardinghouse->facility_other}}</p>
                    <p>akses : {{$boardinghouse->access}}</p>
                    <p>informasi tambahan : {{$boardinghouse->information_others}}</p>
                    <p>informasi biaya : {{$boardinghouse->information_cost}}</p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ $boardinghouse->name. " memiliki ". $boardinghouse->chamber->count(). " tipe kamar" }}</div>
                @foreach ($boardinghouse->chamber as $chamber)
                <div class="card-body">
                    <p>nama kamar : {{$chamber->name}}</p>
                    <p>harga bulanan : {{$chamber->price_monthly}}</p>
                    <p>harga tahunan : {{$chamber->price_annual}}</p>
                    <p>gender : {{$chamber->gender=="1"? "laki-laki":"perempuan"}}</p>
                    <p>ukuran kamar : {{$chamber->chamber_size}}</p>
                    @php
                    $facilities = str_split($chamber->chamber_facility);
                    $facilities_def = array('kamar mandi dalam', 'ranjang', 'kasur', 'meja belajar', 'lemari', 'water heater', 'AC');
                    for ($i=0; $i < count($facilities); $i++) {
                    if ($facilities[$i] == false) {
                    unset($facilities_def[$i]);
                    }
                    }
                    @endphp
                    <p>fasilitas kamar :
                        @foreach($facilities_def as $facility)
                        {{$facility. ", "}}
                        @endforeach
                    </p>
                    <button>Booking Kamar Ini</button>
                </div>
                @endforeach
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
  <!-- Footer -->
  <!-- <footer class="footer bg-light">
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
</body> -->
  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/select2.min.js') }}"></script>
  <script type="text/javascript">
    $('.select2-single').select2();
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('select[name="university"]').select2({
        ajax: {
            url: '/universities/getUniversities',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        minimumInputLength: 1,
        placeholder: function(){
            $(this).data('placeholder');
        },

        templateResult: ResultTemplater,
        templateSelection: SelectionTemplater
    });

    $('select[name="regency"]').select2({
        ajax: {
            url: '/regencies/getRegencies',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        minimumInputLength: 1,
        placeholder: function(){
            $(this).data('placeholder');
        },
        templateResult: ResultTemplater,
        templateSelection: SelectionTemplater
    });

    function ResultTemplater(item) {
        return item.name;
    }
    function SelectionTemplater(item) {
        if(typeof item.name !== "undefined") {
            return ResultTemplater(item);
        }
        return item.name;
    }

    });
  </script>
</html>
