@extends('layouts.app')
@section('title', '| Boardinghouse')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ $chamber->boardinghouse->name }}</div>
        <div class="card-body">
          <p>deskripsi : {{$chamber->boardinghouse->description}}</p>
          <p>alamat : {{$chamber->boardinghouse->address." ".$chamber->boardinghouse->village->name. ", ".$chamber->boardinghouse->village->district->name . ", " .  $chamber->boardinghouse->village->district->regency->name. ", " . $chamber->boardinghouse->village->district->regency->province->name}}</p>
          @php
          $facilities = str_split($chamber->boardinghouse->facility);
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
          <p>fasilitas lain : {{$chamber->boardinghouse->facility_other}}</p>
          <p>akses : {{$chamber->boardinghouse->access}}</p>
          <p>informasi tambahan : {{$chamber->boardinghouse->information_others}}</p>
          <p>informasi biaya : {{$chamber->boardinghouse->information_cost}}</p>
        </div>
      </div>
      <div class="card">
        <div class="card-header">{{ $chamber->name }}</div>
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
        </div>
      </div>
      <div class="card">
        <div class="card-header">{{ __('Booking Kostan') }}</div>
        <div class="card-body">
          <form method="POST" action="{{ route('transactions.store', $chamber) }}">
            @csrf
            <div class="form-group row">
              <label for="booked_at" class="col-md-4 col-form-label text-md-right">{{ __('Dibook pada :') }}</label>
              <div class="col-md-6">
                <input id="today" type="date" class="form-control{{ $errors->has('booked_at') ? ' is-invalid' : '' }}" name="booked_at" value="{{ old('booked_at') }}" required>
                @if ($errors->has('booked_at'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('booked_at') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label for="booked_for" class="col-md-4 col-form-label text-md-right">{{ __('Book Untuk Berapa Bulan :') }}</label>
              <div class="col-md-6">
                <input id="booked_for" type="number" class="form-control{{ $errors->has('booked_for') ? ' is-invalid' : '' }}" name="booked_for" value="{{ old('booked_for') }}" required>
                @if ($errors->has('booked_for'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('booked_for') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                {{ __('Book Sekarang') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')  
  <script type="text/javascript">
    document.querySelector("#today").valueAsDate = new Date();
  </script>
@endsection