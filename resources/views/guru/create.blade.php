@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Create Guru</h1>
@stop

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="nama" id="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="nip">NIP</label>
        <input type="text" name="nip" id="nip" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="foto">Foto</label>
        <input type="file" name="foto" id="foto" class="form-control-file">
    </div>
    <div class="form-group">
        <label for="file_dokumen">File Dokumen</label>
        <input type="file" name="file_dokumen" id="file_dokumen" class="form-control-file">
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
@stop
