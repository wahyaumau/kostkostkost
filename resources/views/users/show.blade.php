@extends('layouts.app')
@section('title', '| User Profile')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ $user->name }}</div>
        <div class="card-body">
          <p>email : {{$user->email}}</p>
          <p>alamat : {{$user->address." ".$user->village->name. ", ".$user->village->district->name . ", " .  $user->village->district->regency->name. ", " . $user->village->district->regency->province->name}}</p>
          <p>Kampus : {{$user->university->name}}</p>
          <p>akses : {{$user->access}}</p>
          <p>Nomor Telepon : {{$user->phone}}</p>
          <p>Id Line : {{$user->lineId}}</p>
        </div>
        <a href="{{ route('users.showCredentialForm', $edittype='editUserInfo') }}" class="btn btn-warning">Edit User Info</a>
        <a href="{{ route('users.showCredentialForm', $edittype='editCredential') }}" class="btn btn-warning">Edit User Credential</a>
      </div>
      <div class="card">
        <div class="card-header">Kamar yang Sudah Di Tag</div>
        <div class="card-body">
          @foreach($user->chambersTag as $tag)
          <p>{{ $tag->name.', '.$tag->boardinghouse->name }}</p>
          {{-- <p>{{ $tag }}</p>           --}}
          <form action="{{ route('tags.destroy', [$user, $tag]) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-icon-split my-1 btn-sm">
            <span class="icon text-white-50">
              <i class="fas fa-trash"></i>
            </span>
            <span style="color:#ffffff !important;" class="text">Hapus Dari Whislist Saya</span>
            </button>
          </form>
          <a href="{{ route('transactions.showTransactionForm', $tag) }}" class="btn btn-success ml-1">Book Kamar</a>
          <a href="{{ route('boardinghouses.show', $tag->boardinghouse) }}" class="btn btn-success ml-1">Lihat Kamar</a>
          @endforeach
        </div>
      </div>
    </div>
    <div class="card">
        <div class="card-header">Kamar yang Sudah Di Booking</div>
        <div class="card-body">
          @foreach($user->chambersTransaction as $transaction)
          <p>{{ $transaction->name.', '.$transaction->boardinghouse->name }}</p>
          <p>{{ $transaction->pivot->chamber_id }}</p>          
          {{-- <p>{{ $transaction }}</p> --}}
          <a href="{{ route('boardinghouses.show', $transaction->boardinghouse) }}" class="btn btn-success ml-1">Lihat Kamar</a>
          <a href="{{ route('transactions.showPaymentProofUploadForm', $transaction) }}" class="btn btn-success ml-1">Konfirmasi Pembayaran</a>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection