@extends('layouts.app_backup')

@section('stylesheets')
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Edit Kostaria Team') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('kostariateams.update', $kostariateam) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $kostariateam->name }}" required autofocus>

                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
              </div>
            </div>            
            <div class="form-group row">
              <label for="nik" class="col-md-4 col-form-label text-md-right">{{ __('nik') }}</label>

              <div class="col-md-6">
                <input id="nik" type="number" class="form-control{{ $errors->has('nik') ? ' is-invalid' : '' }}" name="nik" value="{{ $kostariateam->nik }}" required autofocus>

                @if ($errors->has('nik'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('nik') }}</strong>
                </span>
                @endif
              </div>
            </div>




            <div class="form-group row">
              <label for="regency_id_birth" class="col-md-4 col-form-label text-md-right">{{ __('Kota Lahir') }}</label>
              <div class="col-md-6">

                <select class="form-control select2-single" name="regency_id_birth">
                  <option value='{{$kostariateam->regencyBirth->id}}'>{{$kostariateam->regencyBirth->name}}</option>
                  @foreach($listRegency as $regency)
                  <option value='{{$regency->id}}'>{{$regency->name}}</option>
                  @endforeach
                </select>                
              </div>
            </div>

            <div class="form-group row">
              <label for="birth_date" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir') }}</label>

              <div class="col-md-6">
                <input id="birth_date" type="date" class="form-control{{ $errors->has('birth_date') ? ' is-invalid' : '' }}" name="birth_date" value="{{ $kostariateam->birth_date }}" required autofocus>

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
                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" placeholder="Jl... RT.. RW..." value="{{ $kostariateam->address }}" required autofocus>

                @if ($errors->has('address'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('address') }}</strong>
                </span>
                @endif
              </div>
            </div>



            <div class="form-group row">
              <label for="regency_id" class="col-md-4 col-form-label text-md-right">{{ __('Kota') }}</label>
              <div class="col-md-6">

                <select class="form-control select2-single" name="regency_id">
                  <option value='{{$kostariateam->village->district->regency->id}}'>{{$kostariateam->village->district->regency->name}}</option>
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
                                <option value='{{$kostariateam->village->district->id}}'>{{$kostariateam->village->district->name}}</option>                                        
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="district_id" class="col-md-4 col-form-label text-md-right">{{ __('Desa') }}</label>

                            <div class="col-md-6">
                                <select class="form-control select2-single" name="village_id">
                                        <option value='{{$kostariateam->village->id}}'>{{$kostariateam->village->name}}</option>
                                </select>
                            </div>
                        </div>


            <div class="form-group row">
              <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Telepon') }}</label>

              <div class="col-md-6">
                <input id="phone" type="number" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $kostariateam->phone }}" required autofocus>

                @if ($errors->has('phone'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('phone') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
                <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Pilih Gambar') }}</label>
                <div class="col-md-6">
                  <input id="photo" type="file" class="{{ $errors->has('photo') ? ' is-invalid' : '' }}" name="photo" value="{{ old('photo') }}" required autofocus>
                  @if ($errors->has('photo'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('photo') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Submit') }}
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