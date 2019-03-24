@extends('layouts.kostariateam')
@section('title', '| New University')
@section('stylesheets')
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Universitas') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('universities.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Universitas') }}</label>
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
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" placeholder="Nama Jl, RT, RW" value="{{ old('address') }}" required>
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