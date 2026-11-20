@extends('layouts.master')

@section('title', 'Daftar Kategori')

@section('content')
<div class="container mt-3">
    <h1>Daftar Kategori</h1>
    <hr>

    <div class="card">
        <div class="card-header">
            Kategori Produk
        </div>

        <div class="card-body">
            <table class="table table-striped table-bordered">
<thead>
    <tr>
        <th>No</th>
        <th>Nama Kategori</th>
        <th>Deskripsi</th>
        <th>Aksi</th>
    </tr>
</thead>

<tbody>
    @forelse ($kategori as $item)
    <tr>
        <td>{{ $kategori->firstItem() + $loop->index }}</td>
        <td>{{ $item->category_name }}</td>
        <td>{{ $item->description }}</td>
        <td>
            <button class="btn btn-warning btn-sm">Edit</button>
            <button class="btn btn-danger btn-sm">Hapus</button>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="4" class="text-center">
            Belum ada data kategori.
        </td>
    </tr>
    @endforelse
</tbody>
            </table>

            <div class="mt-3">
                {{ $kategori->links() }}
            </div>

            <div class="mt-3">
                <p>
                    Halaman: {{ $kategori->currentPage() }} <br>
                    Jumlah Data: {{ $kategori->total() }} <br>
                    Data Per Halaman: {{ $kategori->perPage() }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection