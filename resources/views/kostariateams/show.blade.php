@extends('layouts.app')
@section('title', '| User Profile')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
    </div><br />
    @elseif (\Session::has('fail'))
    <div class="alert alert-danger">
        <p>{{ \Session::get('fail') }}</p>
    </div><br />
    @endif
      <div class="col-md-8">

          <div class="card">
            <div class="card-header">{{ $kostariateam->name }}</div>
              <div class="card-body">
                  <p>email : {{$kostariateam->email}}</p>
                  <p>alamat : {{$kostariateam->address." ".$kostariateam->village->name. ", ".$kostariateam->village->district->name . ", " .  $kostariateam->village->district->regency->name. ", " . $kostariateam->village->district->regency->province->name}}</p>                  
                  <p>Nomor Telepon : {{$kostariateam->phone}}</p>                  
              </div>
              <a href="{{ route('kostariateams.showCredentialForm', $edittype='editUserInfo') }}" class="btn btn-warning">Edit Kostariateam Info</a>
              <a href="{{ route('kostariateams.showCredentialForm', $edittype='editCredential') }}" class="btn btn-warning">Edit Kostariateam Credential</a>
          </div>
          <div class="card">
            <div class="card-header">MOU yang didaftarkan</div>
              <div class="card-body">
                @foreach($kostariateam->mou as $mou)
                  <p>{{ $mou->owner->name}}</p>                  
                @endforeach
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
