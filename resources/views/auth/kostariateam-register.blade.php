@extends('layouts.admin')

@section('stylesheets')
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Register Kostaria Team') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('kostariateam.register') }}">
            @csrf

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="nik" class="col-md-4 col-form-label text-md-right">{{ __('nik') }}</label>

              <div class="col-md-6">
                <input id="nik" type="number" class="form-control{{ $errors->has('nik') ? ' is-invalid' : '' }}" name="nik" value="{{ old('nik') }}" required autofocus>

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
                  @foreach($listRegency as $regency)
                  <option value='{{$regency->id}}'>{{$regency->name}}</option>
                  @endforeach
                </select>

              </div>
            </div>

            <div class="form-group row">
              <label for="birth_date" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir') }}</label>

              <div class="col-md-6">
                <input id="birth_date" type="date" class="form-control{{ $errors->has('birth_date') ? ' is-invalid' : '' }}" name="birth_date" value="{{ old('birth_date') }}" required autofocus>

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
                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" placeholder="Jl... RT.. RW..." value="{{ old('address') }}" required autofocus>

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
              <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Telepon') }}</label>

              <div class="col-md-6">
                <input id="phone" type="number" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus>

                @if ($errors->has('phone'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('phone') }}</strong>
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
