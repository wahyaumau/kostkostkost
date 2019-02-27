@extends('main')

@section('title', '| New University')

@section('stylesheets')

{!! Html::style('css/select2.min.css') !!}

@endsection


@section('content')

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      
    <h1>Edit Users</h1>
    <hr>

    <form method="post" action="{{ route('users.update', $user->id) }}">
        @method('PATCH')
            @csrf            
            <div class="form-group col-md-12">
                    <label for="name">Nama :</label>
                    <input type="text" class="form-control" name="name" value="{{$user->name}}">
                </div>

                <div class="form-group col-md-12">
                    <label for="alamat">Email :</label>
                    <input type="text" class="form-control" name="email" value="{{$user->name}}">
                </div>                
                <div class="form-group col-md-12">
                    <label for="alamat">Alamat :</label>
                    <input type="text" class="form-control" name="address" value="{{$user->address}}">
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
                    <label for="kota">Kampus :</label>
                    <select class="form-control select2-single" id="select2-kampus" name="university_id">
                        @foreach($listUniversity as $university)
                        <option value='{{$university->id}}'>{{$university->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label for="name">No Telepon :</label>
                    <input type="number" class="form-control" name="phone" value="{{$user->phone}}">
                </div>

                <div class="form-group col-md-12">
                    <label for="alamat">Id Line :</label>
                    <input type="text" class="form-control" name="lineId" value="{{$user->lineId}}">
                </div>
                <div class="form-group col-md-12">
                    <label for="alamat">Nama orang tua :</label>
                    <input type="text" class="form-control" name="parent" value="{{$user->parent}}">
                </div>

                <div class="form-group col-md-12">
                    <label for="alamat">No HP orang tua :</label>
                    <input type="text" class="form-control" name="parent_phone" value="{{$user->parent_phone}}">
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
    $('.select2-single').select2().val({!! json_encode($user->regency->id)!!}).trigger('change');
    $('#select2-kampus').select2().val({!! json_encode($user->university->id)!!}).trigger('change');
  </script>

@endsection