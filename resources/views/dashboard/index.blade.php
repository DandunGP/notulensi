@extends('layouts.induk')

@section('container')
@if (auth()->user()->role == 'Administrator')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ $title }}</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
    </div>
  </div>
</div>
<div class="menu-content d-flex flex-wrap justify-content-center py-5">
  <a href="/pengguna" class="text-decoration-none">
    <div class="card text-dark mx-3 my-2 d-flex flex-column justify-content-center position-relative">
      <h4 class="card-title ps-3">Pengguna</h4>
      <h4 class="text-muted ps-3">{{ $pengguna }}</h4>
      <i class="fa-solid fa-user position-absolute logo-content"></i>
    </div>
  </a>
  <a href="/asn" class="text-decoration-none">
    <div class="card text-dark mx-3 my-2 d-flex flex-column justify-content-center position-relative">
      <h4 class="card-title ps-3">ASN</h4>
      <h4 class="text-muted ps-3">{{ $asn }}</h4>
      <i class="fa-solid fa-users position-absolute logo-content"></i>
    </div>
  </a>
  <a href="/nonasn" class="text-decoration-none">
    <div class="card text-dark mx-3 my-2 d-flex flex-column justify-content-center position-relative">
      <h4 class="card-title ps-3">Non ASN</h4>
      <h4 class="text-muted ps-3">{{ $nonasn }}</h4>
      <i class="fa-solid fa-users position-absolute logo-content"></i>
    </div>
  </a>
  <a href="/rapat" class="text-decoration-none">
    <div class="card text-dark mx-3 my-2 d-flex flex-column justify-content-center position-relative">
      <h4 class="card-title ps-3">Rapat</h4>
      <h4 class="text-muted ps-3">{{ $rapat }}</h4>
      <i class="fa-solid fa-handshake position-absolute logo-content"></i>
    </div>
  </a>
  <a href="/notulensi" class="text-decoration-none">
    <div class="card text-dark mx-3 my-2 d-flex flex-column justify-content-center position-relative">
      <h4 class="card-title ps-3">Notulensi</h4>
      <h4 class="text-muted ps-3">{{ $notulen }}</h4>
      <i class="fa-solid fa-clipboard position-absolute logo-content"></i>
    </div>
  </a>
  <a href="/hasil" class="text-decoration-none">
    <div class="card text-dark mx-3 my-2 d-flex flex-column justify-content-center position-relative">
      <h4 class="card-title ps-3">Hasil</h4>
      <h4 class="text-muted ps-3">{{ $hasil }}</h4>
      <i class="fa-solid fa-envelope-circle-check position-absolute logo-content"></i>
    </div>
  </a>
  <a href="/jabatan" class="text-decoration-none">
    <div class="card text-dark mx-3 my-2 d-flex flex-column justify-content-center position-relative">
      <h4 class="card-title ps-3">Jabatan</h4>
      <h4 class="text-muted ps-3">{{ $jabatan }}</h4>
      <i class="fa-solid fa-map-pin position-absolute logo-content"></i>
    </div>
  </a>
  <a href="/instansi" class="text-decoration-none">
    <div class="card text-dark mx-3 my-2 d-flex flex-column justify-content-center position-relative">
      <h4 class="card-title ps-3">Instansi</h4>
      <h4 class="text-muted ps-3">{{ $instansi }}</h4>
      <i class="fa-solid fa-house-user position-absolute logo-content"></i>
    </div>
  </a>
  <a href="/bidang" class="text-decoration-none">
    <div class="card text-dark mx-3 my-2 d-flex flex-column justify-content-center position-relative">
      <h4 class="card-title ps-3">Bidang</h4>
      <h4 class="text-muted ps-3">{{ $bidang }}</h4>
      <i class="fa-solid fa-user-tie position-absolute logo-content"></i>
    </div>
  </a>
</div>
@else
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ $title }}</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
    </div>
  </div>
</div>
@endif
@endsection