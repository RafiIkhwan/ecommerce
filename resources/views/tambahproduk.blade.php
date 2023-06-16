@extends('index')
@section('title', 'Tambah Data Produk')
@section('content')
<div class="container">
    <div class="card">
        <h2 class="">Tambah Produk</h2>
        <form action="/store" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="" for="nm_produk">Nama Produk</label>
                <input class="" type="text" name="nm_produk" required="required" id="nm_produk" placeholder="Nama Produk"><br>
            </div>
            <div class="form-group">
                <label class="" for="kategori">Kategori</label>
                <select class="" type="text" name="kategori" required="required" id="kategori" placeholder="Kategori">
                    <option @disabled(true)>Kategori Produk</option> 
                    @foreach ($kategori as $k)
                        <option value="{{ $k->id_kategori }}">{{ $k->nama_kategori }}</option>
                    @endforeach   
                </select>
            </div><br>
            <div class="form-group">
                <label class="" for="deskripsi">Deskripsi</label>
                <textarea class="" name="deskripsi" required="required" id="deskripsi" placeholder="Deskripsi"></textarea><br>     
            </div> 
            <div class="form-group">
                <label class="" for="harga">Harga</label>
                <input class="" type="number" name="harga" required="required" id="harga" placeholder="Harga"><br>
            </div>
            <div class="form-group">
                <label class="" for="gambar">Tambah Gambar</label>
                <input class="" type="file" name="gambar" required="required" id="gambar"><br>
            </div>
            <input class="" type="submit" value="Simpan Data">
        </form>
    </div>
</div>

@endsection