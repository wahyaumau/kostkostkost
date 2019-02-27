@extends('main')

@section('title', '| Index Users')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h3>User List</h3>
		</div>
		<div class="col-md-4">
			<a href="{{route('users.create')}}" class="btn btn-success">Register a User</a>  
		</div>

		<div class="box">    

        <table class="table table-striped">
        <thead>
          <tr>
            <th width="3%">No</th>
            <th width="10%">Nama</th>
            <th width="10%">Email</th>
            <th width="45%">Alamat</th>
            <th width="15%">Kota/Kabupaten</th>
            <th width="15%">Kampus</th>
            <th width="15%">No Telp</th>
            <th width="15%">Line Id</th>
            <th width="15%">Nama orang Tua</th>
            <th width="15%">No Hp Orang Tua</th>            
            <th width="1%">action</th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($listUser as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->address}}</td>
            <td>{{$user->regency->name}}</td>
            <td>{{$user->university->name}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->lineId}}</td>
            <td>{{$user->parent}}</td>
            <td>{{$user->parent_phone}}</td>            
            
            <td><a href="{{ route('users.edit', $user->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('users.destroy', $user->id)}}" method="post">
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