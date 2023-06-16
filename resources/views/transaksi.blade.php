@extends('index')
@section('title', 'Transaksi')
@section('content')


<br>
<div class="container">
    <div class="row-card">
        <div class="img-card">
            <img src="{{ asset('storage/' . $produk->gambar) }}" alt="Gambar">
        </div>
        <div class="form-transaksi">
            <h3>{{ Str::ucfirst($produk->nama_produk) }}</h3>
            <p>{{ $produk->deskripsi }}</p><br>
            <h5>Rp. {{ $produk->harga }}</h5><br><br><br>
            <form action="/transaksi/store" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="id" id="id" value="{{ $id }}">
                <div class="form-group">
                    <label class="" for="jml">Jumlah</label>
                    <input class="" type="text" name="jml" required="required" id="jml" placeholder="Jumlah pembelian"><br>
                </div>
                <input class="submit-btn" type="submit" value="Pesan">
            </form>
        </div>
    </div>
</div>


@endsection