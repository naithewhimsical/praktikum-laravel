@extends('layouts.master')

@section('title', 'Edit Produk - Belajar Laravel 12')

@section('content')
<div class="container mt-3">
    <h1>Edit Produk</h1>
    <hr>

    <form action="{{ url('/product/update/' . $produk->id_product) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nama Produk</label>
        <input type="text" name="name_product" class="form-control"
            value="{{ old('name_product', $produk->name_product) }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Stok</label>
        <input type="number" name="stock_product" class="form-control"
            value="{{ old('stock_product', $produk->stock_product) }}" min="0" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Harga</label>
        <input type="number" name="price_product" class="form-control"
            value="{{ old('price_product', $produk->price_product) }}" min="0" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <input type="text" name="desc_product" class="form-control"
            value="{{ old('desc_product', $produk->desc_product) }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">ID Kategori</label>
        <input type="number" name="id_category" class="form-control"
            value="{{ old('id_category', $produk->id_category) }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    <a href="{{ url('/product') }}" class="btn btn-secondary">Batal</a>
</form>
</div>
@endsection