@extends('layouts.induk')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data {{ $title }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
      </div>
    </div>
  </div>
  <a href="jabatan/create" class="btn btn-primary mb-3">Tambah {{ $title }}</a>
  
  <table id="data" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Jabatan</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($jabatan as $jab)
      <tr>
        <td>{{ $loop -> iteration }}</td>
        <td>{{ $jab -> nama_jab }}</td>
        <td>
          <a href="jabatan/tampil/{{ $jab->id_jabatan }}" class="badge btn-warning"><span data-feather="edit"></span> </a>
          <form action="jabatan/delete/{{ $jab->id_jabatan }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge btn-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="trash"></span></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>No</th>
            <th>Nama Jabatan</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>
{{-- <div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Username</th>
        <th scope="col">Role</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($pengguna as $peng)
      <tr>
        <td>{{ $loop -> iteration }}</td>
        <td>{{ $peng -> username }}</td>
        <td>{{ $peng -> role }}</td>
        <td>placeholder</td>
      </tr>
      @endforeach
      
    </tbody>
  </table>
</div> --}}



@endsection

    
  
