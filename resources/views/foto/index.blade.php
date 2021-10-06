<h4>Ini Foto</h4>
<a href="{{ route('foto.create') }}">Tambah Data</a>
<table border="1">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data_foto as $foto)
            <tr>
                <td>{{ $foto->name }}</td>
                <td>
                    <img src="{{ $foto->url }}" alt="foto">
                </td>
                <td>
                    <a href="{{ route('foto.show', $foto->id) }}">Lihat</a>
                    <a href="{{ route('foto.edit', $foto->id) }}">Edit</a>
                    <form action="{{ route('foto.destroy', $foto->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit">Hapus</button>

                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="2">Data tidak ada.</td>
            </tr>
        @endforelse
    </tbody>
</table>
