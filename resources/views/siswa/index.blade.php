@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Data Siswa</h1>
@stop

@section('content')
    <a href="{{ route('siswa.create') }}" class="btn btn-primary">Add New Siswa</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIS</th>
                <th>Alamat</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswas as $siswa)
                <tr>
                    <td>{{ $siswa->id }}</td>
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ $siswa->nis }}</td>
                    <td>{{ $siswa->alamat }}</td>
                    <td>
                        <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" style="display:inline;">
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
