@extends('adminlte::page')

@section('title', 'Edit Buku')

@section('content_header')
    <h1>Edit Buku</h1>
@stop

@section('content')
    <form action="{{ route('buku.update', $buku->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nm_buku" class="form-label">Nama Buku</label>
            <input type="text" name="nm_buku" class="form-control" id="nm_buku" value="{{ old('nm_buku', $buku->nm_buku) }}" required>
        </div>

        <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" name="penerbit" class="form-control" id="penerbit" value="{{ old('penerbit', $buku->penerbit) }}" required>
        </div>

        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="text" name="tahun" class="form-control" id="tahun" value="{{ old('tahun', $buku->tahun) }}" required>
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" name="author" class="form-control" id="author" value="{{ old('author', $buku->author) }}" required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="flag" class="form-check-input" id="flag" value="1" {{ old('flag', $buku->flag) ? 'checked' : '' }}>
            <label class="form-check-label" for="flag">Flag</label>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('buku.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@stop
