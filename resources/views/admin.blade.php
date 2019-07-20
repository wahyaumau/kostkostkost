@extends('layouts.admin')
@section('content')
<div class="container-fluid">
  <div class="row">

    <div class="col-lg-4">
        <div class="stats stats-primary">
            <h3 class="stats-title">Jumlah Kost</h3>
            <div class="stats-content">
                <div class="stats-icon">
                    <i class="fas fa-home"></i>
                </div>
                <div class="stats-data">
                    <div class="stats-number">{{"Unknown"}}</div>
                    <div class="stats-change">
                        <span class="stats-percentage">0%</span>
                        <span class="stats-timeframe">from last month</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="stats stats-warning">
            <h3 class="stats-title">Jumlah Kamar</h3>
            <div class="stats-content">
                <div class="stats-icon">
                    <i class="fas fa-door-open"></i>
                </div>
                <div class="stats-data">
                    <div class="stats-number">{{"Unknown"}}</div>
                    <div class="stats-change">
                        <span class="stats-percentage">0%</span>
                        <span class="stats-timeframe">from last month</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="stats stats-secondary">
            <h3 class="stats-title">Income Pertahun</h3>
            <div class="stats-content">
                <div class="stats-icon">
                    <i class="fas fa-cart-arrow-down"></i>
                </div>
                <div class="stats-data">
                    <div class="stats-number">{{"Unknown"}}</div>
                    <div class="stats-change">
                        <span class="stats-percentage">0%</span>
                        <span class="stats-timeframe">from last month</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card spur-card">
            <div class="card-header ">
                <div class="spur-card-icon">
                    <i class="fas fa-home"></i>
                </div>
                <div class="spur-card-title">Greetings</div>
            </div>
            <div class="card-body ">
              <a href="{{ route('kostariateam.register')}}" class="btn btn-primary mb-1">Register Kostaria Team</a>
              <a href="{{ route('admin.showTransaction') }}" class="btn btn-primary mb-1">Transactions</a>
              <a href="{{ route('api.universities.get_universities') }}" class="btn btn-primary mb-1">Tes API</a>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card spur-card">
            <div class="card-header bg-primary text-white">
                <div class="spur-card-icon">
                    <i class="fas fa-book"></i>
                </div>
                <div class="spur-card-title">Blogs</div>
              </div>
            <div class="card-body ">
              <a href="{{ route('posts.index') }}" class="btn btn-primary mb-1">Posts</a>
              <a href="{{ route('categories.index') }}" class="btn btn-primary mb-1">Categories</a>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card spur-card">
            <div class="card-header bg-success text-white">
                <div class="spur-card-icon">
                    <i class="fas fa-file-export"></i>
                </div>
                <div class="spur-card-title">Export</div>
              </div>
            <div class="card-body ">
                <div class="dropdown">
                    <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Export Data
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item mb-1" href="{{route('users.export')}}" >          Export User Data</a>
                        <a class="dropdown-item mb-1" href="{{route('boardinghouses.export')}}" > Export boardinghouses Data</a>
                        <a class="dropdown-item mb-1" href="{{route('chambers.export')}}" >       Export chambers Data</a>
                        <a class="dropdown-item mb-1" href="{{route('mous.export')}}" >           Export mous Data</a>
                        <a class="dropdown-item mb-1" href="{{route('owners.export')}}" >         Export owners Data</a>
                        <a class="dropdown-item mb-1" href="{{route('provinces.export')}}" >      Export provinces Data</a>
                        <a class="dropdown-item mb-1" href="{{route('regencies.export')}}" >      Export regencies Data</a>
                        <a class="dropdown-item mb-1" href="{{route('districts.export')}}" >      Export districts Data</a>
                        <a class="dropdown-item mb-1" href="{{route('villages.export')}}" >       Export villages Data</a>
                        <a class="dropdown-item mb-1" href="{{route('universities.export')}}" >   Export universities Data</a>
                        <a class="dropdown-item mb-1" href="{{route('kostariateams.export')}}" >  Export kostariateams Data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

@endsection
