@extends('main')

@section('title', '| New University')

@section('stylesheets')

{!! Html::style('css/select2.min.css') !!}

@endsection


@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			
		<h1>New Chamber</h1>
		<hr>

		<form method="post" action="{{route('chambers.store')}}" enctype="multipart/form-data">
            @csrf
            @if(isset($listBoardingHouse))
            <div class="form-group col-md-12">
                    <label for="kota">Kostan :</label>
                    <select class="form-control select2-single" name="boardinghouse_id">
                        @foreach($listBoardingHouse as $boardinghouse)
                        <option value='{{$boardinghouse->id}}'>{{$boardinghouse->name}}</option>
                        @endforeach
                    </select>
                </div>
            @elseif(isset($boardinghouse))
            <div class="form-group col-md-12">
                    <label for="kota">Kostan :</label>
                    <select class="form-control select2-single" name="boardinghouse_id">
                        {{-- @foreach($listBoardingHouse as $boardinghouse) --}}
                        <option value='{{$boardinghouse->id}}'>{{$boardinghouse->name}}</option>
                        {{-- @endforeach --}}
                    </select>
                </div>
                @endif

                <div class="form-group col-md-12">
                    <label for="desc">Nama Kamar :</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <div class="form-group col-md-12">
                    <label for="alamat">Harga bulanan :</label>
                    <input type="text" class="form-control" name="price_monthly">
                </div>
                
                <div class="form-group col-md-12">
                    <label for="alamat">Harga tahunan :</label>
                    <input type="text" class="form-control" name="price_annual">
                </div>
                <div class="form-group col-md-12">
                    <label for="alamat">Kamar Untuk :</label>
                    {{-- <input type="text" class="form-control" name="gender"> --}}
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
                <div class="form-group col-md-12">
                    <label for="alamat">Ukuran Kamar :</label>
                    <input type="text" class="form-control" name="chamber_size">
                </div>
                <div class="form-group col-md-12">
                    <label for="alamat">Fasilitas Kamar :</label>
                    <input type="text" class="form-control" name="chamber_facility">
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