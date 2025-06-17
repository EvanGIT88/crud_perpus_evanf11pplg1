@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Detail Guru</h1>
    <a href="{{ route('guru.index') }}" class="btn btn-primary">Kembali</a>
    <a href="{{ route('guru.edit', $guru->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('guru.destroy', $guru->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Nama: {{ $guru->nama }}</h3>
            <h3>NIP: {{ $guru->nip }}</h3>
            <h3>Foto:</h3>
            @if ($guru->foto)
                <img src="{{ asset('images/' . $guru->foto) }}" alt="Foto Guru" width="100">
            @else
                Tidak ada foto
            @endif
            <h3>Dokumen:</h3>
            @if ($guru->file_dokumen)
                <a href="{{ asset('documents/' . $guru->file_dokumen) }}" target="_blank">Lihat Dokumen</a>
            @else
                Tidak ada dokumen
            @endif
        </div>
    </div>
@stop
