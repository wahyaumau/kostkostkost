@extends('layouts.app')
@section('title', '| Boardinghouse')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ "Anda hendak mengirim bukti pembayaran dp untuk :  ".$bookedChamber->boardinghouse->name ." dengan deskripsi pemesanan : "}}</div>
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
          <form method="POST" action="{{ route('transactions.paymentProofStore', $bookedChamber) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
              <label for="payment_proof" class="col-md-4 col-form-label text-md-right">{{ __('Upload Bukti Pembayaran') }}</label>
              <div class="col-md-6">
                <input id="payment_proof" type="file" class="{{ $errors->has('payment_proof') ? ' is-invalid' : '' }}" name="payment_proof" value="{{ old('payment_proof') }}" autofocus>
                @if ($errors->has('payment_proof'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('payment_proof') }}</strong>
                </span>
                @endif
              </div>
              <button type="submit" class="btn btn-danger btn-icon-split my-1 btn-sm">
              <span class="icon text-white-50">
                <i class="fas fa-trash"></i>
              </span>
              <span style="color:#ffffff !important;" class="text">Upload</span>
              </button>
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