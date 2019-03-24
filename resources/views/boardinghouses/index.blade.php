@extends('layouts.kostariateam')
@section('title', '| Boardinghouse List')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h3>Daftar Kostan</h3>
        </div>
        <div class="col-md-4">
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
        </div>
    </div>
    <div class="box">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kostan</th>
                    <th>Deskripsi</th>
                    <th>Alamat</th>
                    <th>Nama Pemilik</th>
                    <th>Kontak Pemilik</th>
                    <th>Fasilitas Umum</th>
                    <th>Fasilitas Lain</th>
                    <th>Akses Lingkungan</th>
                    <th>Keterangan tambahan</th>
                    <th>Keterangan biaya</th>
                    <th colspan="3">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listBoardingHouse as $boardinghouse)
                <tr>
                    <td>{{$boardinghouse->id}}</td>
                    <td>{{$boardinghouse->name}}</td>
                    <td>{{$boardinghouse->description}}</td>
                    <td>{{$boardinghouse->address. ", ".$boardinghouse->village->name. ", ". $boardinghouse->village->district->name . ", ". $boardinghouse->village->district->regency->name . ", ". $boardinghouse->village->district->regency->province->name}}</td>
                    <td>{{$boardinghouse->owner->name}}</td>
                    <td>{{$boardinghouse->owner->phone}}</td>
                    @php
                    $facilities = str_split($boardinghouse->facility);
                    $facilities_def = array('dapur', 'kompor', 'lpg', 'parkir motor', 'parkir mobil', 'jemuran', 'listrik', 'air', 'layanan kebersihan', 'pajak dan retribusi', 'wi-fi');
                    for ($i=0; $i < count($facilities); $i++) {
                    if ($facilities[$i] == false) {
                    unset($facilities_def[$i]);
                    }
                    }
                    @endphp
                    <td>
                        @foreach($facilities_def as $facility)
                        <p>{{$facility}}</p>
                        @endforeach
                    </td>
                    <td>{{$boardinghouse->facility_other}}</td>
                    <td>{{$boardinghouse->access}}</td>
                    <td>{{$boardinghouse->information_others}}</td>
                    <td>{{$boardinghouse->information_cost}}</td>
                    <td><a href="{{ route('chambers.creates', $boardinghouse->id)}}" class="btn btn-success">Tambah Kamar</a></td>
                    <td>
                        <td><a href="{{ route('boardinghouses.edit', $boardinghouse->id)}}" class="btn btn-warning">Edit</a></td>
                        <td><a href="{{ route('boardinghouses.show', $boardinghouse->id)}}" class="btn btn-primary">Show</a></td>
                        <td><form action="{{ route('boardinghouses.destroy', $boardinghouse->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
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