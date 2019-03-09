@extends('layouts.app')

@section('title', '| Edit Kostan')

@section('stylesheets')

{!! Html::style('css/select2.min.css') !!}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

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
                                    @foreach($listRegency as $regency)
                                        <option value='{{$regency->id}}'>{{$regency->name}}</option>
                                    @endforeach
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

    {!! Html::script('js/select2.min.js') !!}
    <script type="text/javascript">
    $('.select2-single').select2();
    $('.select2-single').select2().val({!! json_encode($boardinghouse->regency->id)!!}).trigger('change');
  </script>

    <script type="text/javascript">
        document.querySelector("#today").valueAsDate = new Date();
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

@endsection
{{-- @extends('main')

@section('title', '| New University')

@section('stylesheets')

{!! Html::style('css/select2.min.css') !!}

@endsection


@section('content')

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      
    <h1>Edit Kostan</h1>
    <hr>

    <form method="post" action="{{ route('boardinghouses.update', $boardinghouse->id) }}">
        @method('PATCH')
            @csrf
            <div class="form-group col-md-12">
                    <label for="name">Nama Kostan :</label>
                    <input type="text" class="form-control" name="name"
                    value="{{$boardinghouse->name}}">
                </div>

                <div class="form-group col-md-12">
                    <label for="desc">Deskripsi Kostan :</label>
                    <input type="text" class="form-control" name="description" value="{{$boardinghouse->description}}">
                </div>

                <div class="form-group col-md-12">
                    <label for="alamat">Alamat :</label>
                    <input type="text" class="form-control" name="address" value="{{$boardinghouse->address}}">
                </div>

                <div class="form-group col-md-12">
                    <label for="kota">Kota :</label>
                    <select class="form-control select2-single" name="regency_id">
                        @foreach($listRegency as $regency)
                        <option value='{{$regency->id}}'>{{$regency->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label for="alamat">Nama Pemilik :</label>
                    <input type="text" class="form-control" name="owner_name" value="{{$boardinghouse->owner_name}}">
                </div>
                <div class="form-group col-md-12">
                    <label for="alamat">No Hp Pemilik :</label>
                    <input type="text" class="form-control" name="owner_phone" value="{{$boardinghouse->owner_phone}}">
                </div>
                <div class="form-group col-md-12">
                    <label for="alamat">Fasilitas Umum :</label>
                    <input type="text" class="form-control" name="facility" value="{{$boardinghouse->facility}}">
                </div>
                <div class="form-group col-md-12">
                    <label for="alamat">Fasilitas Parkir :</label>
                    <input type="text" class="form-control" name="facility_park" value="{{$boardinghouse->facility_park}}">
                </div>
                <div class="form-group col-md-12">
                    <label for="alamat">Akses Lingkungan :</label>
                    <input type="text" class="form-control" name="access" value="{{$boardinghouse->access}}">
                </div>
                <div class="form-group col-md-12">
                    <label for="alamat">Keterangan tambahan :</label>
                    <input type="text" class="form-control" name="information_others" value="{{$boardinghouse->information_others}}">
                </div>
                <div class="form-group col-md-12">
                    <label for="alamat">Keterangan Biaya :</label>
                    <input type="text" class="form-control" name="information_cost" value="{{$boardinghouse->information_cost}}">
                </div>

                <div class="box-footer">
                <div class="row">
                <div class="col-md-12"></div>
                <div class="form-group col-md-4">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
                </div>
            </div>

        </form>


      
    </div>
  </div>

@endsection

@section('scripts')

  {!! Html::script('js/select2.min.js') !!}
  <script type="text/javascript">
    $('.select2-single').select2();
    $('.select2-single').select2().val({!! json_encode($boardinghouse->regency->id)!!}).trigger('change');
  </script>

@endsection --}}