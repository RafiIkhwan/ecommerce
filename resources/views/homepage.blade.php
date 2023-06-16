@extends('index')
@section('title', 'Homepage')
@section('content')
<div class="header">
    <div class="banner-add">
        <div class="add-img">
            <img src="{{ asset('img/tokopedads.png') }}" alt="">
        </div>
        <div class="add-img">
            <img src="{{ asset('img/tokopedads2.png') }}" alt="">
        </div>
        <div class="add-img">
            <img src="{{ asset('img/tokopedads3.png') }}" alt="">
        </div>
    </div>
    <br>
    <div class="filter-content">
        <ul class="filter-nav">
            <li class="filter-item">Elektronik</li>
            <li class="filter-item">Perhiasan</li>
            <li class="filter-item">Gaming</li>
            <li class="filter-item">Busana</li>
        </ul>
        <span class="filter-btn">Sort By</span>
    </div>
</div>
<div class="content">
    <h3 class="content-title">Welcome</h3><br>

    <div class="card-content-parent">
        @foreach ($produks as $produk)
        <div class="card-content">
            <div class="img-content">
                <img src="{{ asset('storage/' . $produk->gambar) }}" alt="Gambar">
            </div>
            <div class="item-up">
                <h5 class="title-item">{{ $produk->nama_produk }}</h5>
                <span class="price-item">{{ $produk->harga }}</span>
            </div>
            <br>
            <div class="action-card"> 
                <a style="" href="/transaksi/{{ $produk->id_produk }}"><b>Add To Cart</b></a>   
            </div>   
        </div>   
        @endforeach
    </div>
</div>
@endsection