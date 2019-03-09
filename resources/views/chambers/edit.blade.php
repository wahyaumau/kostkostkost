@extends('layouts.app')

@section('title', '| New Kamar')

@section('stylesheets')

{!! Html::style('css/select2.min.css') !!}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Kamar') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('chambers.update', $chamber->id) }}">
                        @method('PATCH')                        
                        @csrf
                        <div class="form-group row">
                            <label for="boardinghouse_id" class="col-md-4 col-form-label text-md-right">{{ __('Kostan') }}</label>                    
                            <div class="col-md-6">
                                <select class="form-control select2-single" name="boardinghouse_id">
                                    @foreach($listBoardingHouse as $boardinghouse)
                                        <option value='{{$boardinghouse->id}}'>{{$boardinghouse->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Kamar') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $chamber->name }}" required>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price_monthly" class="col-md-4 col-form-label text-md-right">{{ __('Harga Bulanan') }}</label>
                            <div class="col-md-6">
                                <input id="price_monthly" type="number" class="form-control{{ $errors->has('price_monthly') ? ' is-invalid' : '' }}" name="price_monthly" value="{{ $chamber->price_monthly }}" required>

                                @if ($errors->has('price_monthly'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price_monthly') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                                        
                        <div class="form-group row">
                            <label for="price_annual" class="col-md-4 col-form-label text-md-right">{{ __('Harga Tahunan') }}</label>
                            <div class="col-md-6">
                                <input id="price_annual" type="number" class="form-control{{ $errors->has('price_annual') ? ' is-invalid' : '' }}" name="price_annual" value="{{ $chamber->price_annual }}" required>

                                @if ($errors->has('price_annual'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price_annual') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Kamar Untuk') }}</label>
                            <div class="col-md-6">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="1" name="gender" {{ $chamber->gender == '1' ? 'checked' : '' }}>Laki-laki
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="0" name="gender" {{ $chamber->gender == '0' ? 'checked' : '' }}>Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="chamber_size" class="col-md-4 col-form-label text-md-right">{{ __('Ukuran Kamar') }}</label>
                            <div class="col-md-6">
                                <input id="chamber_size" type="text" class="form-control{{ $errors->has('chamber_size') ? ' is-invalid' : '' }}" name="chamber_size" placeholder="4m * 5m" value="{{ $chamber->chamber_size }}" required>

                                @if ($errors->has('chamber_size'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('chamber_size') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="chamber_facility" class="col-md-4 col-form-label text-md-right">{{ __('Fasilitas Kamar') }}</label>
                            <div class="col-md-6">
                                <input type="checkbox" name="facility_1" value="1" {{$facilities[0]==1? 'checked':''}}>Kamar Mandi Dalam
                                <input type="checkbox" name="facility_2" value="1" {{$facilities[1]==1? 'checked':''}}>Ranjang
                                <input type="checkbox" name="facility_3" value="1" {{$facilities[2]==1? 'checked':''}}>Kasur
                                <input type="checkbox" name="facility_4" value="1" {{$facilities[3]==1? 'checked':''}}>Meja belajar
                                <input type="checkbox" name="facility_5" value="1" {{$facilities[4]==1? 'checked':''}}>Lemari
                                <input type="checkbox" name="facility_6" value="1" {{$facilities[5]==1? 'checked':''}}>Water Heater
                                <input type="checkbox" name="facility_7" value="1" {{$facilities[6]==1? 'checked':''}}>AC
                            </div>
                        </div>                        
                        <div class="form-group row">
                            <label for="chamber_facility_others" class="col-md-4 col-form-label text-md-right">{{ __('Fasilitas Lain') }}</label>
                            <div class="col-md-6">
                                <input id="chamber_facility_others" type="text" class="form-control{{ $errors->has('chamber_facility_others') ? ' is-invalid' : '' }}" name="chamber_facility_others" placeholder="4m * 5m" value="{{ $chamber->chamber_facility_others }}" required>

                                @if ($errors->has('chamber_facility_others'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('chamber_facility_others') }}</strong>
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

    {!! Html::script('js/select2.min.js') !!}
    <script type="text/javascript">
        $('.select2-single').select2();
        $('.select2-single').select2().val({!! json_encode($chamber->boardinghouse->id)!!}).trigger('change');
    </script>

    <script type="text/javascript">
        document.querySelector("#today").valueAsDate = new Date();
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

@endsection