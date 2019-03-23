@extends('layouts.kostariateam')

@section('title', '| New MOU')

@section('stylesheets')
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pihak 1 TIM KOSTARIA') }}</div>
                <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
                            <div class="col-md-6">                                
                                <input type="text" class="form-control" value="{{$kostariateam->name}}" disabled="true">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('NIK') }}</label>
                            <div class="col-md-6">                                
                                <input type="text" class="form-control" value="{{$kostariateam->nik}}" disabled="true">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tempat Tanggal Lahir') }}</label>
                            <div class="col-md-6">                                
                                <input type="text" class="form-control" value="{{$kostariateam->regencyBirth->name. "  ".$kostariateam->birth_date}}" disabled="true">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>
                            <div class="col-md-6">                                
                                <input type="text" class="form-control" value="{{$kostariateam->address.", Ds. " . $kostariateam->village->name. ", Kc. " . $kostariateam->village->district->name . ", " . $kostariateam->village->district->regency->name . ", " . $kostariateam->village->district->regency->province->name}}" disabled="true">
                            </div>
                        </div>                                    
                </div>                
            </div>
        </div>        

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pihak 2 Pemilik Kostan') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('mou.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nik" class="col-md-4 col-form-label text-md-right">{{ __('NIK') }}</label>

                            <div class="col-md-6">
                                <input id="nik" type="number" class="form-control{{ $errors->has('nik') ? ' is-invalid' : '' }}" name="nik" value="{{ old('nik') }}" required>

                                @if ($errors->has('nik'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nik') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="regency_id_birth" class="col-md-4 col-form-label text-md-right">{{ __('Tempat Lahir') }}</label>

                            <div class="col-md-6">
                                <select class="form-control select2-single" name="regency_id_birth">
                                    @foreach($listRegency as $regency)
                                        <option value='{{$regency->id}}'>{{$regency->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birth_date" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir') }}</label>

                            <div class="col-md-6">
                                <input id="birth_date" type="date" class="form-control{{ $errors->has('birth_date') ? ' is-invalid' : '' }}" name="birth_date" value="{{ old('birth_date') }}" required>

                                @if ($errors->has('birth_date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birth_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" placeholder="Jl. RT RW" value="{{ old('address') }}" required>

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
                                        <option value="">Pilih Kecamatan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="district_id" class="col-md-4 col-form-label text-md-right">{{ __('Desa') }}</label>

                            <div class="col-md-6">
                                <select class="form-control select2-single" name="village_id">
                                        <option value="">Pilih Desa</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Nomor HP') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="regency_id_signed" class="col-md-4 col-form-label text-md-right">{{ __('Ditandatangani di :') }}</label>

                            <div class="col-md-6">
                                <select class="form-control select2-single" name="regency_id_signed">
                                    @foreach($listRegency as $regency)
                                        <option value='{{$regency->id}}'>{{$regency->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="signed_at" class="col-md-4 col-form-label text-md-right">{{ __('Ditandatangani pada :') }}</label>

                            <div class="col-md-6">
                                <input id="today" type="date" class="form-control{{ $errors->has('signed_at') ? ' is-invalid' : '' }}" name="signed_at" value="{{ old('signed_at') }}" required>

                                @if ($errors->has('signed_at'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('signed_at') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ended_at" class="col-md-4 col-form-label text-md-right">{{ __('Berlaku sampai :') }}</label>

                            <div class="col-md-6">
                                <input id="ended_at" type="date" class="form-control{{ $errors->has('ended_at') ? ' is-invalid' : '' }}" name="ended_at" value="{{ old('ended_at') }}" required>

                                @if ($errors->has('ended_at'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ended_at') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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