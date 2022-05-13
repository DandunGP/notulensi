@extends('layouts.induk')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Tambah {{ $title }} Publik</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
    </div>
  </div>
</div>

<form method="POST" action="/rapat/publik/create/proses">
  @csrf
  <div class="mb-3">
    <label for="role" class="form-label">Username</label>
    <select class="form-select form-select-sm mb-3" aria-label=".form-select-lg example" name="user_id">
      <option selected>Pilih Username</option>
      @foreach ($username as $user)
      <option value="{{ $user -> id }}">{{ $user->username }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="tempat" class="form-label">Tempat</label>
    <input type="text" class="form-control" id="tempat" name="tempat">
  </div>
  <div class="mb-3">
    <label for="hari" class="form-label">Hari</label>
    <select class="form-select form-select-sm mb-3" aria-label=".form-select-lg example" name="hari">
      <option selected>Pilih Hari</option>
      <option value="Senin">Senin</option>
      <option value="Selasa">Selasa</option>
      <option value="Rabu">Rabu</option>
      <option value="Kamis">Kamis</option>
      <option value="Jumat">Jumat</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="tanggal" class="form-label">Tanggal</label>
    <input type="date" class="form-control" id="tanggal" name="tanggal">
  </div>
  <div class="mb-3">
    <label for="jam" class="form-label">Jam</label>
    <input type="text" class="form-control" id="jam" name="jam">
  </div>
  <div class="mb-3">
    <label for="keterangan" class="form-label">Keterangan</label>
    <input type="text" class="form-control" id="keterangan" name="keterangan">
  </div>
  <div class="mb-3">
    <label for="asn" class="form-label">Peserta ASN</label>
    <select class="form-select form-select-sm mb-3" aria-label=".form-select-lg example" name="asn" disabled>
      <option value="NULL" selected>Pilih Peserta</option>
      @foreach ($asn as $asn)
      <option value="{{ $asn -> id_asn }}">{{ $asn->nama }} - {{ $asn->instansi->nama_in }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="asn" class="form-label">Peserta NON ASN</label>
    <select class="form-select form-select-sm mb-3" aria-label=".form-select-lg example" name="non" disabled>
      <option value="NULL" selected>Pilih Peserta</option>
      @foreach ($nonasn as $non)
      <option value="{{ $non -> id_non }}">{{ $non->nama }} - {{ $non->instansi->nama_in }}</option>
      @endforeach
    </select>
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection