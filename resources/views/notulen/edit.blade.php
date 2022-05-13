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
<form method="POST" action="/notulensi/edit/proses/{{ $dd->id_notulensi }}" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="mb-3">
        <label for="role" class="form-label">Username</label>
        <select class="form-select form-select-sm mb-3" aria-label=".form-select-lg example" name="id_user">
            <option selected>Pilih Username</option>
            @foreach ($user as $us)
            <option value="{{ $us -> id_user }}" @if ($us -> id_user == $dd -> id_user) selected

                @endif >{{ $us->username }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="role" class="form-label">Rapat</label>
        <select class="form-select form-select-sm mb-3" aria-label=".form-select-lg example" name="id_rapat">
            <option selected>Pilih Rapat</option>
            @foreach ($rapat as $rpt)
            <option value="{{ $rpt -> id_rapat }}" @if ($rpt -> id_rapat == $dd -> id_rapat) selected

                @endif >{{ $rpt->id_rapat }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="role" class="form-label">Status</label>
        <select class="form-select form-select-sm mb-3" aria-label=".form-select-lg example" name="status">
            <option selected>Pilih Status</option>
            <option value="{{ $dd -> status }}" @if ($dd -> status == $dd -> status) selected

                @endif >{{ $dd->status }}</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="tempat" class="form-label">Isi</label>
        <input type="text" class="form-control" id="tempat" name="tempat" value="{{ $dd->isi }}">
    </div>
    <div class="mb-3">
        <label for="file" class="form-label">File</label>
        <input type="hidden" name="oldFile" value="{{ $dd->file }}">
        @if($dd->file)
        <br>File lama : {{$dd->file}}
        @endif
        <input type="file" class="form-control" id="file" name="file">
    </div>
    <button type="submit" class="btn btn-primary">Ubah</button>
</form>
@endforeach

@endsection