
@extends('layouts.master')

@section('title', 'Daftar Mahasiswa')

@section('content')
<div class="container mt-3">
    <h1>Daftar Mahasiswa</h1>
    <hr>

    <ul>
        @foreach ($mahasiswa as $nama)
            <li>{{ $nama }}</li>
        @endforeach
    </ul>
</div>
@endsection
