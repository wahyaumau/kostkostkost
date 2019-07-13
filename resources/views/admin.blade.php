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
        <a href="{{ route('categories.index') }}" class="btn btn-primary">Categories</a>
        <a href="{{ route('posts.index') }}" class="btn btn-primary">Posts</a>
        <a href="{{ route('api.universities.get_universities') }}" class="btn btn-primary">Tes API</a>
      </div>
      <div class="card-footer">
        <a href="{{route('users.export')}}" class="btn btn-primary">Export User Data</a>
        <a href="{{route('boardinghouses.export')}}" class="btn btn-primary">Export boardinghouses Data</a>
        <a href="{{route('chambers.export')}}" class="btn btn-primary">Export chambers Data</a>
        <a href="{{route('mous.export')}}" class="btn btn-primary">Export mous Data</a>
        <a href="{{route('owners.export')}}" class="btn btn-primary">Export owners Data</a>
        <a href="{{route('provinces.export')}}" class="btn btn-primary">Export provinces Data</a>
        <a href="{{route('regencies.export')}}" class="btn btn-primary">Export regencies Data</a>
        <a href="{{route('districts.export')}}" class="btn btn-primary">Export districts Data</a>
        <a href="{{route('villages.export')}}" class="btn btn-primary">Export villages Data
        </a>
        <a href="{{route('universities.export')}}" class="btn btn-primary">Export universities Data</a>
        <a href="{{route('kostariateams.export')}}" class="btn btn-primary">Export kostariateams Data</a>
      </div>
    </div>
  </div>
</div>

@endsection
