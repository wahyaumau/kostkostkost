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
                    <form method="POST" action="{{ route('chambers.store') }}">
                        @csrf
                        @if(isset($listBoardingHouse))
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
                        @elseif(isset($boardinghouse))
                        <div class="form-group row">
                            <label for="boardinghouse_id" class="col-md-4 col-form-label text-md-right">{{ __('Kostan') }}</label>
                            <div class="col-md-6">                                
                                <select class="form-control select2-single" name="boardinghouse_id">                    
                                    <option value='{{$boardinghouse->id}}'>{{$boardinghouse->name}}</option>
                                </select>
                            </div>
                        </div>
                        @endif

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Kamar') }}</label>
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
                            <label for="price_monthly" class="col-md-4 col-form-label text-md-right">{{ __('Harga Bulanan') }}</label>
                            <div class="col-md-6">
                                <input id="price_monthly" type="number" class="form-control{{ $errors->has('price_monthly') ? ' is-invalid' : '' }}" name="price_monthly" value="{{ old('price_monthly') }}" required>

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
                                <input id="price_annual" type="number" class="form-control{{ $errors->has('price_annual') ? ' is-invalid' : '' }}" name="price_annual" value="{{ old('price_annual') }}" required>

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
                        <div class="form-group row">
                            <label for="chamber_size" class="col-md-4 col-form-label text-md-right">{{ __('Ukuran Kamar') }}</label>
                            <div class="col-md-6">
                                <input id="chamber_size" type="text" class="form-control{{ $errors->has('chamber_size') ? ' is-invalid' : '' }}" name="chamber_size" placeholder="4m * 5m" value="{{ old('chamber_size') }}" required>

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
                                <input id="chamber_facility" type="text" class="form-control{{ $errors->has('chamber_facility') ? ' is-invalid' : '' }}" name="chamber_facility" value="{{ old('chamber_facility') }}" required>

                                @if ($errors->has('chamber_facility'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('chamber_facility') }}</strong>
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

    {!! Html::script('js/select2.min.js') !!}
    <script type="text/javascript">
        $('.select2-single').select2();
    </script>

    <script type="text/javascript">
        document.querySelector("#today").valueAsDate = new Date();
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

@endsection