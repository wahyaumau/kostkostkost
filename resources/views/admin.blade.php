@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-lg-4 mb-4">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Welcome, {{ Auth::user()->name }}! </h6>
      </div>
      <div class="card-body">
        <div class="text-center">
          <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{{asset('dashboard/img/undraw_welcome.svg')}}" alt="">
        </div>
        <p>Hai, {{ Auth::user()->name }}. Selamat datang di dashboard KOSTARIA.</p>
      </div>
      <div class="card-footer">
        <a href="{{route('kostariateam.register')}}" class="btn btn-primary">Register Kostaria Team</a>
        <a href="{{ route('admin.showTransaction') }}" class="btn btn-primary">Transactions</a>
      </div>
    </div>
  </div>
</div>

@endsection
