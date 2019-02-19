@extends('master.site')

@section('title','About | Kostaria.id')

@section('content')
<!-- ***** Breadcumb Area Start ***** -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(assets/img/bg-img/hero-1.jpg)">
</div>
<!-- ***** Breadcumb Area End ***** -->

{!! Form::open(['route' => 'users.create']) !!}
  <div class="row" margin="20px">
    <div class="col-md-4">
      {{ Form::label('name', 'Nama Lengkap') }}
      {{ Form::text('name', null, array('class' => 'form-control')) }}
      {{ Form::label('email', 'Email') }}
      {{ Form::text('email', null, array('class' => 'form-control')) }}
      {{ Form::label('password', 'Password') }}
      {{ Form::password('password', null, array('class' => 'form-control','type' => 'password')) }}
      {{ Form::submit('Yee')}}

    </div>

  </div>
{!! Form::close() !!}
@endsection
