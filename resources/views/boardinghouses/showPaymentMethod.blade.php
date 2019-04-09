@extends('layouts.app')
@section('title', '| Boardinghouse')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ "Pesanan anda untuk :  ".$bookedChamber->boardinghouse->name ." dengan deskripsi pemesanan : "}}</div>
        <div class="card-body">
          <p>Nama Kostan : {{$bookedChamber->boardinghouse->name}}</p>
          <p>Alamat Kostan : {{$bookedChamber->boardinghouse->address." ".$bookedChamber->boardinghouse->village->name. ", ".$bookedChamber->boardinghouse->village->district->name . ", " .  $bookedChamber->boardinghouse->village->district->regency->name. ", " . $bookedChamber->boardinghouse->village->district->regency->province->name}}</p>          
          <p>informasi biaya : {{$bookedChamber->boardinghouse->information_cost}}</p>
          <p>nama kamar : {{$bookedChamber->name}}</p>
          <p>harga bulanan : {{$bookedChamber->price_monthly}}</p>
          <p>harga tahunan : {{$bookedChamber->price_annual}}</p>
          <p>gender : {{$bookedChamber->gender=="1"? "laki-laki":"perempuan"}}</p>
          <p>ukuran kamar : {{$bookedChamber->chamber_size}}</p>          
          <p>Tanggal Pemesanan : {{ $bookedChamber->pivot->created_at }}</p>
          <p>Waktu Penempatan : {{ $bookedChamber->pivot->rent_start }}</p>          
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