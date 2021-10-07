@extends('layouts.app')

@section('title', 'Album')

@section('content')

    <h4>Tambah Album</h4>
    <form action="{{ route('albums.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <label for="name">Name</label>
                <input class="form-control @error('name') is-invalid  @enderror" id="name" type="text" name="name">
                @error('name')
                    <span class="text-sm text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>


        <button class="mt-3 btn btn-primary" type="submit">Simpan</button>
    </form>
@endsection
