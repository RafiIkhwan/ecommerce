@extends('index')
@section('title', 'Edit Data Produk')
@section('content')
<div class="container">
    <div class="card">
        <h2 class="">Edit Produk</h2>
        <form action="/update" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id" id="id" value="{{ $produk->id_produk }}">
            <div class="form-group">
                <label class="" for="nm_produk">Nama Produk</label>
                <input class="" type="text" name="nm_produk" required="required" id="nm_produk" value="{{ $produk->nama_produk }}"><br>
            </div>
            <div class="form-group">
                <label class="" for="kategori">Kategori</label>
                <select class="" type="text" name="kategori" required="required" id="kategori" value="{{ $produk->kategori }}" >
                    <option @disabled(true)>Kategori Produk</option> 
                    @foreach ($kategori as $k)
                        <option value="{{ $k->id_kategori }}">{{ $k->nama_kategori }}</option>
                    @endforeach   
                </select>
            </div><br>
            <div class="form-group">
                <label class="" for="deskripsi">Deskripsi</label>
                <textarea class="" name="deskripsi" required="required" id="deskripsi">{{ $produk->deskripsi }}</textarea><br>     
            </div> 
            <div class="form-group">
                <label class="" for="harga">Harga</label>
                <input class="" type="number" name="harga" required="required" id="harga" value="{{ $produk->harga }}" ><br>
            </div>
            <div class="form-group">
                <label class="" for="gambar">Edit Gambar</label>
                <input class="" type="file" name="gambar" id="gambar">
                <div class="img-card">
                    <img style="max-width: 200px;" src="{{ asset('storage/' . $produk->gambar) }}" alt="Gambar">
                </div><br>
            </div>
            <input class="" type="submit" value="Simpan Data">
        </form>
    </div>
</div>

@endsection
