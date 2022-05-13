@extends('layouts.induk')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah {{ $title }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
      </div>
    </div>
  </div>

  <form method="POST" action="/pengguna/create/proses">
    @csrf
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="username" class="form-control" id="username" name="username">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="mb-3">
        <label for="role" class="form-label">Role</label>
        <select class="form-select form-select-sm mb-3" aria-label=".form-select-lg example" name="role">
            <option selected>Pilih Role</option>
            <option value="Administrator">Administrator</option>
            <option value="ASN">ASN</option>
            <option value="NON ASN">NON ASN</option>
          </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection