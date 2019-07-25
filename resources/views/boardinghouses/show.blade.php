@extends('layouts.app')
@section('title', '| Boardinghouse')

@section('stylesheets')
<style media="screen">
  .map-container{
    overflow:hidden;
    padding-bottom:56.25%;
    position:relative;
    height:0;
  }
  .map-container iframe{
    left:0;
    top:0;
    height:100%;
    width:100%;
    position:absolute;
  }
</style>
@endsection

@section('content')
<div class="row">
  @if (\Session::has('success'))
  <div class="alert alert-success">
    <p>{{ \Session::get('success') }}</p>
  </div><br />
  @elseif (\Session::has('fail'))
  <div class="alert alert-danger">
    <p>{{ \Session::get('fail') }}</p>
  </div><br />
  @endif

  <div class="col-md-12">
    <div class="row">
      <a class="nav-link active" href="https://social-plugins.line.me/lineit/share?url={{url()->full()}}&title=Kostan%20{{$boardinghouse->name}}%20{{$boardinghouse->village->district->regency->name}}%20%7CKostaria" target="_blank"><i class="fab fa-line"></i></a>
      <a class="nav-link active" href="https://facebook.com/sharer/sharer.php?u={{url()->full()}}" target="_blank"><i class="fab fa-facebook-square"></i></a>
      <a class="nav-link active" href="https://twitter.com/share?url={{url()->full()}}&text=Kostan%20{{$boardinghouse->name}}%20{{$boardinghouse->village->district->regency->name}}%20%7C%20Kostaria&hashtags=Kostaria" target="_blank"><i class="fab fa-twitter"></i></a> <!-- &via=Kostaria {{$boardinghouse->name}}%2Cs-->
      <a class="nav-link active" href="https://plus.google.com/share?url={{url()->full()}}" target="_blank"><i class="fab fa-gplus"></i></a>
    </div>
  </div>

  <div class="col-md-12">
    <div class="card mb-2">
      <div class="card-body">
        <div class="row">
          <div class="col-md-8">
            <h3> <b>{{ strtoupper($boardinghouse->name) }}</b> </h3>
            <p>{{$boardinghouse->address." ".$boardinghouse->village->name. ", ".$boardinghouse->village->district->name . ", " .  $boardinghouse->village->district->regency->name. ", " . $boardinghouse->village->district->regency->province->name}}</p>
            <p>Memiliki {{$boardinghouse->chamber->count()}} Tipe Kamar</p>
            <hr>
            <div class="row">
              <div class="col-md-6">
                <p>
                  <dt>Deskripsi : </dt>
                  {{$boardinghouse->description}}
                </p>
                @php
                $facilities = str_split($boardinghouse->facility);
                $facilities_def = array('Dapur', 'Kompor', 'Elpiji', 'Parkir Motor', 'Parkir Mobil', 'Jemuran', 'Listril', 'Air', 'Kebersihan', 'Pajak dan Retribusi', 'Wifi');
                for ($i=0; $i < count($facilities); $i++) {
                  if ($facilities[$i] == false) {
                    unset($facilities_def[$i]);
                  }
                }
                @endphp
                <p>
                  <dt>Fasilitas : </dt>
                  <ul>
                    @foreach($facilities_def as $facility)
                    <li>
                      {{$facility}}
                    </li>
                    @endforeach
                  </ul>
                </p>
              </div>
              <div class="col-md-6">
                <p>
                  <dt>Fasilita Lainnya :</dt>
                  {{$boardinghouse->facility_other}}
                </p>
                <p>
                  <dt>Akses Lokasi :</dt>
                  {{$boardinghouse->access}}
                </p>
                <p>
                  <dt>Informasi Tambahan :</dt>
                  {{$boardinghouse->information_others}}
                </p>
                <!-- <p>
                  <dt>Informasi Biaya :</dt>
                  {{$boardinghouse->information_cost}}
                </p> -->
              </div>
            </div>
          </div>

          <div class="col-md-4 row">
            <div class="col-md-12 mb-4">
              <div align="center" class="embed-responsive embed-responsive-16by9">
                <video id="video-kost" controls loop class="embed-responsive-item" poster="{{asset('img/kostaria.png')}}" style="border-radius:10px;">
                  <source src="{{url('videos/'.$boardinghouse->video)}}" type="video/mp4">
                </video>
              </div>
            </div>

            <div class="col-md-12 mb-4">
              <div id="map-container-google-1" class="z-depth-1-half map-container">
                <iframe src="https://maps.google.com/maps?q={{$boardinghouse->address." ".$boardinghouse->village->name. ", ".$boardinghouse->village->district->name . ", " .  $boardinghouse->village->district->regency->name. ", " . $boardinghouse->village->district->regency->province->name}}&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  @foreach ($boardinghouse->chamber as $chamber)
  <div class="col-lg-3">
    <div class="card shadow mb-4">
      <div class="card-body">
        <p class="font-weight-bold text-primary">{{strtoupper($chamber->name)}}</p>
        <hr>
        <p>@if($chamber->gender=="1")<i class="fas fa-male"></i>@else<i class="fas fa-female"></i>@endif Untuk {{$chamber->gender=="1"? "Laki-laki":"Perempuan"}}</p>

        @if($chamber->price_monthly > 0)
          <p><dt>Harga Bulanan :</dt> Rp {{$chamber->price_monthly}}</p>
        @endif
        @if($chamber->price_annual > 0)
          <p><dt>Harga Tahunan :</dt> Rp {{$chamber->price_annual}}</p>
        @endif
        <p><dt>Ukuran Kamar :</dt> {{$chamber->chamber_size}}</p>
        @php
        $facilities = str_split($chamber->chamber_facility);
        $facilities_def = array('kamar mandi dalam', 'ranjang', 'kasur', 'meja belajar', 'lemari', 'water heater', 'AC');
        for ($i=0; $i < count($facilities); $i++) {
          if ($facilities[$i] == false) {
            unset($facilities_def[$i]);
          }
        }
        @endphp
        <p>
          <dt>Fasilitas Kamar : </dt>
          <ul>
            @foreach($facilities_def as $facility)
            <li>{{$facility}}</li>
            @endforeach
          </ul>
        </p>
        <p>Kostan ini telah dibooking sebanyak{{ $chamber->usersTransaction->count() }}</p>
        <p>Kostan ini telah ditag sebanyak{{ $chamber->usersTag->count() }}</p>
      </div>
      <div class="card-footer">
        <div class="row ml-0">
          <form action="{{ route('tags.store', $chamber)}}" method="post">
            @csrf
            <button class="btn btn-danger mx-auto" type="submit"><span class="fas fa-flag"></span></button>
          </form>
          <a href="{{ route('transactions.showTransactionForm', $chamber) }}" class="btn btn-success ml-1">Book Kamar</a>
        </div>
      </div>
    </div>
  </div>
  @endforeach

</div>
@endsection
@section('scripts')
@endsection
