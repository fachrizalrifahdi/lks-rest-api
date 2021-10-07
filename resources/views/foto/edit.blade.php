@extends('layouts.app')

@section('title', 'Foto')

@section('content')

    <h4>Tambah Foto</h4>
    <form action="{{ route('foto.update', $foto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name</label>
        <input class="form-control @error('url') is-invalid  @enderror" id="name" value="{{ $foto->name }}" type="text"
            name="name">
        @error('name')
            <span class="text-sm text-danger">{{ $message }}</span>
        @enderror
        <label for="url">Url</label>
        <input class="form-control @error('url') is-invalid  @enderror" id="url" value="{{ $foto->url }}" type="text"
            name="url">
        @error('url')
            <span class="text-sm text-danger">{{ $message }}</span>
        @enderror
        <div class="col-md-12">
            <label for="album_id">Album</label>
            <select name="album_id" class="form-control" id="album_id"></select>
            @error('album_id')
                <span class="text-sm text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button class="btn btn-primary" type="submit">Simpan</button>
    </form>

@endsection
