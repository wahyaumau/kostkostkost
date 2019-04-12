@extends('layouts.kostariateam')
@section('title', '| University List')
@section('content')
<div class="container">
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
      @elseif (\Session::has('fail'))
      <div class="alert alert-danger">
        <p>{{ \Session::get('fail') }}</p>
      </div><br />
      @endif
    <div class="row">
        <div class="col-md-8">
            <h3>Daftar Universitas</h3>
        </div>
        <div class="col-md-4">
            <a href="{{route('universities.create')}}" class="btn btn-success">Tambah Kampus</a>
        </div>
    </div>
    <div class="box">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Universitas</th>
                    <th>Alamat</th>
                    <th colspan="2">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listUniversity as $university)
                <tr>
                    <td>{{$university->id}}</td>
                    <td>{{$university->name}}</td>
                    <td>{{$university->address. ", ".$university->village->name. ", ". $university->village->district->name . ", ". $university->village->district->regency->name . ", ". $university->village->district->regency->province->name}}</td>
                    <td><a href="{{ route('universities.edit', $university->id)}}" class="btn btn-warning">Edit</a></td>
                    <td><form action="{{ route('universities.destroy', $university->id)}}" method="post">
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