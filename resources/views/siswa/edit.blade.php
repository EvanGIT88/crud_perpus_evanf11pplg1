@extends('adminlte::page')

@section('title', 'Edit Siswa')

@section('content_header')
    <h1>Edit Siswa</h1>
@stop

@section('content')
    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama', $siswa->nama) }}"
                required>
        </div>

        <div class="mb-3">
            <label for="nis" class="form-label">NIS</label>
            <input type="text" name="nis" class="form-control" id="nis" value="{{ old('nis', $siswa->nis) }}"
                required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="alamat"
                value="{{ old('alamat', $siswa->alamat) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@stop
