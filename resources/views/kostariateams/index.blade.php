@extends('layouts.admin')
@section('title', '| Kosaria Team List')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h3>Daftar Kostaria Team</h3>
        </div>
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
                    <td>{{$kostariateam->address. ' '. $kostariateam->village->name . ', ' . $kostariateam->village->district->name. ', ' .$kostariateam->village->district->regency->name. ', '. $kostariateam->village->district->regency->province->name}}</td>
                    <td>{{$kostariateam->phone}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection