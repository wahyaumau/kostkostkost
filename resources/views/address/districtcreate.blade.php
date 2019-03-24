@extends('layouts.kostariateam')
@section('title', '| New District')
@section('stylesheets')
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Provinsi') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('districts.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="province_id" class="col-md-4 col-form-label text-md-right">{{ __('Provinsi') }}</label>
                            <div class="col-md-6">
                                <select class="form-control select2-single" name="province_id">
                                    @foreach($listProvince as $province)
                                    <option value='{{$province->id}}'>{{$province->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="regency_id" class="col-md-4 col-form-label text-md-right">{{ __('Kota/Kabupaten') }}</label>
                            <div class="col-md-6">
                                <select class="form-control select2-single" name="regency_id">
                                    <option value="">Pilih Kota/Kabupaten</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Kecamatan') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
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
                            $('select[name="regency_id"]').append('<option value="">Pilih Kota/Kabupaten</option>');
                            $.each(data, function(key, value){
                                $('select[name="regency_id"]').append('<option value="'+ key +'">' + value + '</option>');
                            });
                        }
                    });
                }else {
                        $('select[name="regency_id"]').empty();
                }
            });
        });
    </script>
@endsection