@extends('layouts.app')

@section('adminpanel')
    <a class="navbar-brand" href="{{route('universities.index')}}">University</a>
    <a class="navbar-brand" href="{{route('boardinghouses.index')}}">Boarding House</a>
    <a class="navbar-brand" href="{{route('chambers.index')}}">Chamber</a>
    <a class="navbar-brand" href="{{route('users.index')}}">User</a>
@endsection
@section('logout')
<a class="dropdown-item" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="col-md-4">
            <a href="{{route('kostariateam.register')}}" class="btn btn-success">Tambah Kostan</a>  
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
</div>
@endsection
