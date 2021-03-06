@extends('layouts.kostariateam')
@section('title', '| MOU List')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <h3>Daftar MOU</h3>
    </div>
    <div class="col-md-4">
      <a href="{{route('mou.create')}}" class="btn btn-success">Tambah MOU</a>
    </div>
  </div>
  @if (\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
    </div><br />
    @elseif (\Session::has('fail'))
    <div class="alert alert-danger">
        <p>{{ \Session::get('fail') }}</p>
    </div><br />
    @endif
  <div class="box">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Kostaria Team</th>
          <th>Pemilik Kostan</th>
          <th>Ditandatangani di</th>
          <th>Ditandangani Pada</th>
          <th>Berlaku Sampai</th>
          <th>action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($listMou as $mou)
        <tr>
          <td>{{$mou->id}}</td>
          <td>{{$mou->kostariateam->name}}</td>
          <td>{{$mou->owner->name}}</td>
          <td>{{$mou->regency->name}}</td>
          <td>{{$mou->signed_at}}</td>
          <td>{{$mou->ended_at}}</td>
          <td><a href="{{ route('boardinghouses.create', $mou->owner->id)}}" class="btn btn-primary">Tambah Kostan</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection