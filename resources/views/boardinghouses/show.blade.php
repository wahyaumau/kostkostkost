@extends('layouts.app')

@section('stylesheets')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
{!! Html::style('css/select2.min.css') !!}

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $boardinghouse->name }}</div>
                <div class="card-body">                	
                    <p>deskripsi : {{$boardinghouse->description}}</p>
                    <p>alamat : {{$boardinghouse->address." ".$boardinghouse->regency->name. ", ".$boardinghouse->regency->province->name }}</p>
                    <p>fasilitas : {{$boardinghouse->facility}}</p>
                    <p>fasilitas parkir : {{$boardinghouse->facility_park}}</p>
                    <p>akses : {{$boardinghouse->access}}</p>
                    <p>informasi tambahan : {{$boardinghouse->information_others}}</p>
                    <p>informasi biaya : {{$boardinghouse->information_cost}}</p>                    

                </div>
            </div>

            <div class="card">
                <div class="card-header">{{ $boardinghouse->name. " memiliki ". $boardinghouse->chamber->count(). " tipe kamar" }}</div>
				@foreach ($boardinghouse->chamber as $chamber)
                <div class="card-body">                	
                    <p>nama kamar : {{$chamber->name}}</p>
                    <p>harga bulanan : {{$chamber->price_monthly}}</p>
                    <p>harga tahunan : {{$chamber->price_annual}}</p>
                    <p>gender : {{$chamber->gender=="1"? "laki-laki":"perempuan"}}</p>
                    <p>ukuran kamar : {{$chamber->chamber_size}}</p>
                    <p>fasilitas kamar : {{$chamber->chamber_facility}}</p>
                    <button>Booking Kamar Ini</button>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    

@endsection
