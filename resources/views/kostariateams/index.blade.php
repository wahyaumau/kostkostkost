@extends('layouts.app')

@section('title', '| List Kosaria Team')

@section('panel')
    <a class="navbar-brand" href="{{route('universities.index')}}">University</a>
    <a class="navbar-brand" href="{{route('boardinghouses.index')}}">Boarding House</a>
    <a class="navbar-brand" href="{{route('chambers.index')}}">Chamber</a>
    <a class="navbar-brand" href="{{route('admin.showKostariaTeam')}}">Kostaria Team</a>
    <a class="navbar-brand" href="{{route('mou.index')}}">MOU</a>
@endsection
@section('logout')
<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="GET" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h3>Daftar Kostaria Team</h3>
        </div>
        <!-- <div class="col-md-4">
            <form method="POST" action="{{ route('boardinghouses.search') }}">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Kostan') }}</label>
                <div class="col-md-6">                                
                    <input type="text" name="name-search">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Alamat Kostan') }}</label>
                <div class="col-md-6">                                
                    <input type="text" name="address-search">
                </div>
            </div>
            <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Search') }}
                                </button>
                            </div>
                        </div>
            </form>
        </div> -->        
    </div>        

    <div class="box">    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>NIK</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>                    
                    <th>Nomor telepon</th>                    
                    <th colspan="3">action</th>
                </tr>
            </thead>
            <tbody>

            @foreach($listKostariaTeam as $kostariateam)
                <tr>            
                    <td>{{$kostariateam->id}}</td>
                    <td>{{$kostariateam->name}}</td>
                    <td>{{$kostariateam->email}}</td>
                    <td>{{$kostariateam->nik}}</td>
                    <td>{{$kostariateam->regencyBirth->name}}</td>
                    <td>{{$kostariateam->birth_date}}</td>
                    <td>{{$kostariateam->address. ' '. $kostariateam->regency->name . ', '. $kostariateam->regency->province->name}}</td>                    
                    <td>{{$kostariateam->phone}}</td>                    
                    
                </tr>
            @endforeach
            </tbody>
        </table>
    </div> 
</div>
@endsection