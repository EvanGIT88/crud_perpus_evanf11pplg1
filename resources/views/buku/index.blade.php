@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Data Buku</h1>
@stop

@section('content')
    <a href="{{ route('buku.create') }}" class="btn btn-primary">Add New Buku</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Buku</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Author</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bukus as $buku)
                <tr>
                    <td>{{ $buku->id }}</td>
                    <td>{{ $buku->nm_buku }}</td>
                    <td>{{ $buku->penerbit }}</td>
                    <td>{{ $buku->tahun }}</td>
                    <td>{{ $buku->author }}</td>
                    <td>
                        {{ $buku->flag ? 'Dipinjam' : 'Ada' }}
                        <form action="{{ route('buku.toggle', $buku->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-sm {{ $buku->flag ? 'btn-secondary' : 'btn-success' }}">
                                Toggle
                            </button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="{{ route('buku.show', $buku->id) }}" class="btn btn-info">Show</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
