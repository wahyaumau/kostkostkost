@extends('layouts.app')

@section('title', '| New University')

@section('stylesheets')

{!! Html::style('css/select2.min.css') !!}

@endsection


@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			
		<h1>New Boarding House</h1>
		<hr>

		<form method="post" action="{{route('boardinghouses.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-md-12">
                    <label for="name">Nama Kostan :</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <div class="form-group col-md-12">
                    <label for="desc">Deskripsi Kostan :</label>
                    <input type="text" class="form-control" name="description">
                </div>

                <div class="form-group col-md-12">
                    <label for="alamat">Alamat :</label>
                    <input type="text" class="form-control" name="address">
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
                    <label for="kota">Pemilik :</label>
                    <select class="form-control select2-single" name="owner_id">
                        {{-- @foreach($listRegency as $regency) --}}
                        <option value='{{$owner->id}}'>{{$owner->name}}</option>
                        {{-- @endforeach --}}
                    </select>
                </div>
                {{-- <div class="form-group col-md-12">
                    <label for="alamat">Nama Pemilik :</label>
                    <input type="text" class="form-control" name="owner_id" value="{{$owner->id}}" disabled="true" >
                </div>                 --}}
                <div class="form-group col-md-12">
                    <label for="alamat">Fasilitas Umum :</label>
                    <input type="text" class="form-control" name="facility">
                </div>
                <div class="form-group col-md-12">
                    <label for="alamat">Fasilitas Parkir :</label>
                    <input type="text" class="form-control" name="facility_park">
                </div>
                <div class="form-group col-md-12">
                    <label for="alamat">Akses Lingkungan :</label>
                    <input type="text" class="form-control" name="access">
                </div>
                <div class="form-group col-md-12">
                    <label for="alamat">Keterangan tambahan :</label>
                    <input type="text" class="form-control" name="information_others">
                </div>
                <div class="form-group col-md-12">
                    <label for="alamat">Keterangan Biaya :</label>
                    <input type="text" class="form-control" name="information_cost">
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