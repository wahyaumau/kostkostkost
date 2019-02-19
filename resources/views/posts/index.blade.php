@extends('main')

@section('title', '| Index University')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h3>Daftar Universitas</h3>
		</div>
		<div class="col-md-4">
			<a href="{{route('universities.create')}}" class="btn btn-success">Tambah Universitas</a>  
		</div>

		<div class="box">    

        <table class="table table-striped">
        <thead>
          <tr>
            <th width="3%">No</th>
            <th width="10%">Nama Universitas</th>
            <th width="45%">Alamat</th>
            <th width="15%">Kota/Kabupaten</th>
            {{-- <th width="19%">email</th>
            <th width="9%">url</th> --}}
            <th width="1%">action</th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($listUniversity as $university)
          <tr>
            <td>{{$university->id}}</td>
            <td>{{$university->name}}</td>
            <td>{{$university->address}}</td>
            <td>{{$university->regency->name}}</td>
            {{-- <td>{{$hotel['emailHotel']}}</td> --}}
            {{-- <td>{{$hotel['url_coverhotel']}}</td> --}}
            
            <td><a href="{{ route('universities.edit', $university->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('universities.destroy', $university->id)}}" method="post">
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