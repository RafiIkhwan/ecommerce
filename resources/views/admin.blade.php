@extends('index')
@section('title', 'Halaman Admin')
@section('content')

<style>

table {
  font-family: Arial, sans-serif;
  border-collapse: collapse;
  margin: 20px 10px;
}

th, td {
  text-align: left;
  padding: 8px;
}

th {
  background-color: #f2f2f2;
  color: #333;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

tr:hover {
  background-color: #ddd;
}

td:last-child {
  text-align: center;
}

td a{
  text-decoration: none;
  color: white;
  padding: 2px 4px;
  border-radius: 2px;
  background-color: #333;
  border: 1px solid white;
}
</style>

<br>
<div class="card">
  <a style="text-decoration: none;
  color: white;
  background-color: rgb(47, 47, 215);
  padding: 5px;
  border-radius: 2px;" href="/tambah">Tambah Produk</a>   
    <table>
        <thead>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </thead>
        @foreach ($produk as $p)
        <tbody>
            <td>{{ $no++ }}</td>
            <td>{{ $p->nama_produk }}</td>
            <td>{{ $p->kategori->nama_kategori }}</td>
            <td>{{ $p->deskripsi }}</td>
            <td>{{ $p->harga }}</td>
            <td style="width: 120px;">
                <img style="width: 100px; object-fit: cover;" src="{{ asset('storage/' . $p->gambar) }}" alt="Gambar">
            </td>
            <td style="width: 10%;">
                <a href="/edit/{{ $p->id_produk }}">Edit</a>
                <a href="/hapus/{{ $p->id_produk }}">Hapus</a>
            </td>
        </tbody>
        @endforeach
    </table>
    <div class="pagination">
      {{ $produk->links() }}
    </div>

</div>

@endsection