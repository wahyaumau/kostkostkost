@extends('layouts.kostariateam')

@section('title', '| Kamar')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <h3>Daftar Kamar</h3>
    </div>
    <div class="col-md-4">
      <a href="{{route('chambers.create')}}" class="btn btn-success">Tambah Kamar</a>  
    </div>
    <div class="col-md-4">
            <form method="POST" action="{{ route('chambers.search') }}">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Rentang Harga') }}</label>
                <div class="row">
                <div class="col-md-6">                                
                    <input type="number" name="priceMin-search">
                </div>
                <div class="col-md-6">                                
                    <input type="number" name="priceMax-search">
                </div>
                </div>
            </div>            
            <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Search') }}
                                </button>
                            </div>
                        </div>
            </form>
        </div>
  </div>    

    <div class="box">    

        <table class="table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Kostan</th>
            <th>Nama Kamar</th>
            <th>Harga bulanan</th>
            <th>Harga tahunan</th>
            <th>Jenis Kelamin</th>
            <th>Ukuran Kamar</th>
            <th>Fasilitas Kamar</th>                        
            <th>Fasilitas Lain</th>                        
            <th colspan="3">action</th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($listChamber as $chamber)
          <tr>            
            <td>{{$chamber->id}}</td>
            <td>{{$chamber->boardinghouse->name}}</td>
            <td>{{$chamber->name}}</td>
            <td>{{$chamber->price_monthly}}</td>
            <td>{{$chamber->price_annual}}</td>
            <td>{{$chamber->gender=='1'? 'Laki-laki':'Perempuan'}}</td>
            <td>{{$chamber->chamber_size}}</td>
              @php 
              $facilities = str_split($chamber->chamber_facility);
              $facilities_def = array('kamar mandi dalam', 'ranjang', 'kasur', 'meja belajar', 'lemari', 'water heater', 'AC');
              for ($i=0; $i < count($facilities); $i++) { 
                  if ($facilities[$i] == false) {
                      unset($facilities_def[$i]);
                  }
              }
              @endphp
            <td>
              @foreach($facilities_def as $facility)
                <p>{{$facility}}</p>
              @endforeach

            </td>            
            <td>{{$chamber->chamber_facility_others}}</td>
            <td><a href="{{ route('chambers.edit', $chamber->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('chambers.destroy', $chamber->id)}}" method="post" onSubmit="return confirm('Are you sure you wish to delete?');" >
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