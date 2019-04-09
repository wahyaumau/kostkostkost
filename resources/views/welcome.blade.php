@extends('layouts.app')

@section('stylesheets')
<link href="{{ asset('css/select2-bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('panel')

@endsection

@section('content')
<!-- <div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">

                    <div class="carousel-item active">
                      <img src="{{asset('img/landing/1.jpg')}}" class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="{{asset('img/landing/1.jpg')}}" class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="{{asset('img/landing/1.jpg')}}" class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                      </div>
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
        </div>
    </div>
</div> -->

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4 border-bottom-primary">
            <div class="card-body">
                <form method="POST" action="{{ route('boardinghouses.search') }}">
                    @csrf
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="single-append-text" class="control-label">Cari Dekat Kampus</label>
                        <div class="input-group">
                            <select id="single-append-text" class="select2 form-control select2-allow-clear" name="university">
                                <option>Pilih Kampus</option>
                            </select>
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="single-append-text" class="control-label">Cari Sekitar Kota</label>
                        <div class="input-group">
                            <select id="single-append-text" class="select2 form-control select2-allow-clear" name="regency">
                                <option>Pilih Kota</option>
                            </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary push-right">
                                {{ __('Cari Kost') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<div class="row">
    @if(isset($listBoardingHouse))
    @foreach($listBoardingHouse as $boardinghouse)
    <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100 shadow">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
                <h4 class="card-title" alt="{{$boardinghouse->description}}">
                    <b>{{ ucwords(trans($boardinghouse->name)) }}</b>
                </h4>
                <p class="card-text">{{$boardinghouse->address." " . ", ".$boardinghouse->village->district->name . ", " .  $boardinghouse->village->district->regency->name. ", " . $boardinghouse->village->district->regency->province->name}}</p>
                <p class="card-text text-primary">{{$boardinghouse->information_cost}}</p>
                <!-- <p>deskripsi : {{$boardinghouse->description}}</p>
                <p>alamat : {{$boardinghouse->address." ".$boardinghouse->village->name. ", ".$boardinghouse->village->district->name . ", " .  $boardinghouse->village->district->regency->name. ", " . $boardinghouse->village->district->regency->province->name}}</p>
                -->
                @php
                  $facilities = str_split($boardinghouse->facility);
                  $facilities_def = array('fas fa-utensils', 'fas fa-fire', 'fas fas-burn', 'fas fa-motorcycle', 'fas fa-car', 'fas fa-tshirt', 'fas fa-bolt', 'fas fa-tint', 'fas fa-broom', 'fas fa-file-invoice-dollar', 'fas fa-wifi');
                  $facilities_dess = array('Dapur', 'Kompor', 'Elpiji', 'Parkir Motor', 'Parkir Mobil', 'Jemuran', 'Listril', 'Air', 'Kebersihan', 'Pajak dan Retribusi', 'Wifi');
                  for ($i=0; $i < count($facilities); $i++) {
                  if ($facilities[$i] == false) {
                    unset($facilities_def[$i]);
                    unset($facilities_des[$i]);
                  }
                }
                @endphp
                @foreach($facilities_def as $index => $facility)
                    <i class="{{$facility}}" alt=""></i>
                @endforeach
                <!--
                <p>fasilitas lain : {{$boardinghouse->facility_other}}</p>
                <p>akses : {{$boardinghouse->access}}</p>
                <p>informasi tambahan : {{$boardinghouse->information_others}}</p>
                <p>informasi biaya : {{$boardinghouse->information_cost}}</p> -->
            </div>
            <div class="card-footer">
                <!-- <a href="#" class="btn btn-primary">Booking</a> -->
                <a href="{{ route('boardinghouses.show', $boardinghouse->id)}}" class="btn btn-primary">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <div class="mx-3 alert alert-primary alert-dismissible fade show w-100" role="alert">
      <strong>Hai!</strong> Silahkan pilih Kampus atau Kota untuk mencari tempat kost.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
</div>

@endsection
@section('scripts')
<script src="{{ asset('js/select2.full.js') }}"></script>
<!-- <script src="{{ asset('js/select2.min.js') }}"></script> -->
<script type="text/javascript">
    $('.select2-single').select2();

    $.fn.select2.defaults.set("theme", "bootstrap");

    var placeholder = "Select a State";

    $(".select2-single, .select2-multiple").select2({
        placeholder: placeholder,
        width: null,
        containerCssClass: ':all:'
    });

    $(".select2-allow-clear").select2({
        allowClear: true,
        placeholder: placeholder,
        width: null,
        containerCssClass: ':all:'
    });
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
