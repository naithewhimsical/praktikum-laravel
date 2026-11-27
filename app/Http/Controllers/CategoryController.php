<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Menampilkan daftar kategori
    public function index()
    {
        $kategori = CategoryProduct::paginate(5);

        return view('pages.category.show', compact('kategori'));
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'description' => 'required',
        ]);

        CategoryProduct::create($request->all());

        return redirect('/category')->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Menampilkan detail kategori
    public function show($id)
    {
        $kategori = CategoryProduct::findOrFail($id);

        return view('pages.category.detail', compact('kategori'));
    }

    // Menampilkan form edit kategori
    public function edit($id)
    {
        $kategori = CategoryProduct::findOrFail($id);

        return view('pages.category.edit', compact('kategori'));
    }

    // Menyimpan perubahan kategori
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required',
            'description' => 'required',
        ]);

        $kategori = CategoryProduct::findOrFail($id);
        $kategori->update($request->all());

        return redirect('/category')->with('success', 'Kategori berhasil diperbarui.');
    }

    // Menghapus kategori
    public function destroy($id)
    {
        $kategori = CategoryProduct::findOrFail($id);
        $kategori->delete();

        return redirect('/category')->with('success', 'Kategori berhasil dihapus.');
    }
}
