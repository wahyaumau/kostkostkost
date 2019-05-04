@extends('layouts.kostariateam')
@section('title', '| Boardinghouse List')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8">
        <h3>Daftar Kostan</h3>
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

    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('boardinghouses.search') }}">
                @csrf
                <div class="form-group row">
                    <div class="col-md-3">
                        <input class="form-control" type="text" placeholder="{{ __('Nama Kostan') }}" name="name">
                    </div>
                    <div class="col-md-2">
                        <input class="form-control" type="text" placeholder="{{ __('Alamat Kostan') }}" name="address">
                    </div>
                    <div class="col-md-2">
                        <input class="form-control" type="text" placeholder="{{ __('Kampus') }}" name="university">
                    </div>
                    <div class="col-md-2">
                        <input class="form-control" type="text" placeholder="{{ __('Kota') }}" name="regency">
                    </div>

                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">
                        {{ __('Search') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="box table-responsive-xl">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kostan</th>
                    <th>Alamat</th>
                    <th>Dekat Kampus</th>
                    <th>Nama Pemilik</th>
                    <th>Kontak Pemilik</th>
                    <th colspan="4">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listBoardingHouse as $boardinghouse)
                <tr>
                    {{-- <td>{{ $boardinghouse->owner->mou->kostariateam->name }}</td> --}}
                    <td>{{$boardinghouse->id}}</td>
                    <td>{{$boardinghouse->name}}</td>
                    <td>{{$boardinghouse->address. ", ".$boardinghouse->village->name. ", ". $boardinghouse->village->district->name . ", ". $boardinghouse->village->district->regency->name . ", ". $boardinghouse->village->district->regency->province->name}}</td>
                    {{-- <td>{{ $boardinghouse->university->name }}</td> --}}
                    <td>{{$boardinghouse->owner->name}}</td>
                    <td>{{$boardinghouse->owner->phone}}</td>
                    <td>
                      <ul style="list-style-type: none;">
                        <li>
                          <a href="{{ route('chambers.creates', $boardinghouse->id)}}" class="btn btn-success btn-icon-split my-1">
                            <span class="icon text-white-50">
                              <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah Kamar</span>
                          </a>
                        </li>
                        <li>
                          <a href="{{ route('boardinghouses.edit', $boardinghouse->id)}}" class="btn btn-warning btn-icon-split my-1 btn-sm">
                            <span class="icon text-white-50">
                              <i class="fas fa-edit"></i>
                            </span>
                            <span class="text">Edit Kostan</span>
                          </a>
                        </li>
                        <li>
                          <a href="{{ route('boardinghouses.show', [$boardinghouse->university->slug,$boardinghouse->id])}}" class="btn btn-info btn-icon-split my-1 btn-sm">
                            <span class="icon text-white-50">
                              <i class="fas fa-info-circle"></i>
                            </span>
                            <span class="text">Lihat Kostan</span>
                          </a>
                        </li>
                        <li>
                          <form action="{{ route('boardinghouses.destroy', $boardinghouse->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-icon-split my-1 btn-sm">
                              <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                              </span>
                              <span style="color:#ffffff !important;" class="text">Delete Kostan</span>
                            </button>
                          </form>
                        </li>
                      </ul>
                    </td>
                </tr>
                @endforeach
                <div class="text-center">
                    {!!$listBoardingHouse->links(); !!}
                </div>
            </tbody>
        </table>
    </div>
</div>
@endsection
