
@extends('layouts.master')

@section('title', 'Daftar Produk')

@section('content')
<div class="container mt-3">
    <h1>Daftar produk kami</h1>
    <hr>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <a href="/product/addProduct" class="btn btn-primary mb-3">
        Tambah Data
    </a>

    <div class="alert alert-primary mt-2">
    <strong>Nama Toko:</strong> {{ $data_toko['nama_toko'] }} <br>
    <strong>Alamat Toko:</strong> {{ $data_toko['alamat_toko'] }} <br>
    <strong>Status Toko:</strong> {{ $data_toko['status_toko'] }}
</div>

    <div class="card">
        <div class="card-header">
            Produk Kami
        </div>

        <div class="card-body">
            <table class="table table-striped table-bordered">
                
<thead>
    <tr>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Stok</th>
        <th>Harga</th>
        <th>Deskripsi</th>
        <th>Aksi</th>
    </tr>
</thead>

<tbody>
    @forelse ($produk as $item)
    <tr>
        <td>{{ $produk->firstItem() + $loop->index }}</td>

        <td>{{ $item->name_product }}</td>

        <td>{{ $item->stock_product }}</td>

        <td>
            Rp {{ number_format($item->price_product, 0, ',', '.') }}
        </td>

        <td>{{ $item->desc_product }}</td>

        <td>
            <button type="button" class="btn btn-danger btn-sm"
        data-bs-toggle="modal"
        data-bs-target="#modalHapus{{ $item->id_product }}">
    Hapus
</button>

<div class="modal fade" id="modalHapus{{ $item->id_product }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                KONFIRMASI ULANG !!!
                <br>
                Apakah Anda yakin ingin menghapus produk
                <strong>{{ $item->name_product }}</strong>?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">
                    Batal
                </button>

                <form action="{{ route('product.destroy', $item->id_product) }}"
                      method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        Ya, Hapus
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

            <a href="{{ url('/product/edit/' . $item->id_product) }}"
               class="btn btn-warning btn-sm">
                Edit
            </a>

            <a href="{{ url('/product/detail/' . $item->id_product) }}"
                class="btn btn-info btn-sm">
                Detail
            </a>

        </td>
    </tr>

    @empty
    <tr>
        <td colspan="6" class="text-center">
            Belum ada data produk.
        </td>
    </tr>
    @endforelse
</tbody>

            </table>
            <div class="mt-3">
    {{ $produk->links() }}
</div>
    <div class="mt-3">
    <p>
        Halaman: {{ $produk->currentPage() }} <br>
        Jumlah Data: {{ $produk->total() }} <br>
        Data Per Halaman: {{ $produk->perPage() }}
    </p>
</div>
        </div>
    </div>
</div>
@endsection
