@extends('layouts.induk')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit {{ $title }} Publik</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
    </div>
  </div>
</div>

@foreach ($data as $dd)
<form method="POST" action="/rapat/publik/edit/proses/{{ $dd->id_rapat }}">
  @method('put')
  @csrf
  <div class="mb-3">
    <label for="tempat" class="form-label">Tempat</label>
    <input type="text" class="form-control" id="tempat" name="tempat" value="{{ $dd->tempat }}">
  </div>
  <div class="mb-3">
    <label for="hari" class="form-label">Hari</label>
    <select class="form-select form-select-sm mb-3" aria-label=".form-select-lg example" name="hari">
      <option selected>Pilih Hari</option>
      <option value="Senin" {{ $dd->hari == "Senin" ? 'selected' : '' }}>Senin</option>
      <option value="Selasa" {{ $dd->hari == "Selasa" ? 'selected' : '' }}>Selasa</option>
      <option value="Rabu" {{ $dd->hari == "Rabu" ? 'selected' : '' }}>Rabu</option>
      <option value="Kamis" {{ $dd->hari == "Kamis" ? 'selected' : '' }}>Kamis</option>
      <option value="Jumat" {{ $dd->hari == "Jumat" ? 'selected' : '' }}>Jumat</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="tanggal" class="form-label">Tanggal</label>
    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $dd->tanggal }}">
  </div>
  <div class="mb-3">
    <label for="jam" class="form-label">Jam</label>
    <input type="text" class="form-control" id="jam" name="jam" value="{{ $dd->jam }}">
  </div>
  <div class="mb-3">
    <label for="keterangan" class="form-label">Keterangan</label>
    <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $dd->keterangan }}">
  </div>

  <button type="submit" class="btn btn-primary">Ubah</button>
</form>
@endforeach

@endsection