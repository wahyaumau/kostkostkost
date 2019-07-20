@extends('layouts.app')

@section('stylesheets')
<link href="{{ asset('css/select2-bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('panel')

@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="get" action="{{ route('boardinghouses.search') }}">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="single-append-text" class="control-label">Cari Dekat Kampus</label>
                        <div class="input-group">
                            <select id="single-append-text" class="select2 form-control select2-allow-clear" name="university">
                                <option value="">Pilih Kampus</option>
                            </select>
                        </div>
                      </div>
                      <!-- <div class="form-group col-md-6">
                        <label for="single-append-text" class="control-label">Cari Sekitar Kota</label>
                        <div class="input-group">
                            <select id="single-append-text" class="select2 form-control select2-allow-clear" name="regency">
                                <option value="">Pilih Kota</option>
                            </select>
                        </div>
                      </div> -->
                        <div class="form-group col-md-6">
                            <label for="single-append-text" class="control-label">Rentang Harga</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input id="minPrice" type="number" min="0" class="form-control{{ $errors->has('minPrice') ? ' is-invalid' : '' }}" name="minPrice" value="{{ old('minPrice') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input id="maxPrice" type="number" min="0" class="form-control{{ $errors->has('maxPrice') ? ' is-invalid' : '' }}" name="maxPrice" value="{{ old('maxPrice') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="single-append-text" class="control-label">Fasilitas</label>
                            <div class="col-md-12">
                                <input type="checkbox" name="facility_1" value="1">Dapur
                                <input type="checkbox" name="facility_2" value="1">Kompor
                                <input type="checkbox" name="facility_3" value="1">Gas
                                <input type="checkbox" name="facility_4" value="1">Tempat parkir motor
                                <input type="checkbox" name="facility_5" value="1">Tempat parkir mobil
                                <input type="checkbox" name="facility_6" value="1">Tempat jemuran
                                <input type="checkbox" name="facility_7" value="1">Listrik
                                <input type="checkbox" name="facility_8" value="1">Air
                                <input type="checkbox" name="facility_9" value="1">Kebersihan
                                <input type="checkbox" name="facility_10" value="1">Pajak dan retribusi
                                <input type="checkbox" name="facility_11" value="1">Wi-fi
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="single-append-text" class="control-label">Fasilitas Kamar</label>
                            <div class="col-md-12">
                                <input type="checkbox" name="chamber_facility_1" value="1">Kamar Mandi Dalam
                                <input type="checkbox" name="chamber_facility_2" value="1">Ranjang
                                <input type="checkbox" name="chamber_facility_3" value="1">Kasur
                                <input type="checkbox" name="chamber_facility_4" value="1">Meja belajar
                                <input type="checkbox" name="chamber_facility_5" value="1">Lemari
                                <input type="checkbox" name="chamber_facility_6" value="1">Water Heater
                                <input type="checkbox" name="chamber_facility_7" value="1">AC
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="single-append-text" class="control-label">Kamar Untuk</label>
                            <div class="col-md-6">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="1" name="gender">Laki-laki
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="0" name="gender">Perempuan
                                    </label>
                                </div>
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
    <div class="col-lg-4 col-sm-6 mb-2">
        <div class="card ">
          <div class="card-image d-none d-md-block">
            <video id="video-kost" controls loop class="w-100" style="max-height: 250px" poster="{{asset('img/kostaria.png')}}">
              <source src="{{url('videos/'.$boardinghouse->video)}}" type="video/mp4">
            </video>
          </div>
            <div class="card-body">
                <h5 class="card-title" alt="{{$boardinghouse->description}}">
                    <b>{{ ucwords(trans($boardinghouse->name)) }}</b>
                </h5>
                <p class="card-text">{{$boardinghouse->address . ", ".$boardinghouse->village->district->name . ", " .  $boardinghouse->village->district->regency->name. ", " . $boardinghouse->village->district->regency->province->name}}</p>
                <p class="card-text text-secondary">{{$boardinghouse->information_cost}}</p>
                <!-- <p>deskripsi : {{$boardinghouse->description}}</p>
                <p>alamat : {{$boardinghouse->address." ".$boardinghouse->village->name. ", ".$boardinghouse->village->district->name . ", " .  $boardinghouse->village->district->regency->name. ", " . $boardinghouse->village->district->regency->province->name}}</p>
                -->
                @php
                  $facilities = str_split($boardinghouse->facility);
                  $facilities_def = array('fas fa-utensils', 'fas fa-fire', 'fas fas-burn', 'fas fa-motorcycle', 'fas fa-car', 'fas fa-tshirt', 'fas fa-bolt', 'fas fa-tint', 'fas fa-broom', 'fas fa-file-invoice-dollar', 'fas fa-wifi');
                  $facilities_dess = array('Dapur', 'Kompor', 'Elpiji', 'Parkir Motor', 'Parkir Mobil', 'Jemuran', 'Listrik', 'Air', 'Kebersihan', 'Pajak dan Retribusi', 'Wifi');
                  for ($i=0; $i < count($facilities); $i++) {
                  if ($facilities[$i] == false) {
                    unset($facilities_def[$i]);
                    unset($facilities_dess[$i]);
                  }
                }
                @endphp
                @foreach($facilities_def as $index => $facility)
                    <i class="{{$facility}}" alt="{{$facilities_dess[$index]}}" title="{{$facilities_dess[$index]}}"></i>
                @endforeach
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-primary">Booking</a>
                {{-- <a href="{{ route('boardinghouses.show', [$boardinghouse->university->slug, $boardinghouse->id])}}" class="btn btn-primary">Lihat Selengkapnya</a> --}}
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
