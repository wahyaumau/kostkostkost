@extends('layouts.app')

@section('stylesheets')
<link href="{{ asset('css/select2-bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
<style media="screen">
.map-container{
overflow:hidden;
padding-bottom:56.25%;
position:relative;
height:0;
}
.map-container iframe{
left:0;
top:0;
height:100%;
width:100%;
position:absolute;
}
</style>
@endsection

@section('panel')

@endsection

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card shadow mb-4">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">

                    <div class="carousel-item active">
                      <img src="{{asset('img/landing/1.jpg')}}" class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="{{asset('img/landing/1.jpg')}}" class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="{{asset('img/landing/1.jpg')}}" class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                      </div>
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
        </div>
    </div>
    <div class="col-lg-6">
      <div class="card shadow mb-4">
        <div id="map-container-google-1" class="z-depth-1-half map-container">
          <iframe src="https://maps.google.com/maps?q=babakan ciparay&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
</div>

@endsection
@section('scripts')
@endsection
