<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SapaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('pages.beranda');
});



Route::get('/about', function () {
    return view('pages.about', [
        'nama'=> 'Naila Nur Fadila',
        'kelas'=> 'D4SM-48-01',
        'nim' => '707082400115',
    ]);
});


Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/latihan', function () {
    $matakuliah = ['Pemrograman Web', 'Basis Data', 'UI/UX'];
    return view('pages.latihan', ['matakuliah' => $matakuliah]);
});


Route::get('/product', [ProductController::class, 'getProduct']);
Route::get('/product/addProduct', [ProductController::class, 'addProduct']);
Route::get('/product/edit/{id}', [ProductController::class, 'editProduct']);
Route::get('/product/detail/{id}', [ProductController::class, 'detailProduct']);
Route::put('/product/update/{id}', [ProductController::class, 'updateProduct']);
Route::get('/sapa', [SapaController::class, 'index']);
Route::post('/product', [ProductController::class, 'store']);
Route::delete('/product/delete/{id}', [ProductController::class, 'deleteProduct']);
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/product/detail/{id}', [ProductController::class, 'detailProduct']);