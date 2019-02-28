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
			<h3>Daftar Kostan</h3>
		</div>
		{{-- <div class="col-md-4">
			<a href="{{route('boardinghouses.create')}}" class="btn btn-success">Tambah Kostan</a>  
		</div> --}}

		<div class="box">    

        <table class="table table-striped">
        <thead>
          <tr>
            <th width="3%">No</th>
            <th width="10%">Nama Kostan</th>
            <th width="45%">Deskripsi</th>
            <th width="15%">Alamat</th>
            <th width="15%">Kota/Kabupaten</th>
            <th width="15%">Nama Pemilik</th>
            <th width="15%">Kontak Pemilik</th>
            <th width="15%">Fasilitas Umum</th>
            <th width="15%">Fasilitas Parkir</th>
            <th width="15%">Akses Lingkungan</th>
            <th width="15%">Keterangan tambahan</th>
            <th width="15%">Keterangan biaya</th>
            {{-- <th width="19%">email</th>
            <th width="9%">url</th> --}}
            <th width="1%">action</th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($listBoardingHouse as $boardinghouse)
          <tr>            
            <td>{{$boardinghouse->id}}</td>
            <td>{{$boardinghouse->name}}</td>
            <td>{{$boardinghouse->description}}</td>
            <td>{{$boardinghouse->address}}</td>
            <td>{{$boardinghouse->regency->name}}</td>
            <td>{{$boardinghouse->owner_name}}</td>
            <td>{{$boardinghouse->owner_phone}}</td>
            <td>{{$boardinghouse->facility}}</td>
            <td>{{$boardinghouse->facility_park}}</td>
            <td>{{$boardinghouse->access}}</td>
            <td>{{$boardinghouse->information_others}}</td>
            <td>{{$boardinghouse->information_cost}}</td>
            {{-- <td>{{$hotel['emailHotel']}}</td> --}}
            {{-- <td>{{$hotel['url_coverhotel']}}</td> --}}
            
            <td><a href="{{ route('chambers.creates', $boardinghouse->id)}}" class="btn btn-primary">Tambah Kamar</a></td>
            <td>
            <td><a href="{{ route('boardinghouses.edit', $boardinghouse->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('boardinghouses.destroy', $boardinghouse->id)}}" method="post">
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