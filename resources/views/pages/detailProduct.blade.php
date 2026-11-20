@extends('layouts.master')

@section('title', 'Detail Produk')

@section('content')
<div class="container mt-3">
    <h1>Detail Produk</h1>
    <hr>

    <div class="card">
        <div class="card-body">
            <p><strong>Nama Produk:</strong> {{ $produk->name_product }}</p>
            <p><strong>Stok:</strong> {{ $produk->stock_product }}</p>
            <p><strong>Harga:</strong> Rp {{ number_format($produk->price_product, 0, ',', '.') }}</p>
            <p><strong>Deskripsi:</strong> {{ $produk->desc_product }}</p>
            <p><strong>ID Kategori:</strong> {{ $produk->id_category }}</p>

            <a href="{{ url('/product') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection