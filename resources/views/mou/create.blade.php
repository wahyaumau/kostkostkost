@extends('main')

@section('title', '| New University')

@section('stylesheets')

{!! Html::style('css/select2.min.css') !!}

@endsection


@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			
		<h1>New MOU</h1>
		<hr>

		<form method="post" action="{{route('mou.store')}}" enctype="multipart/form-data">
            @csrf
            <p>Pihak 1</p>
                <div class="form-group col-md-12">
                    <label>Nama :</label>
                    <input type="text" class="form-control" value="{{$kostariateam->name}}" disabled="true">
                </div>
                <div class="form-group col-md-12">
                    <label>NIK :</label>
                    <input type="text" class="form-control" value="{{$kostariateam->nik}}"
                    disabled="true">
                </div>
                <div class="form-group col-md-12">
                    <label>Tempat Lahir :</label>
                    <input type="text" class="form-control" value="{{$kostariateam->regency->name}}" disabled="true">
                </div>
                <div class="form-group col-md-12">
                    <label>Tanggal Lahir :</label>
                    <input type="text" class="form-control" value="{{$kostariateam->birth_date}}" disabled="true">
                </div>
                <div class="form-group col-md-12">
                    <label>Alamat :</label>
                    <input type="text" class="form-control" value="{{$kostariateam->address}}" disabled="true">
                </div>                

                <p>Pihak 2</p>
                <div class="form-group col-md-12">
                    <label for="name">Nama :</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group col-md-12">
                    <label for="name">NIK :</label>
                    <input type="text" class="form-control" name="nik">
                </div>
                <div class="form-group col-md-12">
                    <label for="kota">Tempat Lahir :</label>
                    <select class="form-control select2-single" name="regency_id_birth">
                        @foreach($listRegency as $regency)
                        <option value='{{$regency->id}}'>{{$regency->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label for="name">Tanggal Lahir :</label>
                    <input type="date" class="form-control" name="birth_date">
                </div>
                <div class="form-group col-md-12">
                    <label for="name">Alamat :</label>
                    <input type="text" class="form-control" name="address">
                </div>                
                <div class="form-group col-md-12">
                    <label for="kota">Kota :</label>
                    <select class="form-control select2-single" name="regency_id_owner">
                        @foreach($listRegency as $regency)
                        <option value='{{$regency->id}}'>{{$regency->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-12">
                    <label for="name">Nomor HP :</label>
                    <input type="text" class="form-control" name="phone">
                </div>

                <div class="form-group col-md-12">
                    <label for="kota">Ditandatangani di :</label>
                    <select class="form-control select2-single" name="regency_id">
                        @foreach($listRegency as $regency)
                        <option value='{{$regency->id}}'>{{$regency->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-12">
                    <div class="form-group col-md-6">
                    <label>Ditandatangani pada :</label>
                    <input type="date" class="form-control" name="signed_at">
                    </div>
                    <div class="form-group col-md-6">
                    <label>Berlaku sampai :</label>
                    <input type="date" class="form-control" name="ended_at">
                    </div>
                </div>
                

                <div class="box-footer">
                <div class="row">
                <div class="col-md-12"></div>
                <div class="form-group col-md-4">
                    <button type="submit" class="btn btn-success">Submit</button>
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
	</script>

@endsection