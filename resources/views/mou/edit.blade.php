@extends('main')

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
        <input type="text" class="form-control" name="name" value="{{$boardinghouse->name}}">
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
  $('.select2-single').select2().val({
    !!json_encode($boardinghouse - > regency - > id) !!
  }).trigger('change');
</script>
@endsection
