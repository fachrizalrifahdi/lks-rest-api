<h4>Lihat Foto</h4>
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Deskripsi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Nama :</td>
            <td>{{ $foto->name }}</td>
        </tr>
        <tr>
            <td>Foto :</td>
            <td><img src="{{ $foto->url }}" alt="foto"></td>
        </tr>
    </tbody>
</table>
<a href="{{ route('foto.index') }}">Kembali</a>
