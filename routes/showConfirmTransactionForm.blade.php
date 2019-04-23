@extends('layouts.app')
@section('title', '| User Profile')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
      @elseif (\Session::has('fail'))
      <div class="alert alert-danger">
        <p>{{ \Session::get('fail') }}</p>
      </div><br />
      @endif
      <div class="card">
        <div class="card-header">Data User</div>
        <div class="card-body">
          <p>Nama User : {{ $user->name }}</p>
          <p>email : {{$user->email}}</p>
          <p>alamat : {{$user->address." ".$user->village->name. ", ".$user->village->district->name . ", " .  $user->village->district->regency->name. ", " . $user->village->district->regency->province->name}}</p>
          <p>Kampus : {{$user->university->name}}</p>
          <p>Nomor Telepon : {{$user->phone}}</p>
          <p>Id Line : {{$user->lineId}}</p>
        </div>
      </div>
      <div class="card">
        <div class="card-header">Data Kamar</div>
        <div class="card-body">
          <p>Kostan :: {{ $bookedChamber->boardinghouse->name }}</p>
          <p>Kamar : {{$bookedChamber->name}}</p>
          <p>alamat : {{$bookedChamber->boardinghouse->address." ".$bookedChamber->boardinghouse->village->name. ", ".$bookedChamber->boardinghouse->village->district->name . ", " .  $bookedChamber->boardinghouse->village->district->regency->name. ", " . $bookedChamber->boardinghouse->village->district->regency->province->name}}</p>
          <p>Pemilik Kostan : {{ $bookedChamber->boardinghouse->owner->name }}</p>
          <p>Nomor telepon pemilik kostan : {{ $bookedChamber->boardinghouse->owner->phone }}</p>
          <p>Tanggal booking : {{ $bookedChamber->pivot->created_at }}</p>
          <p>Mulai penempatan : {{ $bookedChamber->pivot->rent_start }}</p>
          <p>Jatuh tempo : {{ $bookedChamber->pivot->rent_due }}</p>
          <p>Bukti pembayaran : {{ $bookedChamber->pivot->payment_proof }}</p>
          <form action="{{ route('admin.confirmTransaction', [$user->id, $bookedChamber->id])}}" method="post">
            @csrf
            <button class="btn btn-success" type="submit">Konfirmasi Pembayaran</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection