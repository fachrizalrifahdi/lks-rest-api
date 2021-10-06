<h4>Tambah Foto</h4>
<form action="{{ route('foto.store') }}" method="POST">
    @csrf
    <label for="name">Name</label>
    <input id="name" type="text" name="name">
    <label for="url">Url</label>
    <input id="url" type="text" name="url">
    <button type="submit">Simpan</button>
</form>
