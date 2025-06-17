@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Guru-Guru</h1>
@stop

@section('content')
    <a href="{{ route('guru.create') }}" class="btn btn-primary">Add New Guru</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>NIP</th>
                <th>foto</th>
                <th>Dokumen</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gurus as $guru)
                <tr>
                    <td>{{ $guru->id }}</td>
                    <td>{{ $guru->nama }}</td>
                    <td>{{ $guru->nip }}</td>
                    <td>
                        @if ($guru->foto)
                            <img src="{{ asset('images/' . $guru->foto) }}" alt="Foto Guru" width="100">
                        @else
                            Tidak ada foto
                        @endif
                    </td>
                    <td>
                        @if ($guru->file_dokumen)
                            <a href="{{ asset('documents/' . $guru->file_dokumen) }}" target="_blank">Lihat Dokumen</a>
                        @else
                            Tidak ada dokumen
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('guru.edit', $guru->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('guru.destroy', $guru->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
