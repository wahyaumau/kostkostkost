@extends('layouts.kostariateam')

@section('stylesheets')
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Kostan') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('boardinghouses.update', $boardinghouse->id) }}">
                        @method('PATCH')
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
                            <div class="col-md-6">                                
                                <input type="text" class="form-control" value="{{$boardinghouse->owner->name}}" disabled="true">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Kostan') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $boardinghouse->name }}" required>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                    
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Deskripsi Kostan') }}</label>
                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ $boardinghouse->description }}" required>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" placeholder="Nama Jl, Desa, RT, RW, Kecamatan" value="{{ $boardinghouse->address}}" required>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="regency_id" class="col-md-4 col-form-label text-md-right">{{ __('Kota/Kabupaten') }}</label>

                            <div class="col-md-6">
                                <select class="form-control select2-single" name="regency_id">
                                    <option value="{{ $boardinghouse->village->district->regency->id }}">{{ $boardinghouse->village->district->regency->name }}</option>
                                    @foreach($listRegency as $regency)
                                        <option value='{{$regency->id}}'>{{$regency->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="district_id" class="col-md-4 col-form-label text-md-right">{{ __('Kecamatan') }}</label>

                            <div class="col-md-6">
                                <select class="form-control select2-single" name="district_id">
                                        <option value="{{ $boardinghouse->village->district->id }}">{{ $boardinghouse->village->district->name }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="district_id" class="col-md-4 col-form-label text-md-right">{{ __('Desa') }}</label>

                            <div class="col-md-6">
                                <select class="form-control select2-single" name="village_id">
                                        <option value="{{ $boardinghouse->village->id }}">{{ $boardinghouse->village->name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="facility" class="col-md-4 col-form-label text-md-right">{{ __('Fasilitas') }}</label>
                            <div class="col-md-6">
                                <input type="checkbox" name="facility_1" value="1" {{$facilities[0]==1? 'checked':''}}>Dapur
                                <input type="checkbox" name="facility_2" value="1" {{$facilities[1]==1? 'checked':''}}>Kompor
                                <input type="checkbox" name="facility_3" value="1" {{$facilities[2]==1? 'checked':''}}>Gas
                                <input type="checkbox" name="facility_4" value="1" {{$facilities[3]==1? 'checked':''}}>Tempat parkir motor
                                <input type="checkbox" name="facility_5" value="1" {{$facilities[4]==1? 'checked':''}}>Tempat parkir mobil
                                <input type="checkbox" name="facility_6" value="1" {{$facilities[5]==1? 'checked':''}}>Tempat jemuran
                                <input type="checkbox" name="facility_7" value="1" {{$facilities[6]==1? 'checked':''}}>Listrik
                                <input type="checkbox" name="facility_8" value="1" {{$facilities[7]==1? 'checked':''}}>Air
                                <input type="checkbox" name="facility_9" value="1" {{$facilities[8]==1? 'checked':''}}>Kebersihan
                                <input type="checkbox" name="facility_10" value="1" {{$facilities[9]==1? 'checked':''}}>Pajak dan retribusi
                                <input type="checkbox" name="facility_11" value="1" {{$facilities[10]==1? 'checked':''}}>Wi-fi                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="facility_other" class="col-md-4 col-form-label text-md-right">{{ __('Fasilitas Lain') }}</label>
                            <div class="col-md-6">
                                <input id="facility_other" type="text" class="form-control{{ $errors->has('facility_other') ? ' is-invalid' : '' }}" name="facility_other" value="{{ $boardinghouse->facility_other }}" required>

                                @if ($errors->has('facility_other'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('facility_other') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="access" class="col-md-4 col-form-label text-md-right">{{ __('Akses Lingkungan') }}</label>
                            <div class="col-md-6">
                                <input id="access" type="text" class="form-control{{ $errors->has('access') ? ' is-invalid' : '' }}" name="access" value="{{ $boardinghouse->access }}" required>

                                @if ($errors->has('access'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('access') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="information_others" class="col-md-4 col-form-label text-md-right">{{ __('Keterangan tambahan') }}</label>
                            <div class="col-md-6">
                                <input id="information_others" type="text" class="form-control{{ $errors->has('information_others') ? ' is-invalid' : '' }}" name="information_others" value="{{ $boardinghouse->information_others }}" required>

                                @if ($errors->has('information_others'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('information_others') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="information_cost" class="col-md-4 col-form-label text-md-right">{{ __('Keterangan Biaya') }}</label>
                            <div class="col-md-6">
                                <input id="information_cost" type="text" class="form-control{{ $errors->has('information_cost') ? ' is-invalid' : '' }}" name="information_cost" value="{{ $boardinghouse->information_cost }}" required>

                                @if ($errors->has('information_cost'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('information_cost') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $('.select2-single').select2();        
    </script>

    <script type="text/javascript">
        document.querySelector("#today").valueAsDate = new Date();
    </script>

    <script type="text/javascript">
        $('.select2-single').select2();
    </script>
 <script>
     $(document).ready(function() {

    $('select[name="province_id"]').on('change', function(){
        var provinceId = $(this).val();
        if(provinceId) {
            $.ajax({
                url: '/address/getRegencies/'+provinceId,
                type:"GET",
                dataType:"json",
                success:function(data) {
                    $('select[name="regency_id"]').empty();
                    $('select[name="district_id"]').empty();
                    $('select[name="village_id"]').empty();

                    $('select[name="regency_id"]').append('<option value="">Pilih Kota</option>');

                    $.each(data, function(key, value){

                        $('select[name="regency_id"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                }
            });
        } else {
            $('select[name="regency_id"]').empty();
            $('select[name="district_id"]').empty();
            $('select[name="village_id"]').empty();
        }

    });

    $('select[name="regency_id"]').on('change', function(){
        var regencyId = $(this).val();
        if(regencyId) {
            $.ajax({
                url: '/address/getDistricts/'+regencyId,
                type:"GET",
                dataType:"json",
                success:function(data) {


                    $('select[name="district_id"]').empty();                    
                    $('select[name="village_id"]').empty();
                    $('select[name="district_id"]').append('<option value="">Pilih Kecamatan</option>');

                    $.each(data, function(key, value){

                        $('select[name="district_id"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                }
            });
        } else {            
            $('select[name="district_id"]').empty();
            $('select[name="village_id"]').empty();
        }

    });

    $('select[name="district_id"]').on('change', function(){
        var districtId = $(this).val();
        if(districtId) {
            $.ajax({
                url: '/address/getVillages/'+districtId,
                type:"GET",
                dataType:"json",
                success:function(data) {

                    $('select[name="village_id"]').empty();
                    $('select[name="village_id"]').append('<option value="">Pilih Desa</option>');


                    $.each(data, function(key, value){
                        $('select[name="village_id"]').append('<option value="'+ key +'">' + value + '</option>');                        
                    });
                }
            });
        } else {                        
            $('select[name="village_id"]').empty();
        }

    });

});
 </script>

@endsection