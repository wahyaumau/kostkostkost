@extends('main')

@section('title', '| New University')

@section('stylesheets')

{!! Html::style('css/select2.min.css') !!}

@endsection


@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			
		<h1>New University</h1>
		<hr>

		<form method="post" action="{{route('universities.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-md-12">
                    <label for="name">Nama Universitas :</label>
                    <input type="text" class="form-control" name="name">
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