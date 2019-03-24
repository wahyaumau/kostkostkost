@extends('layouts.app')
@section('panel')
<a class="navbar-brand" href="{{route('mou.index')}}">MOU</a>
<a class="navbar-brand" href="{{route('boardinghouses.index')}}">Boardinghouse</a>
<a class="navbar-brand" href="{{route('chambers.index')}}">Chamber</a>
<a class="navbar-brand" href="{{route('universities.index')}}">University</a>
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