@extends('layouts.master')

@section('title', 'Edit Kategori')

@section('content')
<div class="container mt-3">
    <h1>Edit Kategori</h1>
    <hr>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('category.update', $kategori->id_category) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Kategori</label>
                    <input type="text"
                           name="category_name"
                           class="form-control"
                           value="{{ old('category_name', $kategori->category_name) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description"
                              class="form-control"
                              rows="3">{{ old('description', $kategori->description) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    Update Kategori
                </button>

                <a href="{{ route('category.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </form>

        </div>
    </div>
</div>
@endsection
