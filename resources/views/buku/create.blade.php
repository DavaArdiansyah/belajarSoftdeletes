@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
<div class="container">
    <h1>Tambah Buku</h1>
    <form action="{{ route('buku.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="judul_buku">Judul Buku</label>
            <input type="text" class="form-control" id="judul_buku" name="judul_buku" required>
        </div>
        <div class="form-group">
            <label for="kode_kategori">Kode Kategori</label>
            <input type="number" class="form-control" id="kode_kategori" name="kode_kategori" required>
        </div>
        <div class="form-group">
            <label for="stok_buku">Stok Buku</label>
            <input type="number" class="form-control" id="stok_buku" name="stok_buku" required>
        </div>
        <div class="form-group">
            <label for="tahun_buku">Tahun Buku</label>
            <input type="number" class="form-control" id="tahun_buku" name="tahun_buku" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
