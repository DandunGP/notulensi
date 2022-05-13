@extends('layouts.induk')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit {{ $title }}</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
    </div>
  </div>
</div>

@foreach ($data as $dd)
<form method="POST" action="/pengguna/edit/proses/{{ $dd->id_user }}">
  @method('put')
  @csrf
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="username" class="form-control" id="username" name="username" value="{{ $dd->username }}">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password Baru</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="masukkan password baru">
  </div>
  <div class="mb-3">
    <label for="role" class="form-label">Role</label>
    <select class="form-select form-select-sm mb-3" aria-label=".form-select-lg example" name="role">
      <option value="Administrator" {{ $dd->role == "Administrator" ? 'selected' : '' }}>Administrator</option>
      <option value="ASN" {{ $dd->role == "ASN" ? 'selected' : '' }}>ASN</option>
      <option value="NON ASN" {{ $dd->role == "NON ASN" ? 'selected' : '' }}>NON ASN</option>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Ubah</button>
</form>
@endforeach

@endsection