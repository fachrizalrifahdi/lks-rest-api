@extends('layouts.app')

@section('title', 'Foto')

@section('content')

    <h4>Tambah Foto</h4>
    <form action="{{ route('foto.update', $foto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <label for="name">Name</label>
                <input class="form-control @error('url') is-invalid  @enderror" id="name" value="{{ $foto->name }}"
                    type="text" name="name">
                @error('name')
                    <span class="text-sm text-danger">{{ $message }}</span>
                @enderror

            </div>
            <div class="col-md-12">

                <label for="url">Url</label>
                <input class="form-control @error('url') is-invalid  @enderror" id="url" value="{{ $foto->url }}"
                    type="text" name="url">
                @error('url')
                    <span class="text-sm text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-12">
                <label for="album_id">Album</label>
                <select name="album_id" class="form-control" id="album_id">
                    @foreach ($albums as $album)

                        <option value="{{ $album->id }}">{{ $album->name }}</option>
                    @endforeach
                </select>
                @error('album_id')
                    <span class="text-sm text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary mt-2" type="submit">Simpan</button>
    </form>

@endsection
