<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan halaman daftar produk
    public function getProduct()
{
    $produk = Product::paginate(5);

    $data_toko = [
        'nama_toko' => 'Toko Nai',
        'alamat_toko' => 'Jl. Terus Jadian Kagak',
        'status_toko' => 'Belum Pasti',
    ];

    return view('pages.product.show', compact('produk', 'data_toko'));
}
// Menampilkan detail produk
public function detailProduct($id)
{
    $produk = Product::findOrFail($id);

    return view('pages.detailProduct', compact('produk'));
}
    // Menampilkan halaman tambah produk
    public function addProduct()
    {
        return view('pages.product.addProduct');
    }

    // Menyimpan produk baru
    
// Menyimpan produk baru
public function store(Request $request)
{
    $request->validate([
        'name_product' => 'required|string|min:4|max:20',
        'stock_product' => 'required|integer|min:0',
        'price_product' => 'required|integer|min:0',
        'desc_product' => 'required|string',
        'id_category' => 'required|integer',
    ]);

    Product::create($request->only([
        'name_product',
        'stock_product',
        'price_product',
        'desc_product',
        'id_category',
    ]));

    return redirect('/product')
        ->with('success', 'Produk berhasil ditambahkan!');
}


    // Menampilkan halaman edit produk
    public function editProduct($id)
    {
        $produk = Product::findOrFail($id);

        return view('pages.editProduct', compact('produk'));
    }

    // Memperbarui produk
    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'name_product' => 'required|string|max:150',
            'stock_product' => 'required|integer|min:0',
            'price_product' => 'required|numeric|min:0',
            'desc_product' => 'required|string',
            'id_category' => 'required|integer',
        ]);

        $produk = Product::findOrFail($id);

        $produk->update($request->only([
            'name_product',
            'stock_product',
            'price_product',
            'desc_product',
            'id_category',
        ]));

        return redirect('/product')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    // Menghapus produk
public function destroy($id)
{
    $produk = Product::findOrFail($id);
    $produk->delete();

    return redirect('/product')
        ->with('success', 'Data Berhasil Dihapus');
}

}