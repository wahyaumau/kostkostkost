@extends('layouts.dashboard')
@section('panel')
<hr class="sidebar-divider">
<div class="sidebar-heading">
  Kost
</div>
<li class="nav-item">
  <a class="nav-link" href="{{route('mou.index')}}">
    <i class="fas fa-fw fa-file-signature"></i>
    <span>Surat Pernyataan - MOU</span></a>
</li>
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-cog"></i>
    <span>Informasi Kost</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Data Kost</h6>
      <a class="collapse-item" href="{{route('boardinghouses.index')}}">Rumah Kost</a>
      <a class="collapse-item" href="{{route('chambers.index')}}">Kamar</a>
    </div>
  </div>
</li>
<hr class="sidebar-divider">
<div class="sidebar-heading">
  Universitas
</div>
<li class="nav-item">
  <a class="nav-link" href="{{route('universities.index')}}">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>List Universitas</span></a>
</li>
@endsection
