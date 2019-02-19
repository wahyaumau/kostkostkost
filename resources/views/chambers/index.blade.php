@extends('main')

@section('title', '| Index Kostan')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h3>Daftar Kostan</h3>
		</div>
		<div class="col-md-4">
			<a href="{{route('chambers.create')}}" class="btn btn-success">Tambah Kamar</a>  
		</div>

		<div class="box">    

        <table class="table table-striped">
        <thead>
          <tr>
            <th width="3%">No</th>
            <th width="10%">Nama Kostan</th>
            <th width="45%">Nama Kamar</th>
            <th width="15%">Harga bulanan</th>
            <th width="15%">Harga tahunan</th>
            <th width="15%">Jenis Kelamin</th>
            <th width="15%">Ukuran Kamar</th>
            <th width="15%">Fasilitas Kamat</th>            
            {{-- <th width="19%">email</th>
            <th width="9%">url</th> --}}
            <th width="1%">action</th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($listchamber as $chamber)
          <tr>            
            <td>{{$chamber->id}}</td>
            <td>{{$chamber->boardinghouse->name}}</td>
            <td>{{$chamber->name}}</td>
            <td>{{$chamber->price_monthly}}</td>
            <td>{{$chamber->price_annual}}</td>
            <td>{{$chamber->gender}}</td>
            <td>{{$chamber->chamber_size}}</td>
            <td>{{$chamber->chamber_facility}}</td>            
            {{-- <td>{{$hotel['emailHotel']}}</td> --}}
            {{-- <td>{{$hotel['url_coverhotel']}}</td> --}}
            
            <td><a href="{{ route('chambers.edit', $chamber->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('chambers.destroy', $chamber->id)}}" method="post">
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