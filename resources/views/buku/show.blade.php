@extends('adminlte::page')

@section('title', 'Detail Buku')

@section('content_header')
    <h1>Detail Buku</h1>
    <a href="{{ route('buku.index') }}" class="btn btn-primary">Kembali</a>
    <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Nama Buku: {{ $buku->nm_buku }}</h3>
            <h3>Penerbit: {{ $buku->penerbit }}</h3>
            <h3>Tahun: {{ $buku->tahun }}</h3>
            <h3>Author: {{ $buku->author }}</h3>
            <h3>Status: {{ $buku->flag ? 'Dipinjam' : 'Ada' }}</h3>
        </div>
    </div>
@stop
