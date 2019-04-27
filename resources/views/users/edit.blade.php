@extends('layouts.app_backup')

@section('stylesheets')
  <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Edit User Info') }}</div>
        <div class="card-body">
          <form method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
              <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>
                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
              </div>
            </div>
            {{-- <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
              <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>
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
            </div> --}}
            {{-- <div class="form-group row">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
              </div>
            </div> --}}
            
              <div class="form-group row">
                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>
                <div class="col-md-6">
                  <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" placeholder="Jl... RT.. RW..." value="{{ $user->address }}" required autofocus>
                  @if ($errors->has('address'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('address') }}</strong>
                  </span>
                  @endif
                </div>
              </div>
              <div class="form-group row">
                <label for="province_id" class="col-md-4 col-form-label text-md-right">{{ __('Provinsi') }}</label>
                <div class="col-md-6">
                  <select class="form-control select2-single" name="province_id">
                    <option value='{{ $user->village->district->regency->province->id }}'>{{ $user->village->district->regency->province->name }}</option>
                    @foreach($listProvince as $province)
                    <option value='{{$province->id}}'>{{$province->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="regency_id" class="col-md-4 col-form-label text-md-right">{{ __('Kota') }}</label>
                <div class="col-md-6">
                  <select class="form-control select2-single" name="regency_id">
                    <option value='{{ $user->village->district->regency->id }}'>{{ $user->village->district->regency->name }}</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="district_id" class="col-md-4 col-form-label text-md-right">{{ __('Kecamatan') }}</label>
                <div class="col-md-6">
                  <select class="form-control select2-single" name="district_id">
                    <option value="{{ $user->village->district->id }}">{{ $user->village->district->name }}</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="district_id" class="col-md-4 col-form-label text-md-right">{{ __('Desa') }}</label>
                <div class="col-md-6">
                  <select class="form-control select2-single" name="village_id">
                    <option value="{{ $user->village->id }}">{{ $user->village->name }}</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="university_id" class="col-md-4 col-form-label text-md-right">{{ __('Perguruan Tinggi') }}</label>
                <div class="col-md-6">
                  <select class="form-control select2-single" name="university_id">
                    <option value='{{ $user->university->id }}'>{{ $user->university->name }}</option>
                    @foreach($listUniversity as $university)
                    <option value='{{$university->id}}'>{{$university->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Telepon') }}</label>
                <div class="col-md-6">
                  <input id="phone" type="number" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $user->phone }}" required autofocus>
                  @if ($errors->has('phone'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('phone') }}</strong>
                  </span>
                  @endif
                </div>
              </div>
              <div class="form-group row">
                <label for="lineId" class="col-md-4 col-form-label text-md-right">{{ __('Id Line') }}</label>
                <div class="col-md-6">
                  <input id="lineId" type="text" class="form-control{{ $errors->has('lineId') ? ' is-invalid' : '' }}" name="lineId" value="{{ $user->lineId }}" required autofocus>
                  @if ($errors->has('lineId'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('lineId') }}</strong>
                  </span>
                  @endif
                </div>
              </div>
              <div class="form-group row">
                <label for="parent" class="col-md-4 col-form-label text-md-right">{{ __('Nama Orang Tua') }}</label>
                <div class="col-md-6">
                  <input id="parent" type="text" class="form-control{{ $errors->has('parent') ? ' is-invalid' : '' }}" name="parent" value="{{ $user->parent }}" required autofocus>
                  @if ($errors->has('parent'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('parent') }}</strong>
                  </span>
                  @endif
                </div>
              </div>
              <div class="form-group row">
                <label for="parent_phone" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Telepon Orang Tua') }}</label>
                <div class="col-md-6">
                  <input id="parent_phone" type="number" class="form-control{{ $errors->has('parent_phone') ? ' is-invalid' : '' }}" name="parent_phone" value="{{ $user->parent_phone }}" required autofocus>
                  @if ($errors->has('parent_phone'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('parent_phone') }}</strong>
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
                  {{ __('Update Info') }}
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