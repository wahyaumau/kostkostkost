@extends('layouts.admin')
@section('content')
<!-- <div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="col-md-4">
        <a href="{{route('kostariateam.register')}}" class="btn btn-success">Register Kostaria Team</a>
      </div>
      <div class="card">
        <div class="card-header">Admin Dashboard</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          You are logged in as admin!
        </div>
      </div>
    </div>
  </div>
</div> -->
<div class="col-sm-12">
  <section class="row">
    <div class="col-md-12 col-lg-8">
      <div class="jumbotron">
        <h1 class="mb-4">Hello, Admin!</h1>
        <p class="lead">You are logged in as admin!</p>
        <p class="lead"><a class="btn btn-primary btn-lg mt-2" href="{{route('kostariateam.register')}}" role="button">Add Teams</a></p>
      </div>
    </div>
    <div class="col-md-12 col-lg-4">
      <div class="card mb-4">
        <div class="card-block">
          <div id="calendar"></div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
