<h4>Tambah Foto</h4>
<form action="{{ route('foto.update', $foto->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Name</label>
    <input id="name" value="{{ $foto->name }}" type="text" name="name">
    <label for="url">Url</label>
    <input id="url" value="{{ $foto->url }}" type="text" name="url">
    <button type="submit">Simpan</button>
</form>
