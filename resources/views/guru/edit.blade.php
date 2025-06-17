    @extends('adminlte::page')

    @section('title', 'Edit Guru')

    @section('content_header')
        <h1>Edit Guru</h1>
    @stop

    @section('content')
        <form action="{{ route('guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama', $guru->nama) }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" name="nip" class="form-control" id="nip"
                    value="{{ old('nip', $guru->nip) }}" required>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                @if ($guru->foto)
                    <div class="mb-2">
                        <img src="{{ asset('images/' . $guru->foto) }}" alt="Foto Guru" width="100">
                    </div>
                @endif
                <input type="file" name="foto" class="form-control" id="foto">
            </div>

            <div class="mb-3">
                <label for="file_dokumen" class="form-label">File Dokumen</label>
                @if ($guru->file_dokumen)
                    <div class="mb-2">
                        <a href="{{ asset('documents/' . $guru->file_dokumen) }}" target="_blank">Lihat Dokumen</a>
                    </div>
                @endif
                <input type="file" name="file_dokumen" class="form-control" id="file_dokumen">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('guru.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    @stop
