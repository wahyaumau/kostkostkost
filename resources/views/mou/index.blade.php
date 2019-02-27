@extends('main')

{{-- @section('title', '| Index Kostan') --}}

{{-- @section('adminpanel')
    <a class="navbar-brand" href="{{route('universities.index')}}">University</a>
    <a class="navbar-brand" href="{{route('boardinghouses.index')}}">Boarding House</a>
    <a class="navbar-brand" href="{{route('chambers.index')}}">Chamber</a>
    <a class="navbar-brand" href="{{route('users.index')}}">User</a>
@endsection --}}

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h3>Daftar MOU</h3>
		</div>
		{{-- <div class="col-md-4">
			<a href="{{route('boardinghouses.create')}}" class="btn btn-success">Tambah Kostan</a>  
		</div> --}}

		<div class="box">    

        <table class="table table-striped">
        <thead>
          <tr>
            <th width="3%">No</th>
            {{-- <th width="10%">Nama Kostan</th> --}}
            <th width="45%">Nama pemilik</th>
            {{-- <th width="15%">Alamat</th>
            <th width="15%">Kota/Kabupaten</th>
            <th width="15%">Nama Pemilik</th>
            <th width="15%">Kontak Pemilik</th>
            <th width="15%">Fasilitas Umum</th>
            <th width="15%">Fasilitas Parkir</th>
            <th width="15%">Akses Lingkungan</th>
            <th width="15%">Keterangan tambahan</th>
            <th width="15%">Keterangan biaya</th> --}}
            {{-- <th width="19%">email</th>
            <th width="9%">url</th> --}}
            <th width="1%">action</th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($listMou as $mou)
          <tr>            
            <td>{{$mou->id}}</td>
            <td>{{$mou->owner->name}}</td>
            {{-- <td>{{$mou->description}}</td>
            <td>{{$mou->address}}</td>
            <td>{{$mou->regency->name}}</td>
            <td>{{$mou->owner_name}}</td>
            <td>{{$mou->owner_phone}}</td>
            <td>{{$mou->facility}}</td>
            <td>{{$mou->facility_park}}</td>
            <td>{{$mou->access}}</td>
            <td>{{$mou->information_others}}</td>
            <td>{{$mou->information_cost}}</td> --}}
            {{-- <td>{{$hotel['emailHotel']}}</td> --}}
            {{-- <td>{{$hotel['url_coverhotel']}}</td> --}}
            
            <td><a href="{{ route('boardinghouses.creates', $mou->owner->id)}}" class="btn btn-primary">Tambah</a></td>
            <td>
                <form action="{{ route('boardinghouses.destroy', $mou->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
         </div>


	</div>

@endsection