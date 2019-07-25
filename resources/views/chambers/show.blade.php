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
  {{-- @if (\Session::has('success'))
  <div class="alert alert-success">
    <p>{{ \Session::get('success') }}</p>
  </div><br />
  @elseif (\Session::has('fail'))
  <div class="alert alert-danger">
    <p>{{ \Session::get('fail') }}</p>
  </div><br />
  @endif --}}  

  <div class="col-lg-6">
    <div class="card shadow border-bottom-primary mb-4">
      <!-- <div class="card-header py-3">
      </div> -->
      <div class="card-body">
        <div class="row pl-4">
          <h3 class="my-4 ml-3 font-weight-bold text-primary">{{ strtoupper($chamber->boardinghouse->name) }}</h3>
          <br>
          <p>{{$chamber->boardinghouse->address." ".$chamber->boardinghouse->village->name. ", ".$chamber->boardinghouse->village->district->name . ", " .  $chamber->boardinghouse->village->district->regency->name. ", " . $chamber->boardinghouse->village->district->regency->province->name}}</p>
        </div>
      </div>
    </div>

      <div class="col-xl-6">
        <div class="card shadow h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Terverivikasi</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">OK</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-check fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="col-lg-6">
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <p>
              <dt>Deskripsi : </dt>
              {{$chamber->boardinghouse->description}}
            </p>
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
              <dt>Harga per bulan :</dt>
              {{$chamber->price_monthly}}
            </p>
            <p>
              <dt>Harga per tahun :</dt>
              {{$chamber->price_annual}}
            </p>
            <p>
              <dt>Jenis Kelamin :</dt>
              {{$chamber->gender=='1'? 'Laki-laki':'Perempuan'}}
            </p>
            <p>
              <dt>Ukuran Kamar :</dt>
              {{$chamber->chamber_size}}
            </p>
          </div>
        </div>
      </div>
    </div>
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

</div>
@endsection
@section('scripts')
@endsection
