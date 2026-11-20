
@extends('layouts.master')

@section('title', 'About - Belajar Laravel 12')

@section('content')
    <h1>Selamat Datang di Halaman About</h1>

    <p>Berikut adalah data diri saya:</p>
    <p>Nama: {{ $nama }}</p>
    <p>Kelas: {{ $kelas }}</p>
    <p>NIM: {{ $nim }}</p>
@endsection
