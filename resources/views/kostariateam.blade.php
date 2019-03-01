@extends('layouts.app')

@section('adminpanel')
    {{-- <a class="navbar-brand" href="{{route('universities.index')}}">University</a> --}}
    <a class="navbar-brand" href="{{route('boardinghouses.index')}}">Boarding House</a>
    <a class="navbar-brand" href="{{route('chambers.index')}}">Chamber</a>
    {{-- <a class="navbar-brand" href="{{route('users.index')}}">User</a> --}}
@endsection
@section('logout')
<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('kostariateam.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('kostariateam.logout') }}" method="GET" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Kostariateam Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as kostariateam!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
