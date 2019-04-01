@extends('layouts.app')
@section('logout')
<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
  </a>
  <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
    @csrf
  </form>
</div>
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Dashboard</div>
        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          You are logged in!
          <a href="{{ route('users.show', Auth::user()) }}" class="btn btn-primary">Show Me</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection