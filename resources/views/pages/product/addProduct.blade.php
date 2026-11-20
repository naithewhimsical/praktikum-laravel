
@extends('layouts.master')

@section('title', 'Tambah Produk')

@section('content')
<div class="container mt-3">
    <h1>Tambah Produk</h1>
    <hr>

    <form action="/product" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Produk</label>
            <input type="text" name="name_product"
                class="form-control"
                value="{{ old('name_product') }}">

            @error('name_product')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="number" name="stock_product"
                class="form-control"
                value="{{ old('stock_product') }}">

            @error('stock_product')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" name="price_product"
                class="form-control"
                value="{{ old('price_product') }}">

            @error('price_product')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="desc_product"
                class="form-control"
                rows="3">{{ old('desc_product') }}</textarea>

            @error('desc_product')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="id_category" class="form-control">
                <option value="">-- Pilih Kategori --</option>
                <option value="1" {{ old('id_category') == 1 ? 'selected' : '' }}>Makanan US</option>
                <option value="2" {{ old('id_category') == 2 ? 'selected' : '' }}>Makanan Asia</option>
                <option value="3" {{ old('id_category') == 3 ? 'selected' : '' }}>Makanan Ringan</option>
            </select>

            @error('id_category')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/product" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
