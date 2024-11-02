@extends('layouts.app')

@section('title', 'Tambah Transaksi')

@section('content')
<div class="container">
    <h1>Tambah Transaksi</h1>
    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Peminjam:</label>
            <input type="text" name="nama_peminjam" class="form-control" required />
        </div>

        <div class="form-group">
            <label>Alamat Peminjam:</label>
            <input type="text" name="alamat_peminjam" class="form-control" required />
        </div>

        <div class="form-group">
            <label>No Kontak Peminjam:</label>
            <input type="text" name="no_kontak_peminjam" class="form-control" required />
        </div>

        <div class="form-group">
            <label>Tanggal Meminjam:</label>
            <input type="date" name="tanggal_meminjam" class="form-control" required />
        </div>

        <h3>Buku yang Dipinjam</h3>
        <div id="buku-list">
            <div class="form-group buku-item">
                <select name="buku[0][kode_buku]" class="form-control" required>
                    @foreach($buku as $item)
                        <option value="{{ $item->kode_buku }}">{{ $item->judul_buku }}</option>
                    @endforeach
                </select>
                <input type="number" name="buku[0][jumlah_buku]" class="form-control" min="1" required placeholder="Jumlah Buku"/>
            </div>
        </div>
        <button type="button" class="btn btn-secondary" onclick="addBuku()">Tambah Buku</button>
        <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
    </form>
</div>

<script>
    let bukuCount = 1;
    function addBuku() {
        const bukuList = document.getElementById('buku-list');
        const newBukuItem = document.createElement('div');
        newBukuItem.classList.add('form-group', 'buku-item');
        newBukuItem.innerHTML = `
            <select name="buku[${bukuCount}][kode_buku]" class="form-control" required>
                @foreach($buku as $item)
                    <option value="{{ $item->kode_buku }}">{{ $item->judul_buku }}</option>
                @endforeach
            </select>
            <input type="number" name="buku[${bukuCount}][jumlah_buku]" class="form-control" min="1" required placeholder="Jumlah Buku"/>
        `;
        bukuList.appendChild(newBukuItem);
        bukuCount++;
    }
</script>
@endsection
