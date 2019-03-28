@extends('layouts.dashboard')
@section('panel')
@auth('kostariateam')
<li class="nav-item"><a class="nav-link" href="{{route('kostariateam.dashboard')}}"><em class="fas tachometer-alt"></em> Dashboard</a></li>
@endauth
@auth('admin')
<li class="nav-item"><a class="nav-link" href="{{route('admin.dashboard')}}"><em class="fas tachometer-alt"></em> Dashboard</a></li>
@endauth
<li class="nav-item"><a class="nav-link" href="{{route('mou.index')}}"><em class="fa fa-signature"></em> MOU</a></li>
<li class="nav-item"><a class="nav-link" href="{{route('boardinghouses.index')}}"><em class="fa fa-home"></em> Boarding House</a></li>
<li class="nav-item"><a class="nav-link" href="{{route('chambers.index')}}"><em class="fas fa-person-booth"></em> Chamber</a></li>
<li class="nav-item"><a class="nav-link" href="{{route('universities.index')}}"><em class="fa fa-university"></em> University</a></li>
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
