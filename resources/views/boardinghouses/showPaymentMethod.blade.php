@extends('layouts.app')
@section('title', '| Boardinghouse')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ "Pesanan anda untuk :  ".$chamber->boardinghouse->name ." dengan deskripsi pemesanan : "}}</div>
        <div class="card-body">
          <p>Nama Kostan : {{$chamber->boardinghouse->name}}</p>
          <p>Alamat Kostan : {{$chamber->boardinghouse->address." ".$chamber->boardinghouse->village->name. ", ".$chamber->boardinghouse->village->district->name . ", " .  $chamber->boardinghouse->village->district->regency->name. ", " . $chamber->boardinghouse->village->district->regency->province->name}}</p>          
          <p>informasi biaya : {{$chamber->boardinghouse->information_cost}}</p>
          <p>nama kamar : {{$chamber->name}}</p>
          <p>harga bulanan : {{$chamber->price_monthly}}</p>
          <p>harga tahunan : {{$chamber->price_annual}}</p>
          <p>gender : {{$chamber->gender=="1"? "laki-laki":"perempuan"}}</p>
          <p>ukuran kamar : {{$chamber->chamber_size}}</p>
          @foreach($bookedChambers as $bookedChamber)
          <p>Tanggal Pemesanan : {{ $bookedChamber->pivot->created_at }}</p>
          <p>Waktu Penempatan : {{ $bookedChamber->pivot->rent_start }}</p>
          @endforeach
          <p>Silakan lakukan pembayaran ke bla bla bla bla lalu jika sudah melakukan pembayaran maka upload struk pembayaran</p>
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