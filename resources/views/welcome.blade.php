@extends('layouts.app')

@section('stylesheets')
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<form method="POST" action="{{ route('boardinghouses.search') }}">
    @csrf
    <div class="form-group">
        <div class="hero__text">
            <label for="id_label_single">
                Pilih Kampus
            </label>
            <select class="select2 form-control" name="university">
                <option>Pilih Kampus</option>
            </select>
        </div>
        <div class="">
            <select class="select2 form-control" name="regency">
                <option value="">Pilih Kota</option>
            </select>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="form-group row mb-0">
                <div class="col-md-12 pull-right">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Search') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<h1 class="my-4">Welcome to Modern Business</h1>
<div class="row">
    @if(isset($listBoardingHouse))
    @foreach($listBoardingHouse as $boardinghouse)
    <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
                <h4 class="card-title">
                    <!-- <a href="#"></a> -->
                    <b>{{ $boardinghouse->name }}</b>
                </h4>
                <p class="card-text">{{$boardinghouse->address." ".$boardinghouse->village->name. ", ".$boardinghouse->village->district->name . ", " .  $boardinghouse->village->district->regency->name. ", " . $boardinghouse->village->district->regency->province->name}}</p>
                <p class="card-text text-primary">{{$boardinghouse->information_cost}}</p>
                <!-- <p>deskripsi : {{$boardinghouse->description}}</p>
            <p>alamat : {{$boardinghouse->address." ".$boardinghouse->village->name. ", ".$boardinghouse->village->district->name . ", " .  $boardinghouse->village->district->regency->name. ", " . $boardinghouse->village->district->regency->province->name}}</p>
            @php
              $facilities = str_split($boardinghouse->facility);
              $facilities_def = array('dapur', 'kompor', 'lpg', 'parkir motor', 'parkir mobil', 'jemuran', 'listrik', 'air', 'layanan kebersihan', 'pajak dan retribusi', 'wi-fi');
              for ($i=0; $i < count($facilities); $i++) {
              if ($facilities[$i] == false) {
                unset($facilities_def[$i]);
              }
            }
            @endphp
            <p>fasilitas :
            @foreach($facilities_def as $facility)
                {{$facility.", "}}
            @endforeach</p>
            <p>fasilitas lain : {{$boardinghouse->facility_other}}</p>
            <p>akses : {{$boardinghouse->access}}</p>
            <p>informasi tambahan : {{$boardinghouse->information_others}}</p>
            <p>informasi biaya : {{$boardinghouse->information_cost}}</p> -->
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-primary">Booking</a>
                <a href="{{ route('boardinghouses.show', $boardinghouse->id)}}" class="btn btn-primary">See</a>
            </div>
        </div>
    </div>
    @endforeach
    @endif
</div>

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
          @if(isset($listBoardingHouse))
          @foreach($listBoardingHouse as $boardinghouse)
            <div class="card">
                <div class="card-header">{{ $boardinghouse->name. " memiliki ". $boardinghouse->chamber->count(). " tipe kamar" }}</div>
                @foreach ($boardinghouse->chamber as $chamber)
                <div class="card-body">
                    <p>nama kamar : {{$chamber->name}}</p>
                    <p>harga bulanan : {{$chamber->price_monthly}}</p>
                    <p>harga tahunan : {{$chamber->price_annual}}</p>
                    <p>gender : {{$chamber->gender=="1"? "laki-laki":"perempuan"}}</p>
                    <p>ukuran kamar : {{$chamber->chamber_size}}</p>
                    @php
                    $facilities = str_split($chamber->chamber_facility);
                    $facilities_def = array('kamar mandi dalam', 'ranjang', 'kasur', 'meja belajar', 'lemari', 'water heater', 'AC');
                    for ($i=0; $i < count($facilities); $i++) {
                    if ($facilities[$i] == false) {
                    unset($facilities_def[$i]);
                    }
                    }
                    @endphp
                    <p>fasilitas kamar :
                        @foreach($facilities_def as $facility)
                        {{$facility. ", "}}
                        @endforeach
                    </p>
                    <button>Booking Kamar Ini</button>
                </div>
                @endforeach
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div> -->

@endsection
@section('scripts')
<script src="{{ asset('js/select2.min.js') }}"></script>
<script type="text/javascript">
    $('.select2-single').select2();
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="university"]').select2({
            ajax: {
                url: '/universities/getUniversities',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                    };
                },
                processResults: function(data) {
                    return {
                        results: data
                    };
                },
                cache: true
            },
            minimumInputLength: 1,
            placeholder: function() {
                $(this).data('placeholder');
            },

            templateResult: ResultTemplater,
            templateSelection: SelectionTemplater
        });

        $('select[name="regency"]').select2({
            ajax: {
                url: '/regencies/getRegencies',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                    };
                },
                processResults: function(data) {
                    return {
                        results: data
                    };
                },
                cache: true
            },
            minimumInputLength: 1,
            placeholder: function() {
                $(this).data('placeholder');
            },
            templateResult: ResultTemplater,
            templateSelection: SelectionTemplater
        });

        function ResultTemplater(item) {
            return item.name;
        }

        function SelectionTemplater(item) {
            if (typeof item.name !== "undefined") {
                return ResultTemplater(item);
            }
            return item.name;
        }

    });
</script>
@endsection
