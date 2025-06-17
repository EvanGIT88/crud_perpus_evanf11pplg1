@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Create Buku</h1>
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
    <form action="{{ route('buku.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nm_buku">Nama Buku</label>
            <input type="text" name="nm_buku" id="nm_buku" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="penerbit">Penerbit</label>
            <input type="text" name="penerbit" id="penerbit" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tahun">Tahun</label>
            <input type="number" name="tahun" id="tahun" class="form-control" required maxlength="4">
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author" id="author" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@stop
